<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logging Out</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
  <style>
    .swal2-popup {
        font-family: 'Fira Code', monospace !important;
        border-radius: 16px !important;
    }
    .swal2-confirm {
        background-color: #c17a74 !important;
        font-family: 'Fira Code', monospace !important; /* ✅ Monospace on Button */
    }
  </style>
</head>
<body>
  <script>
    Swal.fire({
      icon: 'success',
      title: '🗑️ Logged Out Successfully!',
      background: '#fefefe',
      color: '#333',
      showConfirmButton: true,
      confirmButtonText: 'OK',
      confirmButtonColor: '#c17a74',
      timer: 2500,
      timerProgressBar: true,
      customClass: {
        title: ' font-monospace',
        popup: 'rounded-4',
        confirmButton: '' // style is already in CSS
      }
    }).then(() => {
      // Redirect after alert to login page
      window.location.href = "login.php"; // path must match your folder
    });
  </script>
</body>
</html>
