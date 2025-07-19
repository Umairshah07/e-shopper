<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_POST['submit'])) {
	include 'config.php';

	$product_name = $_POST['Pname'];
	$product_price = $_POST['Pprice'];
	$image_loc = $_FILES['Pimage']['tmp_name'];
	$image_name = $_FILES['Pimage']['name'];
	$img_des = "uploadimage/" . $image_name;

	move_uploaded_file($image_loc, $img_des);

	$product_category = $_POST['pages'];

	// Insert into database
	mysqli_query($con, "INSERT INTO `tblproduct`(`PName`, `PPrice`, `PImage`, `PCategory`) VALUES ('$product_name','$product_price','$img_des', '$product_category')");

	// ✅ Redirect to index.php with success message
	header("Location: index.php?msg=added");

	exit();
}
?>
