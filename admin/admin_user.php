<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$count = "SELECT * FROM users";
$ok1 = mysqli_query($conn, $count);
$row = mysqli_fetch_assoc($ok1);
?>
<div class="col-3 right-section">
    <div class="nav">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
            </span>
        </button>
        <div class="dark-mode">
            <span class="material-icons-sharp active">
                light_mode
            </span>
            <span class="material-icons-sharp">
                dark_mode
            </span>
        </div>

        <div class="profile">
            <div class="info">
                <p>Xin Chào, <b><?= $row['fullname'] ?></b></p>
                <small class="text-muted">Quản trị viên</small>
            </div>
        </div>

    </div>
    <!-- End of Nav -->

    <div class="user-profile">
        <div class="logo">
            <img src="https://png.pngtree.com/png-vector/20220610/ourmid/pngtree-administrator-account-avatar-boss-business-png-image_4828769.png">
            <h2><?= $row['fullname'] ?></h2>
            <p>Fullstack Web Developer</p>
        </div>
    </div>

    <div class="reminders">
        <div class="header">
            <h2>Nhắc nhở</h2>
            <span class="material-icons-sharp">
                notifications_none
            </span>
        </div>

        <div class="notification">
            <span class="text-danger material-icons-sharp">
                edit
            </span>
            <div class="content">
                <a href="index.php?page=orders_management">
                    <div class="info">
                        <h3>Kiểm tra đơn đặt hàng</h3>
                        <small class="text_muted">
                            2H mỗi ngày
                        </small>
                    </div>
                </a>
                <span class="material-icons-sharp">
                    more_vert
                </span>
            </div>
        </div>

        <div class="notification">
            <span class="text-warning material-icons-sharp">
                volume_up
            </span>
            <div class="content">
                <div class="info">
                    <h3>Nghỉ tết</h3>
                    <small class="text_muted">
                        Còn 3 tuần nữa
                    </small>
                </div>
                <span class="material-icons-sharp">
                    more_vert
                </span>
            </div>
        </div>

        <button class="btn btn-outline-success w-100 text-center rounded-4">
            <span class="material-icons-sharp">
                add
            </span>
            <h3>Thêm lời nhắc</h3>
        </button>
    </div>
</div>

<script>
    const dark_mode = document.querySelector('.dark-mode')
    const dm = dark_mode.querySelectorAll('.material-icons-sharp')
    dm.forEach(d => {
        d.onclick = e => {
            dm.forEach(dd => {
                dd.classList.remove('active')
            })
            d.classList.add('active')
        }
    })
</script>