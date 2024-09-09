<?php
if (!isset($_SESSION)) {
    session_start();
}
include '../includes/header.php';

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);

                if (empty($name) || empty($email)) {
                    echo "<div class='alert alert-danger text-center' role='alert'>Please fill in your name and email.</div>";
                }
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<div class='alert alert-danger text-center' role='alert'>Please enter a valid email address.</div>";
                }
                else {
                    echo "<div class='alert alert-success text-center' role='alert'>Thank you, <strong>$name</strong>! A confirmation has been sent to <strong>$email</strong>.</div>";
                }
            }
            ?>
            <h2 class="text-center mb-4">Purchase a Book</h2>
            <form action="" method="POST">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Purchase</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
