<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body class="bg-danger">
     <div class="container">
      <div class="row">
        <div class="col-md-6 shadow bg-white font-monospace p-3 m-auto border border-danger mt-5"> 

    <form action="login1.php" method="POST" >  
      <div class="mb-3">
  <p class="text-center fw-bold fs-3 text-danger">Login !</p>
</div>
<div class="mb-3">
  <label  class="form-label"> Name </label>
  <input type="text" name="username" class="form-control"  placeholder="Enter Username *">
</div>
<div class="mb-3">
  <label  class="form-label">Password </label>
  <input type="password" name="userpassword" class="form-control"  placeholder="Enter Password *">
</div>
 
     <button  class="form-control bg-danger fs-4 fw-bold my-3 text-white">Login</button>
    </form>
 </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>