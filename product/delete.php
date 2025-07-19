<?php 	

 $id = $_GET['ID'];
 include 'config.php';
 mysqli_query($con, "DELETE FROM `tblproduct` WHERE id = '$id'");
header("Location: index.php?msg=deleted");

 ?>