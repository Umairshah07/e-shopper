<?php 	

 $id = $_GET['ID'];
 include 'config.php';
 mysqli_query($con, "DELETE FROM `tblproduct` WHERE id = '$id'");
 header("location: index.php");
 ?>