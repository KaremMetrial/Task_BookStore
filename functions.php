<?php
function welcomeMessage() {
    echo "<h2>Welcome to the Online Bookstore.</h2>";
}
$currency = '$';
$transform = 1;

if (isset($_COOKIE['currency'])) {
    switch ($_COOKIE['currency']) {
        case 'EUR':
            $currency = '€';
            $transform = 0.91;
            break;
        case 'GBP':
            $currency = '£';
            $transform = 0.76;
            break;
        case 'EGY':
            $currency = 'ج.م.';
            $transform = 48.35;
            break;
    }
}

function calculateTotalPrice($cart, $transform) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $transform;
    }
    return $total;
}
function formatPrice($price, $currency, $transform) {
    $convertedPrice = $price * $transform;
    return $currency . number_format($convertedPrice, 2);
}