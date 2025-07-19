<?php
session_start();
session_unset();
session_destroy();

// Check if logout confirmation alert is required
if (isset($_GET['logout'])) {
    echo "
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
    <script>
    Swal.fire({
        icon: 'success',
        title: '✅ Logged Out Successfully!',
        background: '#fefefe',
        color: '#333',
          showConfirmButton: true,
        confirmButtonText: 'OK',
        confirmButtonColor: '#c17a74',
        timer: 2000,
        timerProgressBar: true,
        customClass: {
            title: 'fw-bold font-monospace',
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
    // Direct fallback
    header("Location: ../index.php");
    exit();
}
