

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/png" href="../fav2.png">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
    body {
      background-color: #f8fafc;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-box {
      background: white;
      padding: 45px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
      width: 100%;
      max-width: 500px;
      margin: 60px auto;
    }

    .form-label i {
      color: #c17a74;
      margin-right: 8px;
    }

    .form-control {
      border-radius: 20px;
      padding: 14px;
      font-size: 1rem;
    }

    .form-control:focus {
      border-color: #c17a74;
      box-shadow: 0 0 0 0.15rem rgba(193, 122, 116, 0.25);
    }

    .btn-login {
      background-color: #c17a74;
      border: none;
      border-radius: 20px;
      padding: 12px;
      font-size: 1.1rem;
      font-weight: bold;
      color: white;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #a75c56;
      
      color: white;
    }

    .text-muted a {
      color: #c17a74;
      text-decoration: none;
    }

    .text-muted a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>


  <div class="login-box font-monospace">
    <h2 class="text-center mb-4 fw-bold" style="color: #c17a74;">Login</h2>

    <form action="login1.php" method="POST">

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-user"></i> Username</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Username *" required>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-lock"></i> Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password *" required>
      </div>

      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-login">Login</button>
      </div>

     <div class="text-center text-muted">
        Dont't Have An Account? <a href="register.php">Register</a>
      </div>

    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>