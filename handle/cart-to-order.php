<?php
include('./connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode($_POST['data'], true);
    if ($data['fullname'] && $data['phone'] && $data['fullAddress']) {
        $user_name = $_SESSION['user'];
        $name = $data['fullname'];
        $phone = $data['phone'];
        $fullAddress = $data['fullAddress'];
        $email = $data['email'] ? $data['email'] : "";
        $currentDateTimeServer = date("Y-m-d H:i:s");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeZoneOffset = 6 * 60 * 60;
        $currentDateTimeVietnam = date("Y-m-d H:i:s", strtotime($currentDateTimeServer) + $timeZoneOffset);
        ///////////////////////
        $addOrders = "INSERT INTO orders (user_id, product_name, memory, price, image, quantity, address, phoneNumber, email, fullName, dateOrder)
        SELECT c.user_id as user_id,
        p.title as product_name,
        m.name AS memory,
        mo.discount as price,
        p.thumbnail as image,
        c.soluong as quantity,
        '$fullAddress' as address,
        '$phone' as phoneNumber,
        '$email' as email, '$name' as fullName,
        '$currentDateTimeVietnam' as dateOrder
        FROM product p
        INNER JOIN memory_options mo ON mo.product_id = p.id
        INNER JOIN memory m ON m.id = mo.memory_id
        INNER JOIN carts c ON c.product_id = p.id AND c.memory_id = mo.memory_id
        INNER JOIN colors cs ON cs.color_id = c.color_id
        WHERE c.user_id IN (SELECT u.id FROM users u WHERE u.fullname = '$user_name')
        GROUP BY c.user_id, p.title, m.name, mo.discount, p.thumbnail, c.soluong";
        if (mysqli_query($conn, $addOrders)) {
            echo ("đặt hàng thành công");
        } else {
            echo ("đặt hàng thất bại");
        }
    } else {
        $error = "Vui lòng nhập đầy đủ thông tin";
    }
}
