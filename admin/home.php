<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<main class="col-7">
    <h1 class="analyse-title">Số liệu thống kê</h1>
    <!-- Analyses -->
    <div class="analyse row gx-3">
        <div class="sales col-3 ">
            <div class="status" style="min-height: 150px;">
                <div class="info">
                    <div class="fs-4 mb-2 fw-bold">Ước lượng doanh thu</div>
                    <div class="fs-5 text-primary fw-bold">
                        <?php
                        $sql = "SELECT SUM(quantity * price) AS sum FROM orders WHERE status between  1 and 3 ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo number_format($row["sum"]);
                        ?>đ
                    </div>
                </div>
            </div>
        </div>
        <div class="sales col-3 ">
            <div class="status" style="min-height: 150px;">
                <div class="info">
                    <div class="fs-4 mb-2 fw-bold">Tổng doanh thu</div>
                    <div class="fs-5 text-primary fw-bold">
                        <?php
                        $sql = "SELECT SUM(quantity * price) AS sum FROM orders WHERE status = 3";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo number_format($row["sum"]);
                        ?>đ
                    </div>
                </div>
            </div>
        </div>
        <div class="visits col-3 ">
            <div class="status" style="min-height: 150px;">
                <div class="info">
                    <div class="fs-4 mb-2 fw-bold">Số lượt truy cập</div>
                    <div class="fs-5 text-primary fw-bold">
                        <?php
                        $count = "SELECT * FROM countvisits";
                        $ok1 = mysqli_query($conn, $count);
                        $row1 = mysqli_fetch_assoc($ok1);
                        echo $row1['numberOfHits'];
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="searches col-3 ">
            <div class="status" style="min-height: 150px;">
                <div class="info">
                    <div class="fs-4 mb-2 fw-bold">Tổng số tài khoản</div>
                    <div class="fs-5 text-primary     fw-bold">
                        <?php
                        $count = "SELECT count(id) soluongtaikhoan FROM users";
                        $ok2 = mysqli_query($conn, $count);
                        $row2 = mysqli_fetch_assoc($ok2);
                        echo $row2['soluongtaikhoan'];
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Analyses -->

    <!-- New Users Section -->
    <div class="new-users">
        <h2>Top mua hàng nhiều nhất</h2>
        <div class="user-list">
            <?php
            $sql = "SELECT u.fullname, sum(o.quantity * o.price) tongtien FROM users u
            INNER JOIN orders o 
            on o.user_id = u.id
            WHERE o.status between 1 and 3 
            GROUP BY u.fullname
            ORDER BY tongtien DESC
            LIMIT 3";
            $ok2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($ok2)) {
                $count = 0;
                while ($row = mysqli_fetch_array($ok2)) {
                    $count = $count + 1; ?>
                    <div class="user">
                        <div class=" fs-2 fw-bold">Top:
                            <span class="oke"><?= $count ?></span>
                        </div>
                        <img class="top" src="">
                        <h2><?= $row['fullname'] ?></h2>
                        <div class="sum">Tổng số tiền đã chi:
                            <span class="fw-bold"> <?= number_format($row['tongtien']) ?>đ</span>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="no_top p-3 fs-1 fw-bold">
                    Chưa có ai mua huhu (T_T)
                </div>
            <?php }
            ?>

        </div>
        <div class="new-users">
            <h2>Người dùng mới</h2>
            <div class="user-list">
                <?php
                $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 4";
                $ok2 = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($ok2)) { ?>
                    <div class="user">
                        <img class='user-img' src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png">
                        <h2><?= $row['fullname'] ?></h2>
                    </div>
                <?php }
                ?>
                 <div class="user">
                <img src="https://cdn-icons-png.flaticon.com/128/6329/6329488.png?ga=GA1.1.1782978868.1679199684&semt=ais"
                    alt="">
                <h2>Xem thêm</h2>
            </div>

            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <script>
                const tops = document.querySelectorAll('.top')
                tops[0].setAttribute('src', 'https://png.pngtree.com/element_our/20200611/ourlarge/pngtree-rich-rich-man-image_2252469.jpg')
                tops[1].setAttribute('src', 'https://img.lovepik.com/free-png/20211203/lovepik-god-of-wealth-icon-png-image_401293320_wh1200.png')
                tops[2].setAttribute('src', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTojo0-BSYrwB-TJRiSBWsAo7sGJpdhNlGHjE_1f7EgoUs8cbWYt7qoPYEp5E21xhsowJU&usqp=CAU')
                const user_img = document.querySelectorAll('.user-img')
                user_img[0].setAttribute('src', 'https://64.media.tumblr.com/ac123c5575b29bb101a7eba0138cb9ac/a694147a8660aed9-74/s1280x1920/a609ce9cd0e0ba10f341496a4530fab81e0fbdc4.jpg')
                user_img[1].setAttribute('src', 'https://i.pinimg.com/736x/f5/b5/1a/f5b51a292c3a98e35e1269b517a710cc.jpg')
                user_img[2].setAttribute('src', 'https://i.pinimg.com/736x/5b/43/35/5b4335a654c53c6a47d18885dbc76eb6.jpg')
                user_img[3].setAttribute('src', 'https://i.pinimg.com/736x/78/93/cc/7893ccd9b7e51119a03e343b4f9b5a9b.jpg')
                user_img[4].setAttribute('src', 'https://e1.pxfuel.com/desktop-wallpaper/454/65/desktop-wallpaper-jk-icon-cute-bts-jk-cute-thumbnail.jpg')
            </script>
</main>