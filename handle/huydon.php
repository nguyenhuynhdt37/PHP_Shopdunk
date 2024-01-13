<?php
include("./connect.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if ($data) {

        $id = $data->order_id;
        $currentDateTimeServer = date("Y-m-d H:i:s");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeZoneOffset = 6 * 60 * 60;
        $currentDateTimeVietnam = date("Y-m-d H:i:s", strtotime($currentDateTimeServer) + $timeZoneOffset);
        $sql = "UPDATE orders SET status = 4,
        cancellationDate = '$currentDateTimeVietnam'
        where id = $id";
        if ($conn->query($sql)) {
            echo "Hủy đơn thành công";
        } else {
            echo "hủy đơn thất bại";
        }
    }
} else {
    echo "Phương thức không hợp lệ";
}
