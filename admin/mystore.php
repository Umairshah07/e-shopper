<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <?php

    session_start();
    if (!$_SESSION['admin@admin.com']) {
     header("location: form/login.php");
    }


  ?>
  <body>
   <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white"> <h1 style="font-family: monospace;"> My Store</h1> </a>
    <span>
      <i class="fa-solid fa-user-shield"></i>
      Hello, <?php echo $_SESSION['admin@admin.com']; ?> | 
      <i class="fa-solid fa-right-from-bracket"></i>
      <a href="form/logout.php" class="text-decoration-none text-white">Logout</a> |
      <a href="../user/index.php" class="text-decoration-none text-white">UserPanel</a>
    </span>
  </div>
</nav>
          <div>
            <h2 class="text-center">
             DashedBoard   
           </h2>
        </div>
          <div class="bg-danger text-center py-2 col-md-6 m-auto">
            <a href="../product/index.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Add Post</a>
            <a href="user.php" class="text-white text-decoration-none fs-4 fw-bold px-5">Users</a>
          </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>