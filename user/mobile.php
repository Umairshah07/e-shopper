<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Shopper</title>
  <link rel="icon" type="image/png" href="fav2.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .pagination .page-item .page-link {
      color: #c17a74 !important;
      border: none;
      margin: 0 4px;
      border-radius: 50px;
      font-weight: bold;
      background: transparent;
    }
    .pagination .page-item.active .page-link {
      background-color: #c17a74;
      border-color: #c17a74;
      color: white !important;
    }
    .pagination .page-item.disabled .page-link {
      color: #ccc !important;
      pointer-events: none;
    }
    .pagination .page-item .page-link:hover {
      background-color: #a75c56;
      color: white !important;
    }
    .pagination .page-link:focus {
      box-shadow: none;
    }
  </style>
  <?php include 'header.php'; ?>
</head>
<body>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">

        <h1 class="font-monospace my-3 text-center" style="color: #c17a74;">MOBILES</h1>

        <?php
        include('../product/config.php');

        // Pagination Setup
        $limit = 6;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $totalResult = mysqli_query($con, "SELECT COUNT(*) as total FROM tblproduct WHERE PCategory = 'Mobile'");
        $totalRow = mysqli_fetch_assoc($totalResult);
        $totalPages = ceil($totalRow['total'] / $limit);

        $query = "SELECT * FROM tblproduct WHERE PCategory = 'Mobile' LIMIT $offset, $limit";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "
          <div class='col-md-6 col-lg-4 mb-3'>
            <div class='card mx-auto' style='width: 18rem;'>
              <img src='../product/{$row['PImage']}' class='card-img-top' alt='...' style='width: 267px; height: 250px; margin: 10px auto 0;'>
              <div class='card-body text-center'>
                <h5 class='card-title font-monospace fs-4 fw-bold' style='color: #c17a74;'>{$row['PName']}</h5>
                <p class='card-text font-monospace fs-4 fw-bold' style='color: #c17a74;'>RS: " . number_format($row['PPrice'], 2) . "</p>
                <form method='post' action='insertcart.php'>
                  <input type='hidden' name='PName' value='{$row['PName']}'>
                  <input type='hidden' name='PPrice' value='{$row['PPrice']}'>
                  <input type='number' name='PQuantity' value='min='1' max='20''  class=' mb-2' placeholder='Quantity'  style='border-color: #c17a74;'><br><br>
        <input type='submit' style='background-color:#c17a74; border:none; padding: 5px; border-radius: 17px;' name='addCart' class='btn btn-danger w-100 text-white' value='Add To Cart'>
                </form>
              </div>
            </div>
          </div>
          ";
        }
        ?>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center my-4">
          <!-- Prev -->
          <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= max(1, $page - 1) ?>">&laquo; Prev</a>
          </li>

          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
            <?php if ($i < $totalPages): ?>
              <li class="page-item disabled">
                <span class="page-link" style="pointer-events: none;">/</span>
              </li>
            <?php endif; ?>
          <?php endfor; ?>

          <!-- Next -->
          <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= min($totalPages, $page + 1) ?>">Next &raquo;</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
