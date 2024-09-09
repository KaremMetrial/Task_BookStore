<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../includes/header.php';

$alertMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['currency'])) {
    setcookie('currency', $_POST['currency'], time() + (60 * 60 * 24 * 30), "/");

    $alertMessage = "Your currency has been set to <strong>{$_POST['currency']}</strong>.";
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (!empty($alertMessage)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $alertMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="card p-4">
                <h2 class="text-center mb-4">Set Your Preferences</h2>
                <form method="post" action="">
                    <div class="form-group mb-3">
                        <label for="currency">Select Currency:</label>
                        <select name="currency" class="form-control" id="currency">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="EGY">EGY</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Set Currency</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
