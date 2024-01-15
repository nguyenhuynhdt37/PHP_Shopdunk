<?php

include("./handle/connect.php");
include("./handle/function.php");

?>

<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/product_all.css?version=55">
</head>

<div class="product_list">
    <!-- Scroll To Top Button -->
    <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up"></i></button>

    <div class="container-fluid p-0">
    <?php include_once("./html/slide/slide.php") ?>
    </div>
    <div class="container">


        <div class="main__product">
            <div class="product__iphone text-center ">
                <h2 class="title fw-bold " style="font-size: 4rem; margin: 5rem 0 !important;">Apple Watch</h2>
                <ul class="list__iphone-product d-none py-5">
                    <li class="iphone_item">
                        <a href="" class="mode mode1"> Tất cả </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone 15 series </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone 14 series </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone 13 series </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone 12 series </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone 11 series </a>
                    </li>
                    <li class="iphone_item">
                        <a href="" class="mode"> iPhone SE series </a>
                    </li>

                </ul>
                <div class="row list__product--main">
                    <?php
                    SELECT_PRODUCT(1, $conn, 6);
                    ?>
                </div>
                <ul class="pager d-flex justify-content-center" style="margin: 3rem  0 4.5rem 0 !important;">

                    <li class="current-page list-unstyled text-white me-4 fs-4   bg-primary" style="border-radius: 0.7rem; padding: 0.6rem 1.3rem !important;"><span>1</span></li>
                    <li class="individual-page list-unstyled bg-white me-4 fs-4  " style="border-radius: 0.7rem; padding: 0.6rem 1.3rem !important;"><a style="text-decoration: none;">2</a></li>
                    <li class="next-page list-unstyled bg-white me-4 fs-4  " style="border-radius: 0.7rem; padding: 0.6rem 1.3rem !important;"><a style="text-decoration: none;"><i class="fa-solid fa-chevron-right"></i></a></li>

                </ul>
                <div class="row product__sub my-5">
                    <div class=" col-md-6 col-12 product__box">
                        <div class="product__fit bg-white" style="border-radius: 1rem !important;min-height: 24rem;">
                            <div class="row product__more align-items-center p-5">
                                <div class="col-md-5 col-5" style="text-align: center;display: flex;justify-content: center;">
                                    <img src="https://shopdunk.com/images/thumbs/0000596_iphone-13_240.png" alt="" style="width: 70%;" class="product__fit--img">
                                </div>
                                <div class="col-md-7 col-7 product__fit--box text-start">
                                    <div class="product__fit--title fw-bold pb-4" style="font-size: 3rem;">Tìm
                                        iPhone <br>phù hợp với bạn</div>
                                    <a href="#" class="product__fit--more fs-3 text-decoration-none">So sánh các
                                        iPhone
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="col l-2 m-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 col-12 product__box">
                        <div class="product__fit bg-white" style="border-radius: 1rem !important;min-height: 24rem;">
                            <div class="row product__more align-items-center p-5">
                                <div class="col-md-5 col-5" style="text-align: center;display: flex;justify-content: center;">
                                    <img src="https://www.jumpplus.com/web/image/product.template/39084/image_256/Apple%20Watch%20Series%209%20%28PRODUCT%29RED%20Aluminium%20Case%20with%20%28PRODUCT%29RED%20Sport%20Band?unique=c9a9f63" style="width: 70%;" alt="" class="product__fit--img">
                                </div>
                                <div class="col-md-7 col-7 product__fit--box text-start">
                                    <div class="product__fit--title fw-bold pb-4" style="font-size: 3rem;">Tìm
                                        iPhone <br>phù hợp với bạn</div>
                                    <a href="#" class="product__fit--more fs-3 text-decoration-none">So sánh các
                                        iPhone
                                        <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="col l-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category__box bg-white text-start mb-5" style="border-radius: 1rem; padding: 4rem;">
                    <div class=" category-description">
                        <div class="category__history pb-4">
                            <h2 class="category__history--title fw-bold fs-1 pb-1">Lịch sử hình thành, phát triển
                                của iPhone</h2>
                            <p class="category__history--content" style="color: #333;font-size: 1.5rem;">iPhone là
                                dòng điện thoại thông minh được phát
                                triển
                                từ
                                Apple Inc, được ra mắt lần đầu tiên bởi Steve Jobs và mở bán năm 2007. Bên cạnh tính
                                năng
                                của một máy điện thoại thông thường, iPhone còn được trang bị màn hình cảm ứng,
                                camera,
                                khả
                                năng chơi nhạc và chiếu phim, trình duyệt web... Phiên bản thứ hai là iPhone 3G ra
                                mắt
                                tháng
                                7 năm 2008, được trang bị thêm hệ thống định vị toàn cầu, mạng 3G tốc độ cao. Trải
                                qua
                                15
                                năm tính đến nay đã có đến 34 mẫu iPhone được sản xuất từ dòng 2G cho đến iPhone 13
                                Pro
                                Max
                                và Apple là một trong những thương hiệu điện thoại được yêu thích và sử dụng phổ
                                biến
                                nhất
                                trên thế giới.</p>
                        </div>
                        <div class=" category__history pb-4">
                            <h2 class="category__history--title fw-bold fs-1 pb-1">iPhone có những mã máy nào?</h2>
                            <p class="category__history--content" style="color: #333;font-size: 1.5rem;">Những chiếc
                                iPhone do Apple phân phối tại thị
                                trường
                                nước
                                nào thì sẽ mang mã của nước đó. Ví dụ: LL: Mỹ, ZA: Singapore, TH: Thái Lan, JA: Nhật
                                Bản,
                                Những mã này xuất hiện tại Việt Nam đều là hàng xách tay, nhập khẩu. Còn tại Việt
                                Nam,
                                iPhone sẽ được mang mã VN/A. Tất cả các mã này đều là hàng chính hãng phân phối của
                                Apple.
                                Lợi thế khi bạn sử dụng iPhone mã VN/A đó là chế độ bảo hành tốt hơn với 12 tháng
                                theo
                                tiêu
                                chuẩn của Apple. iPhone của bạn sẽ được bảo hành tại tất cả các trung tâm bảo hành
                                Apple
                                tại
                                Việt Nam, một số mã quốc tế bị từ chối bảo hành và phải đem ra các trung tâm bảo
                                hành
                                Apple
                                tại nước ngoài. Rất là phức tạp đúng không nào?</p>
                        </div>
                        <div class=" category__history pb-4">
                            <h2 class="category__history--title fw-bold fs-1 pb-1">Apple đã khai tử những dòng
                                iPhone nào?</h2>
                            <p class="category__history--content" style="color: #333;font-size: 1.5rem;">Tính đến
                                nay, Apple đã khai tử (ngừng sản xuất)
                                các
                                dòng
                                iPhone đời cũ bao gồm: iPhone 2G, iPhone 3G, iPhone 4, iPhone 5 series, iPhone 6
                                series,
                                iPhone 7 series, iPhone 8 series, iPhone X series, iPhone SE (thế hệ 1), iPhone SE
                                (thế
                                hệ
                                2), iPhone 11 Pro, iPhone 11 Pro Max, iPhone 12 Pro, iPhone 12 Pro Max.</p>
                        </div>
                        <div class=" category__history pb-4">
                            <h2 class="category__history--title fw-bold fs-1 pb-1">Apple cung cấp những dòng iPhone
                                nào?</h2>
                            <p class="category__history--content" style="color: #333;font-size: 1.5rem;">ShopDunk là
                                một trong những thương hiệu bán lẻ
                                được
                                Apple
                                uỷ quyền tại Việt Nam, đáp ứng được các yêu cầu khắt khe từ Apple như: dịch vụ kinh
                                doanh,
                                dịch vụ chăm sóc khách hàng, Store Location đặt ...</p>
                        </div>
                        <div class=" category__history pb-4">
                            <h2 class="category__history--title fw-bold fs-1 pb-1">Mua iPhone giá tốt nhất tại Apple
                            </h2>
                            <p class="category__history--content" style="color: #333;font-size: 1.5rem;">Apple là
                                đại lý uỷ quyền Apple tại Việt Nam với hệ thống 40 cửa hàng trên toàn quốc, trong đó
                                có 11 Mono Store. Đến nay, ShopDunk đã trở thành điểm dừng chân lý tưởng cho iFans
                                nói chung và thế hệ GenZ nói riêng bởi độ chuẩn và chất. Không gian thiết kế và bài
                                trí sản phẩm theo tiêu chuẩn của Apple, chia theo từng khu vực rõ ràng, bàn trải
                                nghiệm rộng rãi và đầy đủ sản phẩm.
                                Tại ShopDunk luôn có mức giá tốt nhất cho người dùng cùng với nhiều chương trình hấp
                                dẫn diễn ra liên tục trong tháng. Hãy đến với chúng tôi và trải nghiệm ngay những
                                mẫu iPhone mới nhất với đội ngũ chuyên viên tư vấn được đào tạo bài bản từ Apple,
                                sẵn sàng hỗ trợ bạn về sản phẩm, kỹ thuật hay các công nghệ mới nhất từ Apple.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
