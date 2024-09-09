<?php
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php
$appUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . "/taskBookstore";
define("APPURL", $appUrl);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cartItemCount = count($_SESSION['cart']);
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= APPURL; ?>/index.php">Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/pages/book-list.php">Book List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/pages/book-details.php">Book Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/pages/preferences.php">Preferences</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/pages/cart.php">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <?php if ($cartItemCount > 0): ?>
                                <span class="badge bg-primary"><?= $cartItemCount; ?></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= APPURL; ?>/pages/logout.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>