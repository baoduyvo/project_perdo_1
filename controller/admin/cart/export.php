<?php
require_once '../../../database/connect.php';
require_once '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id = $_GET['cart_id'];

try {
    $sql = 'SELECT  b.id, b.full_name, b.email, b.phone, b.address, b.cart_total, b.created_at,
            cd.product_name, cd.price, cd.quantity, cd.image
            FROM bill_detail bd
            JOIN bill b ON bd.bill_id = b.id
            JOIN cart_detail cd ON bd.cart_detail_id = cd.id
            WHERE b.id=:id
            ORDER BY b.id DESC';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id);
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
                'cart_details' => []
            ];
        }
        $groupedCarts[$cartId]['cart_details'][] = [
            'product_name' => $cart['product_name'],
            'price' => $cart['price'],
            'quantity' => $cart['quantity'],
            'image' => $cart['image']
        ];
    }

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'Id')
        ->setCellValue('B1', 'Email')
        ->setCellValue('C1', 'Full Name')
        ->setCellValue('D1', 'Phone')
        ->setCellValue('E1', 'Address')
        ->setCellValue('F1', 'Product Name')
        ->setCellValue('G1', 'Quantity')
        ->setCellValue('H1', 'Price')
        ->setCellValue('I1', 'Total Price')
        ->setCellValue('J1', 'Cart Total');

    $rowcount = 2;

    foreach ($groupedCarts as $cart) {
        foreach ($cart['cart_details'] as $detail) {
            $sheet->setCellValue('A' . $rowcount, $cart['id'])
                ->setCellValue('B' . $rowcount, $cart['email'])
                ->setCellValue('C' . $rowcount, $cart['full_name'])
                ->setCellValue('D' . $rowcount, $cart['phone'])
                ->setCellValue('E' . $rowcount, $cart['address'])
                ->setCellValue('F' . $rowcount, $detail['product_name'])
                ->setCellValue('G' . $rowcount, $detail['quantity'])
                ->setCellValue('H' . $rowcount, $detail['price'])
                ->setCellValue('I' . $rowcount, $detail['price'] * $detail['quantity'])
                ->setCellValue('J' . $rowcount, $cart['cart_total']);
            $rowcount++;
        }
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = "bill-data_" . date('d-m-Y') . ".xlsx";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');

    // setcookie('accept', '1', time() + 5, "../../../asset/client/master.php?pages=home");

    $updateStatus = 'UPDATE bill SET 
        status = :status
        WHERE id = :id';

    $id = $_GET['cart_id'];

    try {
        $statement = $conn->prepare($updateStatus);

        $statement->bindValue(':status', 1);
        $statement->bindParam(':id', $id);

        $update = $statement->execute();

        echo '<script> window.location.href="../../../asset/admin/master.php?page=index&modules=cart"</script>';
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }

    exit();
} catch (PDOException $ex) {
    echo 'Error: ' . $ex->getMessage();
}
