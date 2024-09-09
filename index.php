<?php
if (!isset($_SESSION)) {
    session_start();
}

include 'includes/header.php';
include 'functions.php';
 ?>
<div class="container text-center my-5">
<?php
welcomeMessage();
?>
</div>
<?php
include 'includes/footer.php';

