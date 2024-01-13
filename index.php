<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css?version=51" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/10096/10096939.png?ga=GA1.1.1782978868.1679199684&track=ais" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css?version=51" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/128/10096/10096939.png?ga=GA1.1.1782978868.1679199684&track=ais" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css?version=51" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css?version=51" />
    <link rel="stylesheet" href="./assets/bootstrap-5.3.2-dist/css/bootstrap.css?version=51">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css?version=51" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    /* Cuộn lên đầu trang */
    #scrollToTopBtn {
        display: none;
        position: fixed;
        width: 50px;
        height: 50px;
        bottom: 48px;
        right: 24px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 50%;
        padding: 10px 15px;
        cursor: pointer;
        font-size: 24px;
        transition: background-color 0.3s;
        z-index: 10;
    }

    #scrollToTopBtn:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <div class="app">

        <?php
        include_once('./handle/connect.php');
        include_once("./html/header/index.php");
        if (isset($_GET['page_layout'])) {
            $page_layout = $_GET['page_layout'];
            switch ($page_layout) {
                case 'home':
                    include_once("./html/home/index.php");
                    break;
                case 'product_all':
                    include_once("./html/all_product/index.php");
                    break;
                case 'iphone_list':
                    include_once("./html/list_iphone/index.php");
                    break;
                case 'ipad_list':
                    include_once("./html/list_ipad/index.php");
                    break;
                case 'mac_list':
                    include_once("./html/list_mac/index.php");
                    break;
                case 'watch_list':
                    include_once("./html/list_watch/index.php");
                    break;
                case 'accessory_list':
                    include_once("./html/list-pk/index.php");
                    break;
                case 'product_details':
                    if (isset($_GET['id'])) {
                        include_once("./html/product_details/index.php");
                    } else {
                        echo 'SẢN PHẨM KHÔNG TỒN TẠI';
                    }
                    break;
                case 'cart':
                    include_once("./html/Cart/index.php");
                    break;
                case 'orders':
                    include_once("./html/orders/index.php");
                    break;

                default:
                    include_once("./html/home/index.php");
                    break;
            }
        } else {
            include_once("./html/home/index.php");
        }
        include_once("./html/footer/index.php");
        ?>
        <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up"></i></button>
    </div>
    <script src="./assets/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="./assets/js/blossom.js?"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.158.0/three.min.js" integrity="sha512-/WaZCC76Yn6MLEoK6b9np9yiLBet/RngBS33X1P0SHuag6j2E0e5rT7jbA2CvXCydN6+FkDYNx8FBM+vkzsthw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>AOS.init();</script>
</body>

</html>