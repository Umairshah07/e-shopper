<?php 
session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Shopper</title>
    <link rel="icon" type="image/png" href="fav2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php 
  
    $count = 0;
    if (isset($_SESSION['cart'])) {
      $count = count($_SESSION['cart']);
    }

    ?>
   <nav class="navbar ">
  <div class="container-fluid font-monospace">
    <a href="index.php" class="navbar-brand pb-2"><img src="logo5.png" style="width: 280px; height: 80px;"> </a>
    
    <div class="">
    <a href="index.php" class=" text-decoration-none p-2" style="color: #c17a74;"><i class="fa-solid fa-house"></i> Home </a> <span style='color: #c17a74;'>  |</span>
     <a href="viewCart.php" class="text-decoration-none p-2" style="color: #c17a74;"><i class="fa-solid fa-cart-shopping"></i> Cart(<?php echo $count ?>) </a> <span style='color: #c17a74;'>  |</span>
     <span>
       <i class="fa-solid fa-user-shield"></i> <span >Hello,
     </span>
  
 


<?php



if (isset($_SESSION['user'])) {
    echo "" . $_SESSION['user'];
    echo "
       <span style='color: #c17a74;'>  |</span><a href='#' onclick='confirmLogout()' class='text-decoration-none p-2' style='color: #c17a74;'>
  <i class='fa-solid fa-lock-open'></i> Logout
</a>


    ";
} else {
   
    echo "
       <span style='color: #c17a74;'>  |</span> <a href='form/login.php' class='text-decoration-none p-2' style='color: #c17a74;'>
            <i class='fa-solid fa-lock'></i> Login
        </a> 
    ";
}
?>


     <span style="color: #c17a74;">  |</span>
      

       <a href="../admin/mystore.php" class=" text-decoration-none p-2" style="color: #c17a74;"> <i class="fa-solid fa-user-tie"></i> Admin</a>
     </span>
  
</nav>
</div>
                  <div class=" mt-3 sticky-top font-monospace" style="background-color: #c17a74;">
                    <ul class="list-unstyled d-flex justify-content-center">
                       
                      <li><a href="laptop.php" class="text-decoration-none fw-bold text-white fs-4 px-5">LAPTOPS</a></li>
                      <li><a href="mobile.php" class="text-decoration-none fw-bold text-white fs-4 px-5">MOBILES</a></li>
                      <li><a href="bag.php" class="text-decoration-none fw-bold text-white fs-4 px-5">BAGS</a></li>
                    </ul>
                  </div>








<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
  Swal.fire({
    title: 'Are you sure?',
    text: "You Won't To logout This.",
    icon: 'question',
    background: '#fff',
    color: '#333',
    showCancelButton: true,
    confirmButtonColor: '#c17a74',
    cancelButtonColor: '#c17a74',
    confirmButtonText: 'Yes, logout!',
    cancelButtonText: 'Cancel',
    reverseButtons: true,
    customClass: {
      title: 'fw-bold font-monospace',
      popup: 'rounded-4 shadow'
    }
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirect to logout handler with SweetAlert trigger flag
      window.location.href = 'form/logout.php?logout=1';
    }
  });
}
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>