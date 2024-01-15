<?php
include_once("../../handle/connect.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data['orderIDDelete']) {
        $currentDateTimeServer = date("Y-m-d H:i:s");
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timeZoneOffset = 6 * 60 * 60;
        $currentDateTimeVietnam = date("Y-m-d H:i:s", strtotime($currentDateTimeServer) + $timeZoneOffset);
        $id =  $data['orderIDDelete'];
        $sql = "UPDATE orders o 
                    SET status = 4, cancellationDate = '$currentDateTimeVietnam'
                    where id = $id";
        if ($conn->query($sql)) {
            echo "xóa thành công";
        } else {
            echo "xóa thất bại";
        }
    }
}
