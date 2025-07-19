<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Name = trim($_POST['name']);
    $Password = trim($_POST['password']);

    $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $con->prepare("SELECT * FROM `tbluser` WHERE (Username = ? OR Email = ?) AND Password = ?");
    $stmt->bind_param("sss", $Name, $Name, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row['Username'];

        // ✅ SweetAlert for Success
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
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
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                title: 'fw-bold fs-0 font-monospace',
                popup: 'rounded-4'
            }
        }).then(() => {
            window.location.href = '../index.php';
        });
        </script>
        </body>
        </html>
        ";
        exit();
    } else {
        // ❌ SweetAlert for Invalid Login
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
        <script>
        Swal.fire({
            icon: 'error',
            title: '❌ Invalid Credentials!',
            text: 'Username or Password is incorrect.',
            background:'#fefefe',
            color: '',
            showConfirmButton: true,
            confirmButtonText: 'Retry',
            confirmButtonColor: '#c17a74',
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
        ";
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
