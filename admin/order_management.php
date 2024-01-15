<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="col-7">
    <h1 class="analyse-title mb-4">Quản lý đơn hàng</h1>
    <div class="container-fluid mb-5">
        <div class="box p-4 bg-white overflow-y-auto" style="border-radius: 2rem; max-height: 48rem">
            <ul class="nav nav-fill nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Đang chờ xác nhận </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Đã Xác nhận </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Đã Giao </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fill-tab-3" data-bs-toggle="tab" href="#fill-tabpanel-3" role="tab" aria-controls="fill-tabpanel-3" aria-selected="false"> Đã Hủy </a>
                </li>
            </ul>
            <div class="tab-content pt-5" id="tab-content">
                <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                        <table class="table table-light table-borderless">
                            <thead>
                                <tr class="" style="border-bottom: 1px solid #a5a3a3;">
                                    <th style="width: 20rem" class="product-picture">khách hàng</th>
                                    <th class=" product">Tên sản phẩm </th>
                                    <th class="unit-price">Tổng tiền </th>
                                    <th class="quantity"> Lựa chọn </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql1 = "SELECT * from orders where status = 1 ORDER BY id DESC";
                                if ($result1 = $conn->query($sql1)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        $count = 0;
                                        while ($row1 = $result1->fetch_array()) {
                                            if (true) {
                                                $count++; ?>
                                                <tr style="border-bottom: 1px solid #a5a3a3;">
                                                    <td>
                                                        <h3 class="name_client">
                                                            <?= $row1['fullName'] ?>
                                                            </h2>
                                                            <p class="address"> <?= $row1['address'] ?>
                                                            </p>
                                                            <p class="phone-number"><?= $row1['phoneNumber'] ?></p>
                                                            <p class="date"><?= $row1['dateOrder'] ?></p>
                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name">
                                                            <?= $row1['product_name'] ?>
                                                        </div>
                                                        <span class="total">
                                                            <span>Dung lượng:
                                                                <?= $row1['memory'] ?>
                                                            </span> <br>
                                                            <span>Số lượng: <?= $row1['quantity'] ?></span>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <span><?= number_format($row1['price'] * $row1['quantity']) ?>₫</span>
                                                    </td>
                                                    <td>
                                                        <button class="refuse border-0 px-3 py-2 rounded-2 bg-danger text-white
                                                   huydon" data_id="<?= $row1['id'] ?>">Từ chối
                                                        </button>
                                                        <button class="approve border-0 px-3 py-2 rounded-2 bg-primary text-white
                                                    huydon" data_id="<?= $row1['id'] ?>">Phê duyệt
                                                        </button>
                                                    </td>
                                                </tr>

                                <?php      }
                                        }
                                    }
                                }

                                ?>


                            </tbody>
                        </table>
                        <div class="cart-options d-flex justify-content-end mt-4">
                            <div class="selected-checkout-attributes"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                        <table class="table table-light table-borderless">
                            <thead>
                                <tr class="" style="border-bottom: 1px solid #a5a3a3;">
                                    <th style="width: 20rem" class="product-picture">khách hàng</th>
                                    <th class=" product">Tên sản phẩm </th>
                                    <th class="unit-price">Tổng tiền </th>
                                    <th class="quantity"> Trạng thái </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql1 = "SELECT * from orders where status = 2 ORDER BY id DESC";
                                if ($result1 = $conn->query($sql1)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        $count = 0;
                                        while ($row1 = $result1->fetch_array()) {
                                            if (true) {
                                                $count++; ?>
                                                <tr style="border-bottom: 1px solid #a5a3a3;">
                                                    <td>
                                                        <h3 class="name_client">
                                                            <?= $row1['fullName'] ?>
                                                            </h2>
                                                            <p class="address"> <?= $row1['address'] ?>
                                                            </p>
                                                            <p class="phone-number"><?= $row1['phoneNumber'] ?></p>
                                                            <p class="date"><?= $row1['dateOrder'] ?></p>
                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name">
                                                            <?= $row1['product_name'] ?>
                                                        </div>
                                                        <span class="total">
                                                            <span>Dung lượng:
                                                                <?= $row1['memory'] ?>
                                                            </span> <br>
                                                            <span>Số lượng: <?= $row1['quantity'] ?></span>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <span><?= number_format($row1['price'] * $row1['quantity']) ?>₫</span>
                                                    </td>
                                                    <td>
                                                        <div class="status">Đang chờ nhân viên lấy hàng</div>
                                                    </td>
                                                </tr>

                                <?php      }
                                        }
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="cart-options d-flex justify-content-end mt-4">
                            <div class="selected-checkout-attributes"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                        <table class="table table-light table-borderless">
                            <thead>
                                <tr class="" style="border-bottom: 1px solid #a5a3a3;">
                                    <th style="width: 20rem" class="product-picture">khách hàng</th>
                                    <th class=" product">Tên sản phẩm </th>
                                    <th class="unit-price">Tổng tiền </th>
                                    <th class="quantity"> Trạng thái </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql1 = "SELECT * from orders where status = 3 ORDER BY id DESC";
                                if ($result1 = $conn->query($sql1)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        $count = 0;
                                        while ($row1 = $result1->fetch_array()) {
                                            if (true) {
                                                $count++; ?>
                                                <tr style="border-bottom: 1px solid #a5a3a3;">
                                                    <td>
                                                        <h3 class="name_client">
                                                            <?= $row1['fullName'] ?>
                                                            </h2>
                                                            <p class="address"> <?= $row1['address'] ?>
                                                            </p>
                                                            <p class="phone-number"><?= $row1['phoneNumber'] ?></p>
                                                            <p class="date"><?= $row1['dateOrder'] ?></p>
                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name">
                                                            <?= $row1['product_name'] ?>
                                                        </div>
                                                        <span class="total">
                                                            <span>Dung lượng:
                                                                <?= $row1['memory'] ?>
                                                            </span> <br>
                                                            <span>Số lượng: <?= $row1['quantity'] ?></span>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <span><?= number_format($row1['price'] * $row1['quantity']) ?>₫</span>
                                                    </td>
                                                    <td>
                                                        <div class="status">Đã giao hàng toàn bộ</div>
                                                    </td>
                                                </tr>

                                <?php      }
                                        }
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="cart-options d-flex justify-content-end mt-4">
                            <div class="selected-checkout-attributes"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="fill-tabpanel-3" role="tabpanel" aria-labelledby="fill-tab-3">
                    <div class="cart-detail my-4 p-3 border border-success rounded-2 bg-light">
                        <table class="table table-light table-borderless">
                            <thead>
                                <tr class="" style="border-bottom: 1px solid #a5a3a3;">
                                    <th style="width: 20rem" class="product-picture">khách hàng</th>
                                    <th class=" product">Tên sản phẩm </th>
                                    <th class="unit-price">Tổng tiền </th>
                                    <th class="quantity"> Trạng thái </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql1 = "SELECT * from orders where status = 4 ORDER BY id DESC";
                                if ($result1 = $conn->query($sql1)) {
                                    if (mysqli_num_rows($result1) > 0) {
                                        $count = 0;
                                        while ($row1 = $result1->fetch_array()) {
                                            if (true) {
                                                $count++; ?>
                                                <tr style="border-bottom: 1px solid #a5a3a3;">
                                                    <td>
                                                        <h3 class="name_client">
                                                            <?= $row1['fullName'] ?>
                                                            </h2>
                                                            <p class="address"> <?= $row1['address'] ?>
                                                            </p>
                                                            <p class="phone-number"><?= $row1['phoneNumber'] ?></p>
                                                            <p class="date"><?= $row1['dateOrder'] ?></p>
                                                    </td>
                                                    <td class=" product">
                                                        <div class="product-name">
                                                            <?= $row1['product_name'] ?>
                                                        </div>
                                                        <span class="total">
                                                            <span>Dung lượng:
                                                                <?= $row1['memory'] ?>
                                                            </span> <br>
                                                            <span>Số lượng: <?= $row1['quantity'] ?></span>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <span><?= number_format($row1['price'] * $row1['quantity']) ?>₫</span>
                                                    </td>
                                                    <td>
                                                        <div class="status">Đã hủy đơn</div>
                                                    </td>
                                                </tr>

                                <?php      }
                                        }
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="cart-options d-flex justify-content-end mt-4">
                            <div class="selected-checkout-attributes"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="./js/order_management.js"></script>