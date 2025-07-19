<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$con = mysqli_connect('localhost', 'root', '', 'ecommerce');

if (!isset($_SESSION['name'])) {
    header("Location: form/login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['name']);
?>

<!-- NAVBAR HTML -->
<nav class="navbar p-0 border-bottom border-body" data-bs-theme="dark" style="background-color: #c17a74;">
  <div class="container-fluid text-white">
    <a class="navbar-brand text-white">
      <h1 style="font-family: monospace;">My Store</h1>
    </a>
    <span>
      <i class="fa-solid fa-user-shield"></i>
      <span class="font-monospace">Hello, <?php echo $username; ?></span> | 
      <i class="fa-solid fa-right-from-bracket"></i>
      <a href="form/logout.php" class="text-decoration-none text-white font-monospace" onclick="confirmLogout(event)">Logout</a> |
      <a href="../user/index.php" class="text-decoration-none text-white font-monospace">UserPanel</a>
    </span>
  </div>
</nav>

<!-- SweetAlert2 & Google Fonts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">

<!-- Logout Confirmation Script -->
<script>
function confirmLogout(event) {
    event.preventDefault();

    Swal.fire({
        title: 'Are You Sure You Want To Logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Logout',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#c17a74',
        cancelButtonColor: '#c17a74',
        background: '#fefefe',
        color: '#333',
        customClass: {
            title: 'fw-bold fs-5 font-monospace',
            popup: 'rounded-4',
            confirmButton: 'my-mono-button'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "form/logout.php";
        }
    });
}
</script>
