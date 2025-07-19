<?php
session_start();

// If user not logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: form/login.php");
    exit();
}

// Get product data
$product_name     = $_POST['PName'] ?? '';
$product_price    = $_POST['PPrice'] ?? '';
$product_quantity = $_POST['PQuantity'] ?? '';

// Add to Cart
if (isset($_POST['addCart'])) {
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $check_product = array_column($_SESSION['cart'], 'productName');

    if (in_array($product_name, $check_product)) {
    echo "
    <html>
    <head>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>
    <script>
    Swal.fire({
        icon: 'warning',
        title: '⚠️ Product Already Added!',
        text: 'This Product Is Already In Your Cart.',
        background: '#fefefe',
        color: '#333',
        confirmButtonText: 'OK',
        confirmButtonColor: '#c17a74',
        customClass: {
            title: 'fw-bold font-monospace',
            popup: 'rounded-4 shadow'
        }
    }).then(() => {
        window.location.href = 'index.php';
    });
    </script>
    </body>
    </html>
    ";
    exit();


    } else {
        $_SESSION['cart'][] = array(
            'productName'     => $product_name,
            'productPrice'    => $product_price,
            'productQuantity' => $product_quantity
        );
        header("Location: viewCart.php");
        exit();
    }
}

// Remove from Cart
if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $_POST['item']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
            break;
        }
    }
    header("Location: viewCart.php");
    exit();
}

// Update Cart
if (isset($_POST['update'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $_POST['item']) {
            $_SESSION['cart'][$key] = array(
                'productName'     => $product_name,
                'productPrice'    => $product_price,
                'productQuantity' => $product_quantity
            );
            break;
        }
    }
    header("Location: viewCart.php");
    exit();
}
?>
