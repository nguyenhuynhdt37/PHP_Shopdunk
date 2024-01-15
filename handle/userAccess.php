<?php
include("./connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['check'])) {
        $sql = "UPDATE countvisits 
                SET numberOfHits = numberOfHits + 1";
        if (mysqli_query($conn, $sql)) {
            echo "done";
        } else {
            echo "error";
        }
    }
}
