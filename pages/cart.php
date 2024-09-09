<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../includes/header.php';
include '../functions.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['deleteId'])) {
    $deleteId = intval($_GET['deleteId']);
    if (isset($_SESSION['cart'][$deleteId])) {
        unset($_SESSION['cart'][$deleteId]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    header("Location: cart.php");
    exit;
}


?>
<div class="container">
<div class="row d-flex justify-content-center align-items-center h-100 mt-5">
    <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                            </div>
                            <?php if (empty($_SESSION['cart'])) : ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <div>
                                        No items in cart
                                    </div>
                                </div>
                            <?php else: ?>
                                <table class="table" height="190">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($_SESSION['cart'] as $k => $books): ?>
                                        <tr class="mb-4">
                                            <th scope="row"><?= $k + 1; ?></th>
                                            <td><?= htmlspecialchars($books['title']); ?></td>
                                            <td><?= htmlspecialchars($books['author']); ?></td>
                                            <td><?= $currency . number_format($books['price'] * $transform, 2); ?></td>
                                            <td><a href="?deleteId=<?= $k; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                        <div class="p-5">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                            <hr class="my-4">
                            <form action="" method="post">
                                <div class="d-flex justify-content-between mb-5">
                                    <h5 class="text-uppercase">Total price</h5>
                                    <h5 class="summary_total_price"><?= $currency . number_format(calculateTotalPrice($_SESSION['cart'], $transform), 2); ?></h5>
                                </div>
                                <?php if (!empty($_SESSION['cart'])) : ?>
                                    <button type="submit" name="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">
                                        Checkout
                                    </button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include '../includes/footer.php';
?>
