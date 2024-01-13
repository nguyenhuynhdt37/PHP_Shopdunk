<?php
include('./handle/connect.php');
include('./handle/function.php');
?>



<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/product_all.css?version=55">
</head>

<div class="all">

    <!-- All Content Container -->
    <div class="container-fluid p-0">
    <?php include_once("./html/slide/slide.php") ?>
    </div>
    <div class="container">
        <div class="main__product">
            <div class="row list_ev">
                <div class="col-12 col-md-4">
                    <div class="box_img">
                        <img src="https://shopdunk.com/images/uploaded/banner/bonus%20banner/xxx/1a.png" style="width: 100%;" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-4 mb_hiden">
                    <div class="box_img">
                        <img src="https://shopdunk.com/images/uploaded/banner/bonus%20banner/xxx/L%C3%AA%20B%E1%BB%91ng.png" style="width: 100%;" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-4 mb_hiden">
                    <div class="box_img">
                        <img src="https://shopdunk.com/images/uploaded/banner/bonus%20banner/xxx/e.png" style="width: 100%;" alt="">
                    </div>
                </div>
            </div>
            <br> <br> <br>
            <div class="product__iphone text-center ">
                <h2 class="title fw-bold " style="font-size: 3rem; padding-bottom: 2rem;">iPhone</h2>
                <div class="row list__product--main">
                    <?php
                    SELECT_PRODUCT(1, $conn, 6);
                    ?>
                </div>
                <button type="button" class="btn btn__show btn-outline-primary fs-5 my-5">Xem tất cả iPhone <i class="ms-1 fa-solid fa-angle-right fs-4" style="position: relative; top: 1px;"></i></button>
            </div>
            <div class="product__iphone text-center ">
                <h2 class="title fw-bold " style="font-size: 3rem; padding-bottom: 2rem;">iPad</h2>
                <div class="row list__product--main">
                    <?php
                    SELECT_PRODUCT(2, $conn, 6);
                    ?>
                </div>
                <button type="button" class="btn btn__show btn-outline-primary fs-5 my-5">Xem tất cả iPad <i class="ms-1 fa-solid fa-angle-right fs-4" style="position: relative; top: 1px;"></i></button>
            </div>
            <div class="product__iphone text-center ">
                <h2 class="title fw-bold " style="font-size: 3rem; padding-bottom: 2rem;">Mac</h2>
                <div class="row list__product--main">
                    <?php
                    SELECT_PRODUCT(3, $conn, 6);
                    ?>
                </div>
                <button type="button" class="btn btn__show btn-outline-primary fs-5 my-5">Xem tất cả Mac <i class="ms-1 fa-solid fa-angle-right fs-4" style="position: relative; top: 1px;"></i></button>
            </div>
            <div class="product__iphone text-center ">
                <h2 class="title fw-bold " style="font-size: 3rem; padding-bottom: 2rem;">Watch</h2>
                <div class="row list__product--main">
                    <?php
                    SELECT_PRODUCT(4, $conn, 6);
                    ?>
                </div>
                <button type="button" class="btn btn__show btn-outline-primary fs-5 my-5">Xem tất cả Watch <i class="ms-1 fa-solid fa-angle-right fs-4" style="position: relative; top: 1px;"></i></button>
            </div>
        </div>
        <div class="bg__banner">
            <a href=""><img src="https://shopdunk.com/images/uploaded/Trang%20ch%E1%BB%A7/2.jpeg" class="img-band" alt="" style="width: 100%;"></a>
        </div>
        <div class="product__iphone text-center ">
            <h2 class="title fw-bold " style="font-size: 3rem; padding: 2rem 0;">Tin Tức</h2>
            <div class="row list__product--main">
                <div class=" note-xa col-md-12 col-lg-4  pe-4 bg-bg-white" style="">
                    <div class="card border-0" style="border-radius:1rem !important;">
                        <img src="https://shopdunk.com/images/thumbs/0023801_%E1%BA%A2nh%20m%C3%A0n%20h%C3%ACnh%202023-11-15%20l%C3%BAc%2016.28.31_1600.png" class="card-img-top" style="max-height: 218px !important;" alt="...">
                        <div class="card-body p-4 text-start">
                            <a class="card-text fs-3 fw-bold mb-5 text-decoration-none text-dark">iPad đang dần thay thế Macbook như thế nào?
                            </a>
                            <p class="span__tt--update fs-4 mb-2 text-secondary">
                                15/11/2023
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" note-xa col-md-12 col-lg-4  px-2 bg-bg-white" style="">
                    <div class="card border-0" style="border-radius:1rem !important;">
                        <img src="https://shopdunk.com/images/thumbs/0023751_Screen%20Shot%202023-11-13%20at%2015.28.00_1600.png" class="card-img-top" style="max-height: 218px !important;" alt="...">
                        <div class="card-body p-4 text-start">
                            <a class="card-text fs-3 fw-bold mb-5 text-decoration-none text-dark">SHOPDUNK NHÀ MỚI - MỜI BẠN TỚI LÊ VĂN LƯƠNG
                            </a>
                            <p class="span__tt--update fs-4 mb-2 text-secondary">
                                15/11/2023
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" note-xa col-md-12 col-lg-4  ps-4 bg-bg-white" style="">
                    <div class="card border-0" style="border-radius:1rem !important;">
                        <img src="https://shopdunk.com/images/thumbs/0023713_co-nen-mua-macbook-pro-m3-ava_1600.jpeg" class="card-img-top" style="max-height: 218px !important;" alt="...">
                        <div class="card-body p-4 text-start">
                            <a class="card-text fs-3 fw-bold mb-5 text-decoration-none text-dark">Ai nên mua MacBook Pro M3 với cải tiến chính về GPU? - Tư vấn chi tiết
                            </a>
                            <p class="span__tt--update fs-4 mb-2 text-secondary">
                                15/11/2023
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn__show btn-outline-primary fs-5 my-5">Xem tất cả tin tức <i class="ms-1 fa-solid fa-angle-right fs-4" style="position: relative; top: 1px;"></i></button>
        </div>
    </div>
</div>
<!-- Modal search -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <input class="search-bar form-control form-control-lg fs-4 ps-4" type="search" placeholder="Search..." aria-label="Search">
        </div>
    </div>
</div>
</div>