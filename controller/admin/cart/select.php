<?php
require_once '../../database/connect.php';

$sql = 'SELECT  b.id,b.full_name,b.email,b.phone,b.address,b.cart_total,b.created_at,
        cd.product_name,cd.price,cd.quantity,cd.image
        FROM bill_detail bd
        JOIN bill b ON bd.bill_id = b.id
        JOIN cart_detail cd ON bd.cart_detail_id = cd.id
        WHERE b.status = 3
        ORDER BY b.id DESC';

try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $carts = $statement->fetchAll(PDO::FETCH_ASSOC);

    $groupedCarts = [];

    foreach ($carts as $cart) {
        $cartId = $cart['id'];
        if (!isset($groupedCarts[$cartId])) {
            $groupedCarts[$cartId] = [
                'id' => $cart['id'],
                'full_name' => $cart['full_name'],
                'email' => $cart['email'],
                'phone' => $cart['phone'],
                'address' => $cart['address'],
                'cart_total' => $cart['cart_total'],
                'created_at' => $cart['created_at'],
                'cart_details' => array()
            ];
        }
        $groupedCarts[$cartId]['cart_details'][] = [
            'product_name' => $cart['product_name'],
            'price' => $cart['price'],
            'quantity' => $cart['quantity'],
            'image' => $cart['image']
        ];
    }
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
