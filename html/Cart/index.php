<?php
include('./handle/connect.php');
$user_name = '';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $user_name = $_SESSION['user'];
} else {
}
$sql = "SELECT
p.title,
cs.name AS color_name,
p.thumbnail,
mo.discount,
m.name AS memory_name,
mo.memory_id,
c.soluong
FROM
product p
INNER JOIN memory_options mo ON mo.product_id = p.id
INNER JOIN memory m ON m.id = mo.memory_id
INNER JOIN carts c ON c.product_id = p.id AND c.memory_id = mo.memory_id
INNER JOIN colors cs ON cs.color_id = c.color_id
WHERE
c.user_id IN (SELECT u.id FROM users u WHERE u.fullname = '$user_name')
OR c.user_id IS NULL
GROUP BY
p.title, color_name, p.thumbnail, mo.discount, memory_name, mo.memory_id, c.soluong
";
$result = mysqli_query($conn, $sql);
?>

<head>
    <link rel="stylesheet" type="text/css" href="./assets/css/modal.css?version=51">
</head>
<style>
    .product_trast,
    .product_quantity {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 3rem;
        color: #a7a7a7;
        cursor: pointer;
        ;
    }

    .quantity__icon-down {
        position: absolute;
        top: 35%;
        left: 10%;
        transform: translateY(-50%);
    }

    .quantity__icon-up {
        position: absolute;
        top: 50%;
        right: 10%;
        transform: translateY(-50%);
    }

    .product_quantity {
        right: 4.7rem;
    }

    .billing_name-user:focus {
        outline: 1px solid #c2c1c1;
    }
</style>

<div class="cart">
    <!-- Scroll To Top Button -->
    <button id="scrollToTopBtn"><i class="fa-solid fa-arrow-up"></i></button>
    <!-- Header Navbar by Bootstrap -->
    <!-- All Content Container -->
    <div class="boxElement">
        <div class="container-fluid p-0 main-cart">
            <div class="bg-white">
                <div class="bg-white container py-3">
                    <ul class="list-item d-flex p-0 m-0">
                        <li class="item list-unstyled fs-5">Trang chủ <i class="fa-solid fa-angle-right fs-5 mx-2"></i>
                        </li>
                        <li class="item list-unstyled fs-5">Giỏ Hàng</li>
                    </ul>
                </div>
            </div>
            <div class="list_product container mt-4">
                <div class="row product_details px-2">
                    <div class="col-lg-8 bg-white px-5" style="border-radius: 1rem;">
                        <ul class="list-title p-0 d-flex p-4 pt-5">
                            <li class="item list-unstyled fs-4 fw-bold" style="width: 15rem;">Hình ảnh</li>
                            <li class="item list-unstyled fs-4 fw-bold" style="width: 35rem;">Tên sản phẩm</li>
                            <li class="item list-unstyled fs-4 fw-bold" style="width: 25rem;">Giá bán</li>
                            <li class="item list-unstyled fs-4 fw-bold" style="width: 20rem;">Số lượng</li>
                        </ul>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) { ?>
                                <ul class="list-title  p-0 d-flex px-4 py-4 border-top position-relative">
                                    <li class="item list-unstyled fs-4 fw-bold" style="width: 12.4rem;">
                                        <img src="<?= $row['thumbnail'] ?>" alt="" style="width: 50%">
                                    </li>
                                    <li class="item data_pd list-unstyled fs-4 fw-bold" style="width: 26rem;">
                                        <p class="product_name m-0"><?= $row['title'] ?></p>
                                        <p class="product_color m-0 fs-5 text-secondary">Màu sắc:
                                            <span class="p_color"><?= $row['color_name'] ?></span>
                                        </p>
                                        <p class="product_namex m-0 fs-5">Dung lượng:
                                            <span class='memory_pr'><?= $row['memory_name'] ?></span>
                                        </p>
                                    </li>
                                    <li class="item list-unstyled fs-4 fw-bold product_price" style="width: 25rem;"><?= number_format($row['discount']) ?>₫</li>
                                    <li class="item list-unstyled fs-4 fw-bold" style="width: 10rem;">
                                        <span class="quantity__box d-flex align-items-center product_quantity px-5 py-2 justify-content-center" style="background-color: #F5F5F7; border-radius: 1rem; position: relative;">
                                            <i data-btn="down" class="quantity__icon-down fa-solid fa-window-minimize text-primary"></i>
                                            <span class="quantity text-secondary"><?= $row['soluong'] ?></span>
                                            <i data-btn="up" class="quantity__icon-up fa-solid fa-plus text-primary"></i>
                                        </span>
                                    </li>
                                    <li class="product_trast item list-unstyled fs-4 fw-bold position-absolute">
                                        <i class="trash fa-solid fa-trash"></i>
                                    </li>
                                </ul>
                            <?php   }
                        } else { ?>
                            <script>
                                const x = `<div class="order_empty">
                                                        <div class="box_img text-center">
                                                            <img src="https://etecvn.com/default/template/img/cart-empty.png" style="width: 40%;border-radius: 2rem; margin-top: 5rem;" alt="">
                                                            <h2 class="title fs-1 fw-bold pb-5">Chưa có đơn hàng!</h2>
                                                        </div>
                                                    </div>`
                                document.querySelector('.boxElement').innerHTML = x;
                            </script>
                        <?php }
                        ?>
                        <div class="update pt-4 pb-5 text-end">
                            <a href="index.php?page_layout=product_all" class="text-decoration-none">
                                <button type="button" class="fs-4 btn btn-outline-primary">Tiếp tục mua sắm</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="bg-white text-center" style="border-radius: 1rem; padding: 2rem 5rem;">

                            <p class=" d-flex justify-content-between fs-4 fw-bolder py-5">Tổng cộng: <span class="text-primary price_sum">0đ</span></p>
                            <button type="submit" name="order" class="btn order2 btn-primary py-2 fs-4 px-4">Tiến hành thanh toán</button>
                            <div class="error text-danger fs-5 mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 billing__information mb-5">
                        <div class="billing__title fs-1 py-5 fw-bold">Thông tin thanh toán</div>
                        <div class="billing__dentails px-4 bg-white rounded-4 text-center">
                            <input type="text" name='fullname' placeholder="Nhập tên của bạn" class="billing_name-user px-3 py-4 mt-5 fs-4" style="width: 100%; border-radius: 1rem; border: 1px solid #EBEBEB;">
                            <div class="input__more d-flex justify-content-between">
                                <input type="text" name='phone' placeholder="Nhập số điện thoại" class="billing_phone-user px-3 py-4 mt-5 fs-4" style="width: 49%; border-radius: 1rem; border: 1px solid #EBEBEB;">
                                <input type="email" name='email' placeholder="Nhập Email (nếu có)" class="billing_email-user px-3 py-4 mt-5 fs-4" style="width: 49%; border-radius: 1rem; border: 1px solid #EBEBEB;">
                            </div>
                            <textarea class="billing_address-user fs-4 py-4 px-3 mt-4 mb-4" name='fullAddress' style="width: 100%; height: 10rem;border-radius: 1rem; border: 1px solid #EBEBEB ;" placeholder="Nhập địa chỉ của bạn" name="" id="" cols="30" rows="10"></textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Modal -->
    <div class="modal1 position-fixed bg-black align-items-center justify-content-center" style="display: none;top: 0; left: 0; right: 0; bottom: 0">
        <div class="modal-dialog1" style="max-width: 35rem;">
            <div class="card text-center p-5">
                <div class="exit text-end  " style="cursor: pointer;">
                    <i class="fa-solid fa-xmark icon-exit fs-1"></i>
                </div>
                <div class="card-img">
                    <img class="img-fluid" src="https://i.imgur.com/4niebFr.jpg" style="width: 25%">
                </div>
                <div class="card-title fs-1 mt-4 fw-bold">
                    <p>Đặt Hàng thành công!</p>
                </div>
                <div class="card-text fs-2 mb-2">
                    <p>Cảm ơn bạn đã ủng hộ chúng tôi!</p>
                </div>
                <button class="btn px-3 text-white border-2 fs-2 bg-primary rounded-3 py-2"><a style="text-decoration: none; color: #F5F5F7;" href="index.php?page_layout=orders">Chi tiết đơn hàng</a></button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)

        function filterNumber(text) {
            const arr = text.match(/\d+/g);
            return parseInt(arr.join(''))
        }

        function total(value, parentElement) {

            parentElement.querySelector('.quantity').innerText = value
            const grandfatherElement = parentElement.parentElement.parentElement
            const quality = parentElement.querySelector('.quantity').innerText = value
            const pricetext = filterNumber(grandfatherElement.querySelector('.product_price').innerText)
            return pricetext * quality
        }

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function updateTotal() {
            var total_ic = 0;
            $$('.quantity__icon-up').forEach(total => {
                const grandfatherElement = total.parentElement.parentElement.parentElement
                const parentElement = total.parentElement
                const pricetext = filterNumber(grandfatherElement.querySelector('.product_price').innerText)
                const totalValue = parseInt(grandfatherElement.querySelector('.quantity').innerText)
                total_ic += totalValue * pricetext
            })
            $('.price_sum').innerText = `${formatNumber(total_ic)} đ`
        }

        function handle_add_or_drop(element, dataAtribulte) {
            var total_ic = 0;
            const quantity__box = element.parentElement;
            const grandfatherElement = quantity__box.parentElement.parentElement
            let value = parseInt(quantity__box.querySelector('.quantity').innerText)
            value = (dataAtribulte === 'up') ? value + 1 : value - 1

            total(value, quantity__box)
            updateTotal()
            /// get data -> database
            const productName = grandfatherElement.querySelector('.product_name').innerText
            const memoryName = grandfatherElement.querySelector('.memory_pr').innerText
            const colorName = grandfatherElement.querySelector('.p_color').innerText
            const data = {
                soluong: value,
                memoryName: memoryName,
                productName: productName,
                colorName: colorName
            }
            fetch('./handle/update_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'data= ' + JSON.stringify(data)
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    setTimeout(() => {
                        if (value <= 0) {
                            location.reload(true);
                        }
                    }, 500)

                })
                .catch(error => {
                    console.error('Error:', error)
                });
        }


        const app = {
            startUp() {
                updateTotal()
            },
            handle() {
                quality: {

                    $$('.quantity__icon-up').forEach(btn_up => {

                        btn_up.onclick = e => {
                            const dataBtn = e.target.getAttribute('data-btn')
                            handle_add_or_drop(btn_up, dataBtn)
                        }

                    })
                    $$('.quantity__icon-down').forEach(btnDown => {

                        btnDown.onclick = e => {
                            const dataBtn = e.target.getAttribute('data-btn')
                            handle_add_or_drop(btnDown, dataBtn)
                        }

                    })

                    $$('.trash').forEach(trash => {
                        trash.onclick = e => {
                            const trashParentElement = e.target.parentElement.parentElement;
                            console.log(trashParentElement);
                            const productName = trashParentElement.querySelector('.product_name').innerText
                            const memoryName = trashParentElement.querySelector('.memory_pr').innerText
                            const colorName = trashParentElement.querySelector('.p_color').innerText
                            const data = {
                                soluong: 0,
                                memoryName: memoryName,
                                productName: productName,
                                colorName: colorName,
                            }
                            fetch('./handle/update_cart.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: 'data= ' + JSON.stringify(data)
                                })
                                .then(response => response.text())
                                .then(data => {
                                    if (data === "đã thay đổi") {
                                        setTimeout(() => {
                                            location.reload(true);
                                        }, 500)
                                    }

                                })
                                .catch(error => {
                                    console.error('Error:', error)
                                });
                        }
                    })

                }
                buy: {
                    $('.order2').onclick = e => {
                        const name = $('.billing_name-user').value
                        const address = $('.billing_address-user').value
                        const phone = $('.billing_phone-user').value
                        const email = $('.billing_email-user').value
                        if (name && address && phone) {
                            $('.error').innerText = ""
                            const data = {
                                fullname: name,
                                phone: phone,
                                fullAddress: address,
                                email: email
                            }
                            console.log(data);
                            fetch('./handle/cart-to-order.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: 'data= ' + JSON.stringify(data)
                                })
                                .then(response => response.text())
                                .then(data => {
                                    if (data = "đặt hàng thành công") {
                                        const data2 = {
                                            delete: true
                                        }
                                        fetch('./handle/delete_cart.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/x-www-form-urlencoded',
                                                },
                                                body: 'data= ' + JSON.stringify(data2)
                                            })
                                            .then(response => response.text())
                                            .then(data => {
                                                if (data = "xóa thành công") {
                                                    $('.modal1').style.display = 'flex'
                                                    $('.icon-exit').onclick = e => {
                                                        $('.modal1').style.display = 'none'
                                                        location.reload()
                                                    }
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error)
                                            });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error)
                                });
                        } else {
                            $('.error').innerText = "Vui lòng nhập đầy đủ thông tin!"
                        }
                    }
                }
                interact: {
                    var elements = $$('.billing_name-user, .billing_address-user, .billing_phone-user')
                    elements.forEach(function(element) {
                        element.addEventListener('input', function() {
                            document.querySelector('.error').innerText = "";
                        });
                    });

                }
            },
            run() {
                this.startUp()
                this.handle()
            }

        }
        app.run()
    </script>