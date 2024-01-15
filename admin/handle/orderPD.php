<?php
include_once("../../handle/connect.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data['orderIDApproval']) {
        $id =  $data['orderIDApproval'];
        $sql = "UPDATE orders o 
                    SET status = 2
                    where id = $id";
        if ($conn->query($sql)) {
            echo "phê duyệt thành công";
        } else {
            echo "phê duyệt thất bại";
        }
    }
}
