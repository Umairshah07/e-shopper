



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
 <link rel="icon" type="image/png" href="/ecommerence/user/fav2.png">

    <style>
      body {
        background-color: #f8fafc;
        font-family: 'Segoe UI', sans-serif;
      }
      .product-box {
        background: white;
        padding: 45px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 550px;
        margin: 60px auto;
        border: 1px solid #ddd;
      }
      .form-label i { color: #c17a74; margin-right: 8px; }
      .form-control, .form-select {
        border-radius: 20px;
        padding: 14px;
        font-size: 1rem;
        font-family: monospace;
      }
      .form-control:focus, .form-select:focus {
        border-color: #c17a74;
        box-shadow: 0 0 0 0.15rem rgba(193, 122, 116, 0.4);
        outline: none;
      }
      .btn-upload {
        background-color: #c17a74;
        border: none;
        border-radius: 20px;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: bold;
        color: white;
        font-family: monospace;
        transition: 0.3s ease;
      }
      .btn-upload:hover {
        background-color: #a75c56;
        color: white;
      }
      h3 { font-family: monospace; }
      .table th, .table td { vertical-align: middle; }
      .table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-left: 10px;
      }
      .btn-danger { font-family: monospace; }
      .swal2-popup {
        font-family: 'Fira Code', monospace !important;
        border-radius: 16px !important;
      }
      .swal2-confirm {
        transition: background 0.3s ease;
      }
        .pagination a {
    color: #c17a74;
    font-weight: bold;
    text-decoration: none;
  }

  .pagination .active a {
    background-color: #c17a74 !important;
    border-color: #c17a74 !important;
    color: white !important;
  }

  .pagination .slash {
    padding: 0.5rem;
    color: #c17a74;
    font-weight: bold;
  }

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
    border-radius: 50px;
  }

  .pagination .page-item .page-link:hover {
    background-color: #a75c56;
    color: white !important;
  }

  .pagination .page-item.disabled .page-link {
    color: #ccc !important;
    pointer-events: none;
    background: transparent;
    border: none;
  }

  .pagination .page-link:focus {
    box-shadow: none;
    background-color: #c17a74;
    color: white;
  }
    </style>
</head>

<body>
  <?php
include '../admin/navbar.php'; 
?>

<?php
if (isset($_GET['msg'])) {
    $message = '';
    $icon = 'success';
    if ($_GET['msg'] == 'added') {
        $message = '✅ Product Successfully Added!';
    } elseif ($_GET['msg'] == 'updated') {
        $message = '✏️ Product Successfully Updated!';
    } elseif ($_GET['msg'] == 'deleted') {
        $message = '🗑️ Product Successfully Deleted!';
        $icon = 'warning';
    }
    echo "<script>
        Swal.fire({
            icon: '$icon',
            title: '$message',
            background: '#fefefe',
            color: '#333',
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#c17a74',
            timer: 3000,
            timerProgressBar: true,
            customClass: {
              title: 'fw-bold fs-5 font-monospace',
              popup: 'rounded-4'
            }
        });
    </script>";
}
?>



<div class="product-box font-monospace">
  <h3 class="text-center fw-bold mb-4" style='color: #c17a74;'>
    <i class="fas fa-box"></i> Product Detail
  </h3>

  <form action="insert.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label"><i class="fas fa-tag"></i> Product Name</label>
      <input type="text" name="Pname" class="form-control" placeholder="Product Name *" required>
    </div>
    <div class="mb-3">
      <label class="form-label"><i class="fas fa-dollar-sign"></i> Product Price</label>
      <input type="text" name="Pprice" class="form-control" placeholder="Product Price *" required>
    </div>
    <div class="mb-3">
      <label class="form-label"><i class="fas fa-image"></i> Add Product Image</label>
      <input type="file" name="Pimage" class="form-control" required>
    </div>
    <div class="mb-4">
      <label class="form-label"><i class="fas fa-list"></i> Select Category</label>
      <select class="form-select" name="pages" required>
        <option value="" disabled selected>-- Choose Category --</option>
        <option value="Home">Home</option>
        <option value="Laptop">Laptop</option>
        <option value="Bag">Bag</option>
        <option value="Mobile">Mobile</option>
      </select>
    </div>
    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-upload">Save</button>
    </div>
  </form>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 m-auto">
      <table class="table table-hover my-5">
        <thead class="text-white fs-5 font-monospace text-center">
          <th class="text-white" style="background-color: #c17a74;">#</th>
          <th class="text-white"  style="background-color: #c17a74;">Name</th>
          <th class="text-white"  style="background-color: #c17a74;">Price</th>
          <th class="text-white"  style="background-color: #c17a74;">Category</th>
          <th class="text-white"  style="background-color: #c17a74;">Actions</th>
        </thead>
        <tbody class="text-center">
<?php
include 'config.php';
$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$countQuery = mysqli_query($con, "SELECT COUNT(*) AS total FROM tblproduct");
$totalProducts = mysqli_fetch_assoc($countQuery)['total'];
$total_pages = ceil($totalProducts / $limit);

$Record = mysqli_query($con, "SELECT * FROM tblproduct LIMIT $offset, $limit");
$a = $offset + 1;
while ($row = mysqli_fetch_array($Record)) {
?>
  <tr>
    <td><?= $a++ ?></td>
    <td><div style="display: flex; justify-content: space-between; align-items: center; margin: 0 80px;"><div><?= $row['PName'] ?></div> <div><img src="<?= $row['PImage'] ?>" style="width:100px; height:100px;"></div></div></td>
    <td><?= $row['PPrice'] ?></td>
    <td><?= $row['PCategory'] ?></td>
    <td>
      <a href="update.php?ID=<?= $row['id'] ?>" class="btn text-white" style="background-color: #c17a74;">Edit</a>
      <a href="javascript:void(0);" onclick="confirmDelete(<?= $row['id'] ?>)" class="btn text-white" style="background-color: #c17a74;">Delete</a>
    </td>
  </tr>
<?php } ?>
</tbody>
</table>

<!-- Pagination -->
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center my-4 font-monospace">
    <!-- Previous -->
    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
      <a class="page-link" href="?page=<?= max(1, $page - 1) ?>">&laquo; Prev</a>
    </li>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
      <?php if ($i < $total_pages): ?>
        <li class="page-item disabled">
          <span class="page-link slash">/</span>
        </li>
      <?php endif; ?>
    <?php endfor; ?>

    <!-- Next -->
    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
      <a class="page-link" href="?page=<?= min($total_pages, $page + 1) ?>">Next &raquo;</a>
    </li>
  </ul>
</nav>


    </div>
  </div>
</div>

<script>
function confirmDelete(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won’t be able to undo this!",
    icon: 'question',
    background: '#fff',
    color: '#333',
    showCancelButton: true,
    confirmButtonColor: '#c17a74',
    cancelButtonColor: '#c17a74',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel',
    reverseButtons: true,
    customClass: {
      title: 'fw-bold font-monospace',
      popup: 'rounded-4 shadow'
    }
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'delete.php?ID=' + id;
    }
  });
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>