<?php
include('./handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$product_id = $_GET['id'];

$sqlColor = "SELECT * FROM productcolors pc
            INNER JOIN colors c ON pc.color_id = c.color_id
            where pc.product_id = $product_id";
$resultColor = $conn->query($sqlColor);

$sqlMemory = "SELECT * FROM memory_options mo
            INNER JOIN memory m ON m.id = mo.memory_id
            where mo.product_id = $product_id";


$resultMemory = $conn->query($sqlMemory);

$name = "SELECT title FROM `product` where id = $product_id";
$name_pr = $conn->query($name);

// Kiểm tra và đưa dữ liệu về dạng JSON
if ($resultColor->num_rows > 0 && $resultMemory->num_rows > 0 && $name_pr->num_rows > 0) {
    $row = $name_pr->fetch_assoc();
?>
    <script>
        const name_tr = <?= json_encode($row['title']); ?>
    </script>
<?php
    $colorData = array();

    while ($row = $resultColor->fetch_assoc()) {
        $id = $row['name'];
        // Nếu id chưa tồn tại trong mảng colorData, thêm mới
        if (!isset($colorData[$id])) {
            $colorData[$id] = array(
                'id' => $id,
                'images' => array($row['images'])
            );
        } else {
            // Nếu id đã tồn tại, thêm images vào mảng images của id đó
            $colorData[$id]['images'][] = $row['images'];
        }
    }

    // Chuyển định dạng mảng colorData để nó trở thành mảng tuần tự
    $colorData = array_values($colorData);

    // Lấy thông tin tùy chọn bộ nhớ và thêm vào mảng $memoryOptions
    $memoryOptions = array();
    while ($rowMemory = $resultMemory->fetch_assoc()) {
        $id = str_replace(["\r", "\n"], '', $rowMemory['name']);
        $memoryOptions[] = array(
            'id' => $id,
            'old' => $rowMemory['price'],
            'new' => $rowMemory['discount'],
        );
    }

    // Kết hợp thông tin màu sắc và tùy chọn bộ nhớ thành một mảng kết hợp
    $resultArray = array('img' => $colorData, 'prices' => $memoryOptions);

    // Chuyển mảng thành chuỗi JSON
    $jsonString = json_encode($resultArray, JSON_PRETTY_PRINT);

    // save json
    $filePath = './jsonServer/product_details.json';
    file_put_contents($filePath, $jsonString);
} else {
    echo "0 results";
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/product_details.css?version=51">
    <link rel="stylesheet" type="text/css" href="./assets/css/modal.css?version=51">
</head>

    <div class="product_details bg-white">
        <div class="container container_main" style="margin-top: 5rem; position: relative;">
            <div class="row product__main justify-content-center">
                <ul class="px-3 product__nav-list d-flex m-0 fs-4 p-0 py-3 text-secondary align-items-center border-bottom" style="font-weight: 1500 !important;">
                    <li class="product__nav-item list-unstyled me-2">
                        Apple
                        <i class=" fa-solid fa-chevron-right fs-5"></i>
                        </a>
                    <li class="product__nav-item list-unstyled me-2">
                        <?php
                        $modem = "select * from category where id in (
                            select category_id from product where id = '$product_id'
                        )";
                        $modem1 = mysqli_query($conn, $modem);
                        $modem2 = mysqli_fetch_assoc($modem1);
                        ?>
                        <a class="text-decoration-none text-secondary"><?= $modem2['name'] ?>
                            <i class=" fa-solid fa-chevron-right fs-5"></i>
                        </a>
                    </li>
                    <li class="product__nav-item node3 list-unstyled">
                        <a class="text-decoration-none text-success product__title--name" href=""></a>
                    </li>
                </ul>

                <div class="row product__content-main mt-3 justify-content-between">

                    <div class="col-lg-6 product--img ">
                        <div class="container-lg" style="position: relative;">
                            <a class="img_Switch text-decoration-none img_Switch-left" href="#myCarousel" data-bs-slide="prev">
                                <div class="icon-box">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </div>
                            </a>
                            <a class="img_Switch text-decoration-none img_Switch-right " href="#myCarousel" data-bs-slide="next">
                                <div class="icon-box">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </a>
                            <div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <!-- Carousel indicators -->

                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner" style="min-height: 30rem;">

                                    <div class="carousel-item active">
                                        <img src="https://xedaiphattai.com.vn/wp-content/uploads/2020/06/bg-tra%CC%86%CC%81ng-lie%CC%82n-he%CC%A3%CC%82-250x300.jpg" class="d-block w-100" alt="Slide 1">

                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://xedaiphattai.com.vn/wp-content/uploads/2020/06/bg-tra%CC%86%CC%81ng-lie%CC%82n-he%CC%A3%CC%82-250x300.jpg" class="d-block w-100" alt="Slide 2">

                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://xedaiphattai.com.vn/wp-content/uploads/2020/06/bg-tra%CC%86%CC%81ng-lie%CC%82n-he%CC%A3%CC%82-250x300.jpg" class="d-block w-100" alt="Slide 3">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 product__details-x mt-4 ps-5">
                        <div class="product__title--y p-0 align-items-center border-bottom pb-3">
                            <h2 class="product__name m-0 p-0 me-4 fs-1 pb-2 fw-bold"></h2>

                            <div class="product__evaluate d-flex align-items-center fs-4">
                                <div class="product__degree-evaluation d-inline-block me-2">
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                    <i class="fa-solid fa-star text-warning"></i>
                                </div>
                                <p class="product__evaluate--comments d-inline-block m-0"><a class="text-decoration-none" href="">13
                                        đánh giá</a>
                                </p>
                            </div>
                        </div>
                        <div class="product__price d-flex align-items-center mt-4">
                            <span class=" price-curent fs-1 text-primary fw-bold me-2"></span>
                            <span class="price-old fs-2"></span>
                        </div>
                        <div class="product__capacity">
                            <p class="product__capacity-title my-3 fs-3">Dung lượng</p>
                            <ul class="product__capacity--list p-0">
                                <li class="product__capacity--index d-inline-block  me-3 fs-4  active1">
                                    128GB
                                </li>
                                <li class="product__capacity--index d-inline-block  me-3 fs-4  ">
                                    256GB
                                </li>
                                <li class="product__capacity--index d-inline-block  me-3 fs-4  ">
                                    512GB
                                </li>
                                <li class="product__capacity--index d-inline-block  me-3 fs-4  ">
                                    1T</li>
                            </ul>
                        </div>
                        <div class="product__color-box mb-4">
                            <p class="product__color--title fs-3">Màu sắc</p>
                            <ul class="product__colors m-0 p-0">
                                <li class="color-item p-1 me-2 white list-unstyled d-inline-block border border-color border-3 ">
                                </li>
                                <li class="color-item p-1 me-2 yellow list-unstyled d-inline-block">
                                </li>
                                <li class="color-item p-1 me-2 green list-unstyled d-inline-block">
                                </li>
                                <li class="color-item p-1 me-2 silver list-unstyled d-inline-block">
                                </li>
                                <li class="color-item p-1 me-2 black list-unstyled d-inline-block">
                                </li>
                            </ul>
                        </div>
                        <div class="product__promotion  border border-1 p-4" style="border-radius: 1rem;">
                            <div class="product__promotion-title fs-4 fw-bold mb-3">
                                <i class="fa-solid fa-gift me-2"></i> Ưu đãi
                            </div>
                            <div class="product__promotion--detail">
                                <div class="ps-4 promotion-item fs-5">
                                    <h4 class="promotion-item-title my-2" style="color: rgb(214, 75, 57);">
                                        I. Ưu đã thanh toán
                                    </h4>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span>Giảm tới <strong>1500.000đ </strong>qua cổng thanh toán</span> <br>
                                    </div>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span>Giảm tới <strong>2.0000.000đ </strong>khi thanh toán qua thẻ tín
                                            dụng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product__promotion--detail">
                                <div class="ps-4 promotion-item fs-5">
                                    <h4 class="promotion-item-title my-2" style="color: rgb(214, 75, 57);">
                                        II. Ưu đãi trả góp (1/11 - 31/12)
                                    </h4>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span>Ưu đãi tới <strong>1500.000đ </strong>khi thanh toán trả góp</span> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="product__promotion--detail">
                                <div class="ps-4 promotion-item fs-5">
                                    <h4 class="promotion-item-title my-2" style="color: rgb(214, 75, 57);">
                                        III. Thu cũ đổi mới lên đời iPhone 14 series
                                    </h4>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span>Trợ giá tới <strong>1.1500.000đ </strong>cho khách lên đời iPhone 15
                                            series
                                        </span> <br>
                                    </div>

                                </div>
                            </div>
                            <div class="product__promotion--detail">
                                <div class="ps-4 promotion-item fs-5">
                                    <h4 class="promotion-item-title my-2" style="color: rgb(214, 75, 57);">
                                        IV. Ưu đãi mua kèm iPhone 15 series
                                    </h4>
                                    <div class="promotion-content py-1">
                                        <img src="https://shopdunk.com/images/uploaded/icon-gif/best-offer.gif" alt="" width="20" height="20" class="mx-1">
                                        <span>Mua kèm giảm sâu phụ kiện Apple</span> <br>
                                    </div>
                                    <div class="promotion-content py-1">
                                        <img src="https://shopdunk.com/images/uploaded/icon-gif/best-offer.gif" alt="" width="20" height="20" class="mx-1">
                                        <span> Mua kèm giảm sâu phụ kiện Non Apple </span> <br>
                                    </div>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span> Giảm 10% khi mua Bảo hành tiêu chuẩn mở rộng (6 tháng, 12 tháng) </span>
                                        <br>
                                    </div>
                                    <div class="promotion-content py-1">
                                        <i class="fa-solid fa-circle-check mx-1" style="color: limegreen;"></i>
                                        <span> Giảm 20% khi mua Bảo hành kim cương, Bảo hành VIP (Rơi vỡ, vào
                                            nước)</span> <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__buy mt-5">
                            <div class="d-grid gap-2">
                                <button class="add_sp btn btn-origin bg-success py-4 fs-4 text-white mb-2" style="border-radius: 1rem !important;" type="button" data-toggle="modal" data-target="#successModal">THÊM VÀO GIỎ HÀNG <i class="fa-solid fa-cat"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container-box pb-5" style="margin-top: 10rem;">

            <div class="tab-details text-center">
                <button type="button" class="btn btn-outline-primary" style="padding: 0.7rem 3rem !important; font-size: 1.5rem; font-weight: 1500; border-radius: 0.5rem;">Mô
                    tả sản phẩm</button>
            </div>
            <div class="product__trademark mx-auto" style="width: 90%; ">
                <div class="product__title--move  product__banner--title text-center" style="font-size: 4.5rem;font-weight: 1500;margin-top: 3rem;">
                    <i class="fa-brands fa-apple"></i>
                    <span>iPhone</span>
                </div>
                <div class="row product__description--display d-flex align-items-center ">
                    <h2 class="col-sm-12 col-md-6 col-tg-6 ps-5 product__description--display--title  d-flex align-items-center" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">
                        Dynamic Island
                        đưa
                        thông
                        tin
                        quan
                        trọng
                        lên
                        đầu.
                    </h2>
                    <div class="col-sm-12 col-md-6 col-tg-6 text-center pe-5">
                        <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/dynamic_island_large_2x.png?1694035518949" alt="" class=" product__description--display--img " style="width: 65% !important;">
                    </div>
                </div>
                <div class="row design__description justify-content-between" style="margin-top: 5rem;">
                    <div class="col-sm-12 col-md-6 col-lg-6  design__material--box box-1 pe-3">
                        <div class="row design__material justify-content-center px-5">
                            <p class="col-12 design__material--title fw-bold text-center mt-5" data-aos="fade-right" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.8;font-size: 3rem;">Thiết kế bằng kính
                                pha màu <br> và
                                nhôm bền
                                bỉ.
                            </p>
                            <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/color_large_2x.png?1694035518949" alt="" class="design__material--img my-5" style="width: 80%;">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6  design__material--box box-2 ps-4">
                        <div class="row design__size align-items-center px-4 justify-content-center pt-5 align-items-center">
                            <div class="col-6 fs-1 fw-bolder design__size-big text-center" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.8;">
                                <p class="size-display__title">6,7″</p>
                                <p class="size-display__title--name">iPhone 15 Plus</p>
                            </div>
                            <div class="col-6 fs-1 fw-bolder design__size-big text-center" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.8;">
                                <p class="size-display__title">6,1″</p>
                                <p class="size-display__title--name">iPhone 15</p>
                            </div>
                            <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/display_size_large.png?1694035518951" alt="" class="col-12 size-display--img py-5" style="width: 40%;">
                        </div>
                    </div>

                </div>
                <div class="row design__description" style="margin-top: 5rem;">
                    <div class="col-sm-12 col-md-8 col-xg-6 product__camera p-0 pe-2">
                        <div class="product__camera--box1" style="position: relative;">
                            <img src="https://shopdunk.com/images/uploaded/iPhone%2015%20Pro%201TB/camera%20iphone%2015%20plus/camera-chinh-48mp-cua-iphone-15-plus.jpg" alt="" class="product__camera--img" style="width: 100%; border-radius: 2rem;">
                            <div class="product-cam-ct text-center position text-light fw-bold" style="position: absolute; top: 3rem;left: 150%; transform: translateX(-150%); width: 100%;">
                                <p class="cam-main-resolution fs-1">Camera Chính 48MP</p>
                                <p class="cam-main-describe" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="1" style="font-size: 3rem;">Ảnh có độ phân giải siêu cao.
                                    <br> Telephoto 2x.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xg-6 product__camera--front p-0 ps-2">
                        <div class="product__camera--box text-end" style="overflow: hidden;">
                            <div class="front-camera__title py-4 px-4 fs-1 fw-bolder text-center" style="opacity: 0.8;">
                                Ảnh chân dung <br>
                                thế hệ mới.</div>
                            <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/portrait_mode_small.png?1694035518951" alt="" class="product__camera-front--img" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" width="80%">
                        </div>
                    </div>
                </div>
                <div class="row product__battery px-4 justify-content-center align-items-center" style="margin-top: 5rem;">
                    <div class="col-12 product__battery--title fs-1 fw-bold text-center" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" s style="opacity: 0.9;">Pin
                        dùng cả ngày. <br>Cứ
                        tiếp tục làm
                        mọi
                        việc
                        bạn
                        muốn.</div>
                    <div class="col-2  product__battery--model  text-center" data-aos="fade-right" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.6; ">
                        <p class="battery__model--title">Lên đến</p>
                        <div class="battery__model--max">26 giờ</div>
                        <div class="battery__model--action">thời gian xem video trên iPhone 15 Plus.
                        </div>
                    </div>
                    <div class="col-8 product__battery--img">

                        <div class="x-img-box text-center">
                            <img src="../../assets/images/product/iphone/product_battery.png" data-aos="zoom-in" data-aos-duration="1800" data-aos-offset="200" class="py-5" style="width: 80%">

                        </div>
                    </div>
                    <div class="col-2   product__battery--model  text-center" data-aos="fade-left" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.6; ">
                        <p class="battery__model--title">Lên đến</p>
                        <div class="battery__model--max">20 giờ</div>
                        <div class="battery__model--action">thời gian xem video trên iPhone 15.</div>
                    </div>
                </div>
                <div class="row product__perfomence  justify-content-between" style="margin-top: 5rem;">
                    <div class="col-sm-12 col-md-6 col-lg-4 product__perfomence--box p-0 pe-2">
                        <div class="product__perfomence--cpu text-center px-5 py-4">
                            <p class="cpu-title fs-2 fw-bolder m-0 mb-1 pt-5" style="color: #767676;">
                                Chip A16
                                Bionic</p>
                            <p class="cpu-confirm fs-1 fw-bolder m-0 px-5" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="1" style="opacity: 0.8; line-height: 1.2;">
                                Sức
                                mạnh
                                Pro đã được kiểm
                                chứng.</p>
                            <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/a16_bionic_large_2x.png?1694035518951" alt="" class="cpu-img" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-8 product__charger p-0 ps-2">
                        <div class="product__charger--box p-0 pt-5 ">
                            <p class="product__charger--title text-center pt-5 fs-1 fw-bold" style="opacity: 0.8;">
                                Sạc dễ
                                dàng <br>
                                với USB-C.</p>
                            <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/usb-c_large_2x.png?1694035518948" data-aos="fade-up" data-aos-duration="1800" data-aos-offset="200" alt="" class="product__charger-img" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <div class="product__title--move product__special--design text-center  fs-1 fw-bold" style="opacity: 0.8; margin-top: 5rem;">Được
                    thiết
                    kế
                    để tạo nên khác biệt.
                </div>
                <div class="row text-center product__security justify-content-center" style="margin-top: 5rem;">
                    <div class="product__security--logo  py-3 pt-5" style="font-size: 4rem">
                        <i class="fa-brands fa-apple"></i>
                    </div>
                    <div class="product__security--title fs-1 fw-bold mb-2" style="opacity:  0.9;">
                        Quyền riêng tư. Rất
                        iPhone.</div>
                    <p class="product__security--describe fs-4 mb-5 text-secondary" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">
                        Từ Mã Khóa đến Báo Cáo Quyền Riêng Tư<br>
                        đến ứng dụng Sức Khoẻ, iPhone cho bạn <br>
                        quyền kiểm soát những gì mình chia sẻ.
                    </p>
                    <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/flex_privacy_final_large_2x.png?1694035518951" alt="" class="product__security--img" style="width: 40%;">
                </div>
                <p class="product__title--move product__update--title fs-1 fw-bold text-center" style="opacity: 0.8; margin: 0; margin-top: 5rem;">
                    Nâng cấp
                    dễ
                    dàng <br> Chuyển đổi đơn
                    giản.</p>
                <div class="row product__lever-up " style="margin-top: 5rem;">
                    <div class="col-md-6 col-lg-6 col-md-3 product__update--box-1">
                        <div class="product__update text-center d-flex flex-column justify-content-center" style="min-height: 30rem; padding: 3rem 5rem;">
                            <i class="fa-solid fa-repeat product__update--icon fs-1 text-primary"></i>
                            <p class="product__update--question fs-2 fw-bold mt-3" style="opacity: 0.8;">Chuyển
                                sang
                                iPhone?</p>
                            <p class="product__update--answer fs-3 m-0 text-justify text-secondary">Bạn chỉ cần đặt
                                iPhone cũ
                                cạnh
                                iPhone
                                mới,
                                và
                                với
                                vài cú
                                chạm, bạn có thể chuyển dữ liệu của mình hoàn toàn tự động.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-md-3 product__update--box-2">
                        <div class="product__update text-center  d-flex flex-column justify-content-center" style="min-height: 30rem; padding: 3rem  5rem;">
                            <i class="fa-solid fa-arrow-up-right-dots product__update--icon fs-1 text-primary"></i>
                            <p class="product__update--question fs-2 fw-bold mt-3" style="opacity: 0.8;">Nâng
                                cấp từ
                                iPhone cũ?
                            </p>
                            <p class="product__update--answer fs-3 m-0 text-justify text-secondary">Khi bạn mua một
                                chiếc
                                iPhone
                                mới,ứng
                                dụng
                                Chuyển
                                Sang
                                iOS sẽ giúp bạn>dễ dàng chuyển ảnh, danh bạ WhatsApp, và hơn thế
                                nữa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__more m-0">
        <div class="product__more--box container " style="margin-top: 5rem; padding-bottom: 5rem;">
            <div class="product__trademark mx-auto" style="width: 80%;">
                <p class="product__title--move product__more--title fw-bold text-center fs-1 " style="padding: 5rem; opacity: 0.8;">Vẫn
                    còn
                    nhiều món
                    đáng yêu.</p>
                <div class="row product__accessory px-4 pt-5 align-items-center text-center">
                    <div class="col-sm-12 col-md-6 product__accessory--info " style="">
                        <p class="accessory__title fs-1 fw-bold" style="opacity: 0.8;">Phụ kiện MagSafe</p>
                        <p class="accessory__title-main fs-1 fw-bold" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.6;">Gắn thêm một ốp
                            lưng,
                            một ví da từ tính hay cả
                            hai.
                        </p>
                        <p class=" accessory__content fs-4" style="opacity: 0.8">Một hệ sinh thái phụ
                            kiện đầy
                            màu
                            sắc, gắn kết
                            dễ
                            dàng và sạc không dây nhanh hơn. Với vô số cách phối, phong cách nào cũng có
                            một
                            bộ phụ kiện phù hợp.
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6 product__accessory--img pt-5">
                        <img src="https://shopdunk.com/images/uploaded-source/compareiphone15/flex_magsafe_large_2x.png?1694035518948" alt="" style="width: 100%;">
                    </div>
                </div>
                <div class="product__complimentary fs-5 text-secondary">
                    <div class="product__juridical--title fs-4 fw-bold text-black" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200" style="opacity: 0.8;"> Từ Chối
                        Trách
                        Nhiệm
                        Pháp Lý.</div>
                    <br>
                    <p class="product__juridical--screen" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200"> Màn hình có các góc bo tròn theo đường cong tuyệt
                        đẹp
                        và
                        nằm gọn theo một hình chữ nhật chuẩn. Khi tính theo hình chữ nhật chuẩn, kích thước
                        màn
                        hình
                        theo đường chéo là 5,42 inch (iPhone 13 mini, iPhone 12 mini), 5,85 inch (iPhone 11
                        Pro,
                        iPhone X , iPhone X), 6,06 inch (iPhone 14, iPhone 13 Pro, iPhone 13, iPhone 12 Pro,
                        iPhone
                        12, iPhone 11, iPhone X ), 6,12 inch (iPhone 15 Pro, iPhone 15, iPhone 14 Pro), 6,46
                        inch
                        (iPhone 11 Pro Max, iPhone X Max), 6,68 inch (iPhone 14 Plus, iPhone 13 Pro Max,
                        iPhone
                        12
                        Pro Max), hoặc 6,69 inch (iPhone 15 Pro Max, iPhone 15 Plus, iPhone 14 Pro Max).
                        Diện
                        tích
                        hiển thị thực tế nhỏ hơn.</p>
                    <br>
                    <p class="product__juridical--electricity" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">Pin Và Nguồn Điện: Tất cả các xác nhận về
                        thời
                        lượng pin phụ thuộc vào cấu hình mạng và nhiều yếu tố khác; các kết quả thực tế sẽ
                        khác
                        nhau. Pin có giới hạn chu kỳ sạc và cuối cùng có thể cần được thay thế. Thời lượng
                        pin
                        và chu kỳ sạc khác nhau tùy theo cách sử dụng và cài đặt. Truy cập </p>
                    <br>
                    <p class="product__juridical--charging-cable" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200"> Cáp Sạc USB-C đi kèm các phiên bản iPhone
                        15
                        tương thích với AirPods Pro (thế hệ thứ 2) có Hộp Sạc MagSafe (USB-C).
                        <br><br> Yêu cầu cáp USB 3 với tốc độ 10Gb/s để đạt tốc độ truyền nhanh hơn đến 20x
                        trên
                        các phiên bản iPhone 15 Pro.
                    </p>
                    <br>
                    <p class="product__juridical--network" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">Mạng Di Động Và Không Dây: Cần có gói cước dữ
                        liệu.
                        Mạng 5G và LTE chỉ khả dụng ở một số thị trường và được cung cấp qua một số nhà
                        mạng.
                        Tốc độ phụ thuộc vào thông lượng lý thuyết và có thể thay đổi tùy địa điểm và nhà
                        mạng.
                        Để biết thông tin về hỗ trợ mạng 5G và LTE, vui lòng liên hệ nhà mạng và truy cập
                    </p>
                    <br>
                    <p class="product__juridical--accessory" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200"> Các màu chỉ nhằm mục đích minh họa. Phụ kiện
                        MagSafe được bán riêng.</p>
                    <br>
                    <p class="product__juridical--guarantee-plus" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">Ưu Đãi Apple TV+: Chỉ dành cho thuê bao
                        mới và
                        thuê bao đã từng sử dụng đủ điều kiện. 179.000đ/tháng cho đến khi bị hủy. Một ưu đãi
                        cho
                        mỗi ID Apple và nhóm Chia Sẻ Trong Gia Đình. Có áp dụng các điều khoản; vui lòng
                        truy
                        cập </p>
                    <br>
                    <p class=" product__juridical--area" data-aos="fade-up" data-aos-duration="1400" data-aos-offset="200">Tính Năng Khả Dụng: Một số tính năng không khả dụng
                        tại
                        một số quốc gia hoặc khu vực.</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <input class="form-control form-control-lg fs-4 ps-4" type="search" placeholder="Search..." aria-label="Search">
            </div>
        </div>
    </div>
    </div>
    <div class="modal1 position-fixed bg-black align-items-center justify-content-center" style="display: none; z-index: 99;top: 0; left: 0; right: 0; bottom: 0">
        <div class="modal-dialog1" style="max-width: 35rem;">
            <div class="card text-center p-5">
                <div class="exit text-end  " style="cursor: pointer;">
                    <i class="fa-solid fa-xmark icon-exit fs-1"></i>
                </div>
                <div class="card-img">
                    <img class="img-fluid" src="https://i.imgur.com/4niebFr.jpg" style="width: 25%">
                </div>
                <div class="card-title fs-1 mt-4 fw-bold">
                    <p class="">Thêm sản phẩm vào giỏ hàng thành công!</p>
                </div>
                <div class="card-text fs-2 mb-2">
                    <p>Cảm ơn bạn đã ủng hộ chúng tôi!</p>
                </div>
                <button class="btn px-3 text-white border-2 fs-2 bg-primary rounded-3 py-2"><a style="text-decoration: none; color: #F5F5F7;" href="index.php?page_layout=cart">vào giỏ hàng ngay!</a></button>
            </div>
        </div>
    </div>
    <div class="content1" style="overflow: hidden;position: fixed; top: 0; left: 0;right: 0; bottom: 0;display: none; z-index: 99; justify-content: center;align-items: center; background: #000;">
        <div class="modal-content1 p-4 rounded-4" style="width: 30em; background: #fff;">
            <div class="modal-header ">
                <p class="modal-title1 fs-2 fw-bold">Bạn chưa đăng nhập!</p>
                <button type="button" class="close2 border-0 bg-white rounded-5" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark fs-2"></i>
                </button>
            </div>
            <div class="modal-body1">
                <p class="fs-3">Đăng nhập ngay!</p>
            </div>
            <div class="modal-footer1 d-flex">
                <button type="button" class="btn btn-secondary flex-fill no_login fs-2 me-2" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary flex-fill yes_login fs-2" id="yesBtn">Yes</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>F
</body>
<script>
    const $$ = document.querySelectorAll.bind(document)
    const $ = document.querySelector.bind(document)
    fetch('../../jsonServer/product_details.json')
        .then(response => {
            return response.json();
        })
        .then(data => {
            function formatNumber(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function filterNumber(element) {
                const arr_pr = element.innerText.match(/\d+/g);
                return parseInt(arr_pr.join(''), 10);
            }

            const App = {
                khoidong() {
                    (() => {
                        var htmls = '',
                            imgs = ''
                        data.img.forEach((ig, i) => {
                            if (i == 0) {

                                ig.images.forEach((e, i) => {
                                    if (i == 0) {
                                        imgs +=
                                            `<div class="carousel-item active">
                                            <img src="${e}" class="d-block w-100" alt="Slide ${i}">
                                        </div>`
                                    } else {
                                        imgs +=
                                            `<div class="carousel-item">
                                            <img src="${e}" class="d-block w-100" alt="Slide ${i}">
                                        </div>`
                                    }
                                    $('.carousel-inner').innerHTML = imgs
                                })
                                htmls += `<li class ="color-item p-1 me-2 ${ig.id} list-unstyled d-inline-block border border-success    border-3" data = '${ig.id}'></li>`
                            } else {
                                htmls += `<li class ="color-item p-1 me-2 ${ig.id} list-unstyled d-inline-block" data = '${ig.id}'></li>`

                            }
                            $('.product__colors').innerHTML = htmls
                        })
                    })();
                    (() => {
                        var htmls = ''
                        data.prices.forEach((pr, i) => {
                            if (i == 0) {
                                var pr_old = formatNumber(parseInt(pr.old))
                                console.log(pr_old);
                                $('.price-old').innerText = pr_old
                                htmls += `<li class="product__capacity--index d-inline-block  me-3 fs-4 active1">${pr.id}</li>`
                                $('.product__price').innerHTML = `<span class=" price-curent fs-1 text-primary fw-bold me-2">${pr.new}₫</span>
                                                                <span class="price-old fs-2">${pr.old}₫</span>`
                            } else {
                                htmls += `<li class="product__capacity--index d-inline-block  me-3 fs-4">${pr.id}</li>`
                            }
                        })
                        $('.product__capacity--list').innerHTML = htmls
                    })();
                    (() => {
                        $$('.product__capacity--index').forEach(capacity => {
                            console.log(capacity);
                            var check = capacity.classList.contains('active1')
                            if (check) {
                                $('.product__name').innerHTML = `${name_tr} - ${capacity.innerText}`
                                data.prices.forEach((price) => {
                                    console.log(price)
                                    if (price.id === capacity.innerText) {

                                        $('.price-curent').innerText = (`${formatNumber(parseInt(price.new))}đ`)
                                        $('.price-old').innerText = (`${formatNumber(parseInt(price.old))}đ`)
                                    }
                                })

                                document.title = $('.product__name').innerText
                                $('.node3').innerHTML = ` <a class="text-decoration-none product__title--name text-success" href="">${name_tr}</a>`

                            }
                        })
                    })()
                },
                handle() {
                    buttonCapacity: {
                        $$('.product__capacity--index').forEach((capacity) => {
                            capacity.onclick = () => {
                                setTimeout(() => {
                                    $$('.product__capacity--index').forEach((capacity1) => {
                                        capacity1.classList.remove('active1')
                                    })
                                    capacity.classList.add('active1')
                                    if (capacity.classList.contains('active1')) {
                                        data.prices.forEach((price) => {
                                            console.log(price)
                                            if (price.id === capacity.innerText) {

                                                $('.price-curent').innerText = (`${formatNumber(parseInt(price.new))}đ`)
                                                $('.price-old').innerText = (`${formatNumber(parseInt(price.old))}đ`)
                                                $('.product__name').innerHTML = (`${name_tr} - ${price.id}`)
                                                document.title = $('.product__name').innerText;
                                            }
                                        })
                                    }
                                }, 200)
                            }
                        })
                    };
                    (() => {
                        $$('.color-item').forEach(cl => {
                            cl.onclick = (e) => {
                                $$(".color-item").forEach(cl1 => {
                                    cl1.classList.remove('border', 'border-success', 'border-3')
                                })
                                cl.classList.add('border', 'border-success', 'border-3')
                                const color = cl.getAttribute('data')
                                let imgs = ''
                                data.img.forEach(ig => {
                                    if (ig.id == color) {
                                        ig.images.forEach((e, i) => {
                                            if (i == 0) {
                                                imgs +=
                                                    `<div class="carousel-item active">
                                            <img src="${e}" class="d-block w-100" alt="Slide ${i}">
                                        </div>`
                                            } else {
                                                imgs +=
                                                    `<div class="carousel-item">
                                            <img src="${e}" class="d-block w-100" alt="Slide ${i}">
                                        </div>`
                                            }
                                            $('.carousel-inner').innerHTML = imgs
                                        })
                                    }
                                })

                            };
                        });
                    })();
                    (() => {
                        $('.add_sp').onclick = e => {
                            if (!<?= isset($_SESSION['user']) ? 'true' : 'false'; ?>) {
                                $('.content1').style.display = "flex"
                                $('.close2').onclick = e => {
                                    $('.content1').style.display = "none"
                                }
                                $('.no_login').onclick = e => {
                                    $('.content1').style.display = "none"
                                }
                                $('.yes_login').onclick = e => {

                                    window.location.href = './html/login/index.php';

                                }
                            } else {
                                const price_new = filterNumber($('.price-curent'));
                                const price_old = filterNumber($('.price-old'));
                                const memory = $('.product__capacity--index.active1').innerText
                                const color = $('.color-item.border.border-success.border-3').getAttribute('data')
                                const product_name = $('.product__title--name').innerText
                                const data = {
                                    price_old: price_old,
                                    price_new: price_new,
                                    memory: memory,
                                    color: color,
                                    product_name: product_name

                                };
                                console.log(data);


                                fetch('./handle/add-to-cart.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify(data),
                                    })
                                    .then(response => response.text())
                                    .then(data => {
                                        if (data = "Sản phẩm đã được thêm vào giỏ hàng thành công.") {
                                            $('.modal1').style.display = "flex"
                                            $('.icon-exit').onclick = e => {
                                                setTimeout(() => {
                                                    window.location.replace(window.location.href);
                                                }, 100)
                                            }
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                    });
                            }
                        }
                    })();



                },
                render() {
                    this.khoidong()
                    this.handle()
                }
            }
            App.render()



        })
        .catch(error => console.error('Lỗi:', error));
</script>
<script>
    AOS.init()
</script>
