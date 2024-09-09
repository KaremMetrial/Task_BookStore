<?php

if (!isset($_SESSION)) {
    session_start();
}
include "../includes/header.php";
include "../functions.php";

$books = [
    ['title' => '1984', 'author' => 'George Orwell', 'price' => 9.99],
    ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'price' => 7.99],
    ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'price' => 10.99],
];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['title'], $_GET['author'], $_GET['price'])) {
    $title = htmlspecialchars($_GET['title']);
    $author = htmlspecialchars($_GET['author']);
    $price = floatval($_GET['price']);

    $book = ['title' => $title, 'author' => $author, 'price' => $price];

    if (in_array($book, $_SESSION['cart'])) {
        $mess =  "<div class='alert alert-warning'>Book <strong>$title</strong> by $author is already in your cart!</div>";
    } else {
        $_SESSION['cart'][] = $book;
        $mess =  "<div class='alert alert-success'>Book <strong>$title</strong> by $author added to cart for $$price!</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'book-list.php';
                }, 1000);
              </script>";
    }
}

?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Book List</h2>
<?php if (isset($mess)){
    echo $mess;
} ?>

    <table class="table table-hover table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $k => $book) : ?>
            <tr>
                <th scope="row"><?= $k + 1; ?></th>
                <td><?= htmlspecialchars($book['title']); ?></td>
                <td><?= htmlspecialchars($book['author']); ?></td>
                <td><?= formatPrice($book['price'], $currency, $transform); ?></td>
                <td>
                    <a href="?title=<?= $book['title']; ?>&author=<?= $book['author']; ?>&price=<?= $book['price']; ?>"
                       class="btn btn-sm btn-primary">Add to Cart</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include "../includes/footer.php";
?>
