<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/home.css?version=51">
    <link rel="stylesheet" type="text/css" href="./assets/css/responsive-home.css?version=51">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css?version=51" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .user_name {
        cursor: pointer;

    }

    .user_name::before {
        position: absolute;
        content: '';
        width: 15rem;
        height: 3.3rem;
        top: 2rem;
        left: 0;
        z-index: 66;
    }

    .user_name:hover .order_deltais {
        display: block !important;
    }

    .order_link:hover {
        color: green !important;
    }

    @media(max-width: 1023px) {
        .user_name {
            font-size: 2rem;
        }
    }
</style>


<?php
include('./handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $user_name = '';
    if (isset($_SESSION['user'])) {
        $user_name = $_SESSION['user'];
        if (isset($_POST['logout'])) {
            $_SESSION = array();
            header("location: ./index.php");
            exit();
        }
    }
}
?>
<div class="header">
    <!-- Header Navbar by Bootstrap -->
    <nav class="header__nav navbar navbar-expand-lg fixed-top px-4 py-1" id="globalnav">
        <div class="container">
            <!-- Logo Apple -->
            <a class="header__logo navbar-brand fs-1 text-dark" href="index.php?page_layout=home"><i class="fa-brands fa-apple"></i></a>
            <!-- Search & Cart btn-->
            <div class="header__more fs-2">
                <a type="button" class="search-btn text-dark mx-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="index.php?page_layout=cart" class="cart-btn text-dark mx-3">
                    <i class="fa-solid fa-cart-shopping" style="position: relative;">
                        <?php
                        if (isset($_SESSION['user'])) {
                            $sql = "SELECT sum(soluong) as soluongtronggio FROM `carts` WHERE user_id = 
                            (select id from users where fullname = '{$_SESSION['user']}')";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $quantity = $row['soluongtronggio'];
                                if ($quantity > 99) {
                                    $result1 = '99+';
                                } else if ($quantity >= 1 and $quantity <= 99) {
                                    $result1 = $quantity;
                                } else {
                                    $result1 = 0;
                                }
                        ?>
                                <div class="cart_quantity text-white d-flex align-items-center bg-danger justify-content-center" style="position: absolute; right: -9px; top: -9px; width: 1.8rem;height: 1.8rem; border-radius: 50%; font-size: 0.8rem;">
                                    <span><?= $result1 ?></span>
                                </div>

                        <?php
                            }
                        }
                        ?>
                    </i></a>

            </div>
            <!-- Toggle Button for Responsive Navbar -->
            <button class="navbar-toggler fs-2 text-dark ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="header__main collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fs-4 text-dark mx-4" href="index.php?page_layout=home">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-4 text-dark mx-4" aria-current="page" href="index.php?page_layout=product_all">Tất cả sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 text-dark mx-4" href="index.php?page_layout=iphone_list">iPhone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 text-dark mx-4" href="index.php?page_layout=ipad_list">iPad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 text-dark mx-4" href="index.php?page_layout=mac_list">Mac</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-4 text-dark mx-4" href="index.php?page_layout=watch_list">Watch</a>
                    </li>
                </ul>
                <!-- LogIn and SignUp Page -->
                <?php
                if ($user_name == '') {
                ?>
                    <a href="./html/sign-up/index.php" class="auth-form-btn text-dark text-decoration-none ms-4 fs-4">Đăng ký</a>
                    <a href="./html/login/index.php" class="auth-form-btn text-dark text-decoration-none ms-4 me-3 fs-4"> Đăng nhập</a>

                <?php
                } else { ?>
                    <div class="box-user position-relative fs-4 text-capitalize d-flex align-items-center">
                        <span class="user_name d-flex align-items-center">
                            <div class="span d-inline">
                                <img src="https://i.pinimg.com/236x/ad/0a/ec/ad0aec5a2b39bbb0d5d444562f423a2d.jpg" style="width: 3rem; border-radius: 50%; margin-right: 1rem;" alt="">
                            </div>
                            <?= $user_name; ?>
                                <ul class="order p-0 position-absolute bg-body-tertiary rounded-3 text-center" style="top: 4.8rem;left: 3rem;width: 16rem">
                                    <li class="order_deltais p-2 mb-2 d-none">
                                        <a href="index.php?page_layout=orders" class="order_link text-decoration-none text-dark">Tài khoản của tôi</a>
                                    </li>    
                                    <li class="order_deltais p-2 mb-2 d-none">
                                        <a href="index.php?page_layout=orders" class="order_link text-decoration-none text-dark">Chi tiết đơn hàng</a>
                                    </li>
                                    <li class="order_deltais p-2 d-none mt-2" style="cursor: default;">
                                        <form method="post">
                                            <button type="submit" name="logout" class="btn btn-success me-3 ms-4 fs-4">Đăng Xuất</button>
                                        </form>
                                    </li>
                                </ul>
                        </span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>
</div>
</body>
