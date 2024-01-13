<?php
include("./connect.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('location: ./html/login/index.php');
    exit;
}

function get_id($value, $sql)
{
    $result = '';
    $sql->bind_param("s", $value);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        $sql->bind_result($result);
        $sql->fetch();
    }
    $sql->close();
    return $result;
}

// Xử lý dữ liệu từ phía client
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    var_dump($data);
    if (isset($_SESSION['user']) && isset($data['price_old']) && isset($data['price_new']) && isset($data['memory']) && isset($data['color'])) {
        // Lấy ID của sản phẩm
        $product_id = '';
        $sql0 = $conn->prepare("SELECT id FROM product WHERE title = ?");
        $sql0->bind_param("s", $data["product_name"]);
        $sql0->execute();
        $sql0->store_result();

        if ($sql0->num_rows > 0) {
            $sql0->bind_result($product_id);
            $sql0->fetch();
        }

        $sql0->close();

        // Lấy ID của bộ nhớ (memory)
        $memory_id = get_id($data['memory'], $conn->prepare("SELECT id FROM memory WHERE name = ?"));

        // Lấy ID của người dùng
        $user_id = get_id($_SESSION['user'], $conn->prepare("SELECT id FROM users WHERE fullname = ?"));

        // Lấy ID của màu sắc (color)
        $color_id = get_id($data['color'], $conn->prepare("SELECT color_id FROM colors WHERE name = ?"));

        // Kiểm tra giỏ hàng
        $checkCart = $conn->prepare("SELECT id, soluong FROM carts WHERE user_id = ? AND memory_id = ? AND product_id = ? AND color_id = ?");
        $checkCart->bind_param("iiii", $user_id, $memory_id, $product_id, $color_id);
        $checkCart->execute();
        $checkCart->store_result();

        if ($checkCart->num_rows > 0) {
            // Tăng số lượng
            $checkCart->bind_result($cart_id, $soluong);
            $checkCart->fetch();
            $checkCart->close();

            $new_quantity = $soluong + 1;
            $updateCart = $conn->prepare("UPDATE carts SET soluong = ? WHERE id = ?");
            $updateCart->bind_param("ii", $new_quantity, $cart_id);
            $updateCart->execute();
            $updateCart->close();
        } else {
            // Tạo mới giỏ hàng
            $addToCart = $conn->prepare("INSERT INTO carts (user_id, memory_id, product_id, color_id, soluong) VALUES (?, ?, ?, ?, 1)");
            $addToCart->bind_param("iiii", $user_id, $memory_id, $product_id, $color_id);
            $addToCart->execute();
            $addToCart->close();
        }

        echo "Sản phẩm đã được thêm vào giỏ hàng thành công.";
    } else {
        echo 'Dữ liệu không hợp lệ hoặc không đủ thông tin.';
    }
} else {
    echo 'Không nhận được dữ liệu.';
}
