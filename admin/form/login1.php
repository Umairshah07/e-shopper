<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

$A_name = $_POST['name'];
$A_password = $_POST['userpassword'];

$result = mysqli_query($con, "SELECT * FROM `admin` WHERE name = '$A_name' AND userpassword = '$A_password'");

if (mysqli_num_rows($result) > 0) {
    $_SESSION['name'] = $A_name;
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Success</title>
        <!-- Google Fonts + SweetAlert -->
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .swal2-popup {
                font-family: 'Fira Code', monospace !important;
                border-radius: 16px !important;
            }
            .swal2-confirm {
                background-color: #c17a74 !important;
            }
        </style>
    </head>
    <body>
        <script>
        Swal.fire({
            icon: 'success',
            title: '✅ Login Successfully!',
            background: '#fefefe',
            color: '#333',
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#c17a74',
            timer: 2500,
            timerProgressBar: true,
            customClass: {
                title: 'fw-bold fs-0 font-monospace',
                popup: 'rounded-4'
            }
        }).then(() => {
            window.location.href = '../mystore.php';
        });
        </script>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Failed</title>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .swal2-popup {
                font-family: 'Fira Code', monospace !important;
                border-radius: 16px !important;
            }
            .swal2-confirm {
                background-color: #c17a74 !important;
            }
        </style>
    </head>
    <body>
        <script>
        Swal.fire({
            icon: 'error',
            title: '❌ Invalid Username / Password!',
            background: '#fefefe',
            color: '#333',
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#c17a74',
            timer: 2500,
            timerProgressBar: true,
            customClass: {
                title: 'fw-bold fs-0 font-monospace',
                popup: 'rounded-4'
            }
        }).then(() => {
            window.location.href = 'login.php';
        });
        </script>
    </body>
    </html>
    <?php
}
?>
