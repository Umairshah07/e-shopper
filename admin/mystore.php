<?php
session_start();
?>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
     <link rel="icon" type="image/png" href="../user/fav2.png">
  </head>


  <body>
    <?php
if (isset($_SESSION['login_success'])) {
    echo "
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Login Successful',
        confirmButtonColor: '#c17a74',
        timer: 2500,
        timerProgressBar: true,
        showConfirmButton: true
    });
    </script>
    ";
    unset($_SESSION['login_success']);
}
?>
    <?php
 include 'navbar.php';
    ?>


          <div>
      
            <h2 class="text-center font-monospace" style="color: #a75c56;">
             Dash Board   
           </h2>
        </div>
          <div class=" text-center py-2 font-monospace col-md-6 m-auto" style="background-color: #c17a74;;">
            <a href="../product/index.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Add Post</a>
            <a href="user.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Users</a>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>