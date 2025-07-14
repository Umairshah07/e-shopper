<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
        <div class="container">
          <div class="row">
            <div class="col-md-6 m-auto mt-5 bg-white shadow font-monospace  border border-danger">
              <p class="text-danger text-center my-3 fs-3 fw-bold">User Register !</p>
              <form action="insert.php" method="POST">
                <div class="mb-3">
                  <label for="">UserName:</label>
                  <input type="text" name="name" placeholder="UserName *" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="">Email:</label>
                  <input type="email" name="email" placeholder="Email *" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="">Phone Number:</label>
                  <input type="number" name="number" placeholder="Phone Number *" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="">Password:</label>
                  <input type="password" name="password" placeholder="Password *" class="form-control">
                </div>
                <div class="mb-3">
             <button name="submit" class="fs-4 text-white bg-danger w-100 fw-bold">Register</button>
                 </div>
                  <div class="mb-3">
              <button class="fs-4 text-white bg-danger w-100 fw-bold"><a href="login.php" class="text-decoration-none text-white">Already Have An  Account ?</a></button>
                 </div>
              </form>
            </div>
          </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>