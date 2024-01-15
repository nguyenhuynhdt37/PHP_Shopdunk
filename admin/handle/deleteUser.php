<?php
include('../../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['id'])) {
        $id = $data['id'];
        $sql_orders = "DELETE FROM orders WHERE user_id = $id";
        $sql_carts = "DELETE FROM carts WHERE user_id = $id";
        $sql_users = "DELETE FROM users WHERE id = $id";
        if (mysqli_query($conn, $sql_carts) && mysqli_query($conn, $sql_orders) && mysqli_query($conn, $sql_users)) {
            echo "xóa thành công 1";
        } else {
            echo "xóa thất bại: " . mysqli_error($conn);
        }
    }
}
