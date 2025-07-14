<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shopper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    session_start(); 
    $count = 0;
    if (isset($_SESSION['cart'])) {
      $count = count($_SESSION['cart']);
    }

    ?>
   <nav class="navbar bg-body-tertiary">
  <div class="container-fluid font-monospace">
    <a class="navbar-brand pb-2"><img src="logo1.png"> </a>
    
    <div class="">
    <a href="index.php" class="text-danger text-decoration-none p-2"><i class="fa-solid fa-house"></i> Home </a> |
     <a href="viewCart.php" class="text-danger text-decoration-none p-2"><i class="fa-solid fa-cart-shopping"></i> Cart(<?php echo $count ?>) </a> |
     <span>
       <i class="fa-solid fa-user-shield"></i> Hello, 
<?php


if (isset($_SESSION['user'])) {
    echo "" . $_SESSION['user'];
    echo "
       | <a href='form/logout.php' class='text-danger text-decoration-none p-2'>
            <i class='fa-solid fa-lock-open'></i> Logout
        </a> 
    ";
} else {
    echo "Guest";
    echo "
       | <a href='form/login.php' class='text-danger text-decoration-none p-2'>
            <i class='fa-solid fa-lock'></i> Login
        </a> 
    ";
}
?>


       |
      

       <a href="../admin/mystore.php" class="text-danger text-decoration-none p-2"> <i class="fa-solid fa-user-tie"></i> Admin</a>
     </span>
  
</nav>
</div>
                  <div class="bg-danger mt-3 sticky-top font-monospace">
                    <ul class="list-unstyled d-flex justify-content-center">
                       
                      <li><a href="laptop.php" class="text-decoration-none fw-bold text-white fs-4 px-5">LAPTOPS</a></li>
                      <li><a href="mobile.php" class="text-decoration-none fw-bold text-white fs-4 px-5">MOBILES</a></li>
                      <li><a href="bag.php" class="text-decoration-none fw-bold text-white fs-4 px-5">BAGS</a></li>
                    </ul>
                  </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>