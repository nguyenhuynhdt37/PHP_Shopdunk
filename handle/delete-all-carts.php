<?php
include("./connect.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_SESSION['user'];
    $data = json_decode($_POST['data'], true);
    if (isset($data['delete']) && $data['delete'] === true) {
        $sql = "DELETE FROM carts where user_id in
    (select id from users where fullname ='$user_name')";
        if (mysqli_query($conn, $sql)) {
            echo "xóa thành công";
        }
    } else {
        echo "Dữ liệu không hợp lệ";
    }
} else {
    echo "Phương thức không hợp lệ";
}
