<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <!-- SweetAlert2 CDN -->

    <!-- Bootstrap 5 CDN (latest) -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
  <?php 
 $id = $_GET['ID'];
 include 'config.php';
 $Record = mysqli_query($con, "SELECT * FROM `tblproduct` WHERE id = '$id'");
 $data = mysqli_fetch_array($Record);

 ?> 
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto border border-danger mt-3"> 

    <form action="update.php" method="POST" enctype="multipart/form-data">  
      <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-danger">Product Update !</p>
</div>
<div class="mb-3">
  <label  class="form-label">Product Name </label>
  <input type="text" value="<?php echo $data ['PName'] ?> " name="Pname" class="form-control"  placeholder="Product Name *">
</div>
<div class="mb-3">
  <label  class="form-label">Product Price </label>
  <input type="text" value="<?php echo $data ['PPrice'] ?> " name="Pprice" class="form-control"  placeholder="Product Price *">
</div>
<div class="mb-3">
  <label  class="form-label"> Add Product Image </label>
  <input type="file" name="Pimage" class="form-control" ><br>
  <img src="<?php echo $data ['PImage'] ?>">

</div>
<div class="mb-3">
  <label  class="form-label" > Select Category </label>
 <select class="form-select" name="pages">
  <option value="Home">Home</option>
  <option value="Laptop">Laptop</option>
  <option value="Bag">Bag</option>
  <option value="Mobile">Mobile</option>
</select>
</div>
<input type="hidden" name="id" value="<?php echo $data ['id'] ?>">
     <button name="update" class="form-control bg-danger fs-4 fw-bold my-3 text-white">Save</button>
    </form>
 </div>
      </div>
    </div>
      
      <?php 
     if (isset($_POST['update'])) {
     	$id = $_POST['id'];
     	$product_name = $_POST['Pname'];
	$product_price = $_POST['Pprice'];
	$product_image = $_FILES['Pimage'];
	$image_loc = $_FILES['Pimage']['tmp_name'];
	$image_name = $_FILES['Pimage']['name'];
	$img_des = "uploadimage/".$image_name;
	move_uploaded_file($image_loc,"uploadimage/".$image_name);

    $product_category = $_POST['pages'];
     include 'config.php';
     mysqli_query($con, "UPDATE `tblproduct` SET `PName`='$product_name ',`PPrice`='$product_price ',`PImage`='$img_des',`PCategory`='$product_category' WHERE id = '$id'");
     header("location: index.php");
     }
       ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>


