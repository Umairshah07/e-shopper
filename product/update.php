<?php
session_start(); // if using sessions
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $product_name = trim($_POST['Pname']);
    $product_price = trim($_POST['Pprice']);
    $product_category = $_POST['pages'];
    
    $image_name = $_FILES['Pimage']['name'];
    $image_loc = $_FILES['Pimage']['tmp_name'];
    $img_des = '';

    if (!empty($image_name)) {
        $img_des = "uploadimage/" . $image_name;
        move_uploaded_file($image_loc, $img_des);
        $updateQuery = "UPDATE `tblproduct` SET `PName`='$product_name', `PPrice`='$product_price', `PImage`='$img_des', `PCategory`='$product_category' WHERE id='$id'";
    } else {
        $updateQuery = "UPDATE `tblproduct` SET `PName`='$product_name', `PPrice`='$product_price', `PCategory`='$product_category' WHERE id='$id'";
    }

    mysqli_query($con, $updateQuery);
    header("Location: index.php?msg=updated");
    exit;
}

// DISPLAY LOGIC
$id = isset($_GET['ID']) ? $_GET['ID'] : null;
if (!$id) {
    echo "<div class='text-center text-danger fw-bold mt-5'>Product ID is missing!</div>";
    exit;
}

$Record = mysqli_query($con, "SELECT * FROM `tblproduct` WHERE id = '$id'");
if (mysqli_num_rows($Record) == 0) {
    echo "<div class='text-center text-danger fw-bold mt-5'>Product not found!</div>";
    exit;
}

$data = mysqli_fetch_array($Record);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="icon" type="image/png" href="../user/fav2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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
        background-color: black;
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
        background-color: #c17a74;
        color: white;
      }
      h3 { font-family: monospace; }
      .table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        margin-left: 10px;
      }
   .btn-save {
  background-color: #c17a74;
  color: white;
  font-family: monospace;
  transition: 0.3s ease;
  border: none;
}

.btn-save:hover {
  background-color: #a75c56;
  color: white;
}

    </style>
   
  </head>

  <body>
<?php include '../admin/navbar.php'; ?>

<div class="product-box font-monospace">
  <h3 class="text-center fw-bold " style='color: #c17a74;'><i class="fas fa-box"></i> Product Update</h3>

  <form action="update.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label"><i class="fas fa-tag"></i> Product Name</label>
      <input type="text" value="<?php echo $data['PName']; ?>" name="Pname" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="fas fa-dollar-sign"></i> Product Price</label>
      <input type="text" value="<?php echo $data['PPrice']; ?>" name="Pprice" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label"><i class="fas fa-image"></i> Product Image</label>
      <input type="file" name="Pimage" class="form-control">
      <img src="<?php echo $data['PImage']; ?>" style="width: 100px; height: 100px; margin-top: 10px;">
    </div>

    <div class="mb-4">
      <label class="form-label"><i class="fas fa-list"></i> Category</label>
      <?php
        $categories = ['Home', 'Laptop', 'Bag', 'Mobile'];
        $selected = $data['PCategory'];
      ?>
      <select class="form-select" name="pages" required>
        <option value="<?= $selected ?>" selected><?= $selected ?></option>
        <?php foreach ($categories as $category): ?>
          <?php if ($category != $selected): ?>
            <option value="<?= $category ?>"><?= $category ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>

    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <button name="update" class="form-control font-monospace my-3 btn-save">Update</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
