
<?php
include('./handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('location: ./index.php');
    exit();
}
$userName = $_SESSION['user'];
$sql = "SELECT * FROM users where fullname = '$userName'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);

    $sql2 = "SELECT * FROM orders where user_id in
(Select id from users where fullname = '$userName')
and status = 1
order by dateOrder DESC";
    $result2 = mysqli_query($conn, $sql2);
    ///////////////
    $sql3 = "SELECT * FROM orders where user_id in
(Select id from users where fullname = '$userName')
and status = 2
order by dateOrder DESC";
    $result3 = mysqli_query($conn, $sql3);
    ///////////////////////////
    $sql4 = "SELECT * FROM orders where user_id in
(Select id from users where fullname ='$userName')
and status = 3
order by dateOrder DESC";
    $result4 = mysqli_query($conn, $sql4);
    $sql5 = "SELECT * FROM orders where user_id in
(Select id from users where fullname ='$userName')
and status = 4
order by dateOrder DESC";
    $result5  = mysqli_query($conn, $sql5);
}
?>

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Mulish', sans-serif;
        }

        .product-picture {
            min-width: 5rem !important;
        }

        body {
            background-color: #efefef;
            font-size: 1.5rem !important;
            margin-top: 2rem !important;
        }

        .account-menu-item:hover {
            color: orangered !important;
        }

        .status:hover {
            color: orangered !important;
        }

        .status.active {
            color: orangered !important;
            border-bottom: 2px solid orangered !important;
        }

        .product-name,
        .edit-item {
            color: #000;
        }
        footer {
            display: none !important;
        }
    </style>

</head>
<div class="not_even">

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-lg-3">
                <div class="sidebar rounded-4 bg-white py-4 px-2">
                    <div class="account d-flex px-3 justify-content-start align-items-center">
                        <a href=""><img class="rounded-circle" src="https://i.pinimg.com/236x/ad/0a/ec/ad0aec5a2b39bbb0d5d444562f423a2d.jpg" alt="avatar người dùng" style="width: 3em; height: 3em;"></a>
                        <h4 class="accout-name ms-4"><?= $userData['fullname'] ?></h4>
                    </div>
                    <ul class="nav flex-column account-menu mt-4">
                        <li class="nav-item">
                            <a class="nav-link account-menu-item text-decoration-none text-dark" href="">Tài khoản của
                                tôi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card p-4 rounded-4 border-0">
                    <nav>
                        <div class="nav nav-underline mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link status px-3 text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Chờ xác nhận</button>
                            <button class="nav-link status px-3 text-dark" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Đã xác nhận</button>
                            <button class="nav-link status px-3 text-dark" id="nav-complete-tab" data-bs-toggle="tab" data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete" aria-selected="false">Hoàn thành</button>
                            <button class="nav-link status px-3 text-dark" id="nav-canceled-tab" data-bs-toggle="tab" data-bs-target="#nav-canceled" type="button" role="tab" aria-controls="nav-canceled" aria-selected="false">Đã huỷ</button>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <?php
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_array($result2)) { ?>
                                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                                        <table class="table table-light table-borderless">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20rem" class="product-picture">Hình ảnh </th>
                                                    <th class=" product">Tên sản phẩm </th>
                                                    <th class="unit-price">Giá bán </th>
                                                    <th class="quantity">Số lượng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20rem" class="product-picture">

                                                        <img src="<?= $row2['image'] ?>" style="width: 40%;">

                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name"><?= $row2['product_name'] ?></div>
                                                        <span class="total">
                                                            <span>Dung lượng: <?= $row2['memory'] ?></span> <br>
                                                            <span>Tổng: </span>
                                                            <?php $sum = $row2['price'] * $row2['quantity'] ?>
                                                            <span><?= number_format($sum) ?>₫</span>
                                                        </span>

                                                    </td>
                                                    <td class="unit-price">
                                                        <label class="td-title"></label>
                                                        <span class="product-unit-price"><?= number_format($row2['price']) ?>₫</span>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $row2['quantity'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Địa chỉ: </td>
                                                    <td style="width: 25rem"><?= $row2['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Số điện thoại: </td>
                                                    <td><?= $row2['phoneNumber'] ?></td>

                                                </tr>

                                                <tr>
                                                    <td style="width: 20rem">Tên người nhận: </td>
                                                    <td><?= $row2['fullName'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Thời gian đặt hàng: </td>
                                                    <td><?= $row2['dateOrder'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem"><button class=" border-0 px-3 py-2 rounded-2 bg-primary text-white huydon" data_id="<?= $row2['id'] ?>">Hủy đơn</button></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="cart-options d-flex justify-content-end mt-4">
                                            <div class="selected-checkout-attributes"></div>
                                        </div>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div class="order_empty">
                                    <div class="box_img text-center">
                                        <img src="https://etecvn.com/default/template/img/cart-empty.png" style="width: 40%;border-radius: 2rem; margin: 5rem 0;" alt="">
                                        <h2 class="title fs-1 fw-bold pb-5">Chưa có đơn hàng!</h2>
                                    </div>
                                </div>
                            <?php  }
                            ?>

                        </div>
                        <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                            <?php
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_array($result3)) { ?>
                                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                                        <table class="table table-light table-borderless">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20rem" class="product-picture">Hình ảnh </th>
                                                    <th class=" product">Tên sản phẩm </th>
                                                    <th class="unit-price">Giá bán </th>
                                                    <th class="quantity">Số lượng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20rem" class="product-picture">

                                                        <img src="<?= $row3['image'] ?>" style="width: 40%;">

                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name"><?= $row3['product_name'] ?></div>
                                                        <span class="total">
                                                            <span>Dung lượng: <?= $row3['memory'] ?></span> <br>
                                                            <span>Tổng: </span>
                                                            <?php $sum = $row3['price'] * $row3['quantity'] ?>
                                                            <span><?= number_format($sum) ?>₫</span>
                                                        </span>

                                                    </td>
                                                    <td class="unit-price">
                                                        <label class="td-title"></label>
                                                        <span class="product-unit-price"><?= number_format($row3['price']) ?>₫</span>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $row3['quantity'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Địa chỉ: </td>
                                                    <td style="width: 25rem"><?= $row3['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Số điện thoại: </td>
                                                    <td><?= $row3['phoneNumber'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Tên người nhận: </td>
                                                    <td><?= $row3['fullName'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="cart-options d-flex justify-content-end mt-4">
                                            <div class="selected-checkout-attributes"></div>
                                        </div>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div class="order_empty">
                                    <div class="box_img text-center">
                                        <img src="https://etecvn.com/default/template/img/cart-empty.png" style="width: 40%;border-radius: 2rem; margin: 5rem 0;" alt="">
                                        <h2 class="title fs-1 fw-bold pb-5">Chưa có đơn hàng!</h2>
                                    </div>
                                </div>
                            <?php  }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                            <?php
                            if (mysqli_num_rows($result4) > 0) {
                                while ($row4 = mysqli_fetch_array($result4)) { ?>
                                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                                        <table class="table table-light table-borderless">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20rem" class="product-picture">Hình ảnh </th>
                                                    <th class=" product">Tên sản phẩm </th>
                                                    <th class="unit-price">Giá bán </th>
                                                    <th class="quantity">Số lượng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20rem" class="product-picture">

                                                        <img src="<?= $row4['image'] ?>" style="width: 40%;">

                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name"><?= $row4['product_name'] ?></div>
                                                        <span class="total">
                                                            <span>Dung lượng: <?= $row4['memory'] ?></span> <br>
                                                            <span>Tổng: </span>
                                                            <?php $sum = $row4['price'] * $row4['quantity'] ?>
                                                            <span><?= number_format($sum) ?>₫</span>
                                                        </span>

                                                    </td>
                                                    <td class="unit-price">
                                                        <label class="td-title"></label>
                                                        <span class="product-unit-price"><?= number_format($row4['price']) ?>₫</span>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $row4['quantity'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Địa chỉ: </td>
                                                    <td style="width: 25rem"><?= $row4['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Số điện thoại: </td>
                                                    <td><?= $row4['phoneNumber'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Tên người nhận: </td>
                                                    <td><?= $row4['fullName'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem"><button class=" border-0 px-3 py-2 rounded-2 bg-primary text-white huydon">Hủy đơn</button></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="cart-options d-flex justify-content-end mt-4">
                                            <div class="selected-checkout-attributes"></div>
                                        </div>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div class="order_empty">
                                    <div class="box_img text-center">
                                        <img src="https://etecvn.com/default/template/img/cart-empty.png" style="width: 40%;border-radius: 2rem; margin: 5rem 0;" alt="">
                                        <h2 class="title fs-1 fw-bold pb-5">Chưa có đơn hàng!</h2>
                                    </div>
                                </div>
                            <?php  }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="nav-canceled" role="tabpanel" aria-labelledby="nav-canceled-tab">
                            <?php
                            if (mysqli_num_rows($result5) > 0) {
                                while ($row5 = mysqli_fetch_array($result5)) { ?>
                                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                                        <table class="table table-light table-borderless">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20rem" class="product-picture">Hình ảnh </th>
                                                    <th class=" product">Tên sản phẩm </th>
                                                    <th class="unit-price">Giá bán </th>
                                                    <th class="quantity">Số lượng </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 20rem" class="product-picture">

                                                        <img src="<?= $row5['image'] ?>" style="width: 40%;">

                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name"><?= $row5['product_name'] ?></div>
                                                        <span class="total">
                                                            <span>Dung lượng: <?= $row5['memory'] ?></span> <br>
                                                            <span>Tổng: </span>
                                                            <?php $sum = $row5['price'] * $row5['quantity'] ?>
                                                            <span><?= number_format($sum) ?>₫</span>
                                                        </span>

                                                    </td>
                                                    <td class="unit-price">
                                                        <label class="td-title"></label>
                                                        <span class="product-unit-price"><?= number_format($row5['price']) ?>₫</span>
                                                    </td>
                                                    <td class="quantity">
                                                        <?= $row5['quantity'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Địa chỉ: </td>
                                                    <td style="width: 25rem"><?= $row5['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Số điện thoại: </td>
                                                    <td><?= $row5['phoneNumber'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem">Tên người nhận: </td>
                                                    <td><?= $row5['fullName'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 20rem"><button class=" border-0 px-3 py-2 rounded-2 bg-primary text-white huydon">Hủy đơn</button></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="cart-options d-flex justify-content-end mt-4">
                                            <div class="selected-checkout-attributes"></div>
                                        </div>
                                    </div>
                                <?php   }
                            } else { ?>
                                <div class="order_empty">
                                    <div class="box_img text-center">
                                        <img src="https://etecvn.com/default/template/img/cart-empty.png" style="width: 40%;border-radius: 2rem; margin: 5rem 0;" alt="">
                                        <h2 class="title fs-1 fw-bold pb-5">Chưa có đơn hàng!</h2>
                                    </div>
                                </div>
                            <?php  }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal1 position-fixed bg-black align-items-center justify-content-center" style="display: none; z-index: 99;top: 0; left: 0; right: 0; bottom: 0">
        <div class="modal-dialog1" style="max-width: 35rem; ">
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
</div>
<script>
    const $$ = document.querySelectorAll.bind(document)
    const $ = document.querySelector.bind(document)
    $$('.huydon').forEach(hd => {
        hd.onclick = e => {
            const id = e.target.getAttribute('data_id');
            const order_id = {
                order_id: id
            }
            fetch('./handle/huydon.php', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(order_id),
                })
                .then(response => response.text())
                .then(result => {
                    console.log(result);
                    if (result === 'Hủy đơn thành công') {
                        $('.modal1').style.display = 'flex'
                        $('.icon-exit').onclick = e => {
                            $('.modal1').style.display = 'none'
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        }
    })
    document.addEventListener('DOMContentLoaded', () => {
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(navLink => {
            navLink.onclick = e => {
                navLinks.forEach(link => link.classList.remove('active'));
                e.target.classList.add('active');
            };
        });
    });
</script>
