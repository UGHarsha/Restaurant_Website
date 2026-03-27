<?php

header('Content-Type: application/json');

require_once __DIR__ . '/connect.php';
session_start();

$response = [ 'ok' => false ];

//  user  authenticated
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode([ 'ok' => false, 'error' => 'unauthorized' ]);
    exit;
}

$user_id = $_SESSION['user_id'];

//  compute grand total 
function compute_grand_total(PDO $conn, $user_id) {
    $grand_total = 0;
    $stmt = $conn->prepare('SELECT price, quantity FROM `cart` WHERE user_id = ?');
    $stmt->execute([$user_id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $grand_total += ((float)$row['price'] * (int)$row['quantity']);
    }
    return $grand_total;
}

$action = isset($_POST['action']) ? $_POST['action'] : '';

try {
    if ($action === 'update_qty') {
        $cart_id = isset($_POST['cart_id']) ? (int)$_POST['cart_id'] : 0;
        $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
        $qty = max(1, min($qty, 99));

        $update = $conn->prepare('UPDATE `cart` SET quantity = ? WHERE id = ? AND user_id = ?');
        $update->execute([$qty, $cart_id, $user_id]);

        // item to compute subtotal
        $item = $conn->prepare('SELECT price FROM `cart` WHERE id = ? AND user_id = ?');
        $item->execute([$cart_id, $user_id]);
        $price = 0;
        if ($row = $item->fetch(PDO::FETCH_ASSOC)) {
            $price = (float)$row['price'];
        }
        $sub_total = $price * $qty;
        $grand_total = compute_grand_total($conn, $user_id);

        $response = [
            'ok' => true,
            'cart_id' => $cart_id,
            'qty' => $qty,
            'sub_total' => $sub_total,
            'grand_total' => $grand_total
        ];

    } elseif ($action === 'delete_item') {
        $cart_id = isset($_POST['cart_id']) ? (int)$_POST['cart_id'] : 0;
        $delete = $conn->prepare('DELETE FROM `cart` WHERE id = ? AND user_id = ?');
        $delete->execute([$cart_id, $user_id]);

        $grand_total = compute_grand_total($conn, $user_id);
        $response = [ 'ok' => true, 'cart_id' => $cart_id, 'grand_total' => $grand_total ];

    } elseif ($action === 'clear_cart') {
        $delete_all = $conn->prepare('DELETE FROM `cart` WHERE user_id = ?');
        $delete_all->execute([$user_id]);
        $response = [ 'ok' => true, 'grand_total' => 0 ];

    } else {
        http_response_code(400);
        $response = [ 'ok' => false, 'error' => 'invalid_action' ];
    }
} catch (Throwable $e) {
    http_response_code(500);
    $response = [ 'ok' => false, 'error' => 'server_error' ];
}

echo json_encode($response);
?>
