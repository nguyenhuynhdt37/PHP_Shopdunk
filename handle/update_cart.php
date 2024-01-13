<?php
include('./connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datab = isset($_POST['data']) ? $_POST['data'] : '';
    if ($datab) {
        $data = json_decode($datab, true);
        $soluong = $data['soluong'];
        $memoryName = $data['memoryName'];
        $productName = $data['productName'];
        $colorName = $data['colorName'];
        $userName = $_SESSION['user'];
        if ($soluong <= 0) {
            $sql = "DELETE FROM carts
            WHERE product_id IN (SELECT p.id FROM product p WHERE p.title = '$productName')
              AND memory_id IN (SELECT m.id FROM memory m WHERE m.name = '$memoryName') 
              AND color_id IN (SELECT cs.color_id FROM colors cs WHERE cs.name = '$colorName')
              AND user_id IN (SELECT u.id FROM users u WHERE u.fullname = '$userName')";
        } else {
            $sql = "UPDATE carts c 
        SET c.soluong = $soluong
        WHERE c.product_id IN (SELECT p.id FROM product p WHERE p.title = '$productName')
        and c.memory_id in (SELECT m.id FROM memory m where m.name = '$memoryName') 
        AND c.color_id in (SELECT cs.color_id from colors cs where cs.name = '$colorName' )
        AND c.user_id  in (select id from users u where u.fullname = '$userName')";
        }
        if (mysqli_query($conn, $sql)) {
            echo "đã thay đổi";
        }
    } else {
        echo "có cấy nịt";
    }
}
