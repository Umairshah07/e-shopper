<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "ecommerce");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $number = trim($_POST["number"]);
    $password = trim($_POST["password"]);

    $checkEmail = $con->prepare("SELECT * FROM tbluser WHERE Email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        $alert = "exists";
    } else {
        $stmt = $con->prepare("INSERT INTO tbluser (Username, Email, Number, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $number, $password);

        if ($stmt->execute()) {
            $alert = "success";
        } else {
            $alert = "fail";
        }

        $stmt->close();
    }

    $checkEmail->close();
    $con->close();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="icon" type="image/png" href="../fav2.png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background-color: #f8fafc;
      font-family: 'Segoe UI', sans-serif;
    }
    .btn-submit:active,
    .btn-submit:focus {
      background-color: #c17a74 !important;
      color: white !important;
      box-shadow: none !important;
    }
    .form-box {
      background: white;
      padding: 45px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
      width: 100%;
      max-width: 600px;
      margin: 60px auto;
    }
    .form-label i {
      color: #c17a74;
      margin-right: 8px;
    }
    .form-control {
      border-radius: 20px !important;
      padding: 14px;
      font-size: 1rem;
    }
    .form-control:focus {
      border-color: #c17a74;
      box-shadow: 0 0 0 0.2rem rgba(193, 122, 116, 0.2);
    }
    .btn-submit {
      background-color:  #c17a74;
      border: none;
      border-radius: 20px;
      padding: 12px;
      font-size: 1.1rem;
      font-weight: bold;
      color: white;
      transition: background-color 0.3s ease;
    }
    .btn-submit:hover {
      background-color: #a75c56;
      color: white;
      text-decoration: none;
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

<div class="form-box font-monospace">
  <h2 class="text-center mb-4 fw-bold" style="color: #c17a74;">User Register</h2>

  <form method="POST" action="">

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label"><i class="fas fa-user"></i> Username</label>
        <input type="text" name="name" placeholder="Username *" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
        <input type="email" name="email" placeholder="Email *" class="form-control" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label"><i class="fas fa-phone"></i> Phone Number</label>
        <input type="number" name="number" placeholder="Phone *" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label"><i class="fas fa-lock"></i> Password</label>
        <input type="password" name="password" placeholder="Password *" class="form-control" required>
      </div>
    </div>

    <div class="d-grid mb-3">
      <button type="submit" name="submit" class="btn btn-submit">Register</button>
    </div>

    <div class="text-center text-muted">
      Already have an account? <a href="login.php">Login</a>
    </div>

  </form>
</div>

<script>
<?php if (isset($alert)): ?>
  window.onload = function () {
    <?php if ($alert == "success"): ?>
      Swal.fire({
        icon: 'success',
        title: '✅ Registered Successfully!',
        text: 'Redirecting To Login Page...',
        background: '#fefefe',
        color: '#333',
        confirmButtonColor: '#c17a74',
        timer: 3000,
        timerProgressBar: true
      }).then(() => {
        window.location.href = 'login.php';
      });
    <?php elseif ($alert == "exists"): ?>
      Swal.fire({
        icon: 'warning',
        title: '⚠️ Email Already Registered!',
        text: 'Please Login Instead.',
        confirmButtonColor: '#c17a74'
      });
    <?php else: ?>
      Swal.fire({
        icon: 'error',
        title: '❌ Registration Failed!',
        text: 'Something Went Wrong. Try Again.',
        confirmButtonColor: '#c17a74'
      });
    <?php endif; ?>
  };
<?php endif; ?>
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
