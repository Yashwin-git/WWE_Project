<?php
require 'vendor/autoload.php';

// Set your secret key
\Stripe\Stripe::setApiKey('your-secret-key-here');

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'inr',
            'product_data' => [
                'name' => $data['name'],
            ],
            'unit_amount' => intval($data['price']) * 100,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://your-website.com/success.html',
    'cancel_url' => 'https://your-website.com/cancel.html',
]);

echo json_encode(['id' => $session->id]);
?>
