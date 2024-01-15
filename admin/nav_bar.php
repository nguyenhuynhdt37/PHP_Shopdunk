<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 ?>
<aside class="col-2">
    <div class="oclock_box bg-white mt-4 d-flex fs-4 p-3" style="border-radius: 20px;">
        <div class="title fw-bold me-2">
            Time:
        </div>
        <div id="clock" class=" fw-bold text-secondary">

        </div>
    </div>

    <div class="sidebar">
        <a class="link_start" href="index.php?page=main">
            <span class="material-icons-sharp">
                dashboard
            </span>
            <h3>Trang chủ</h3>
        </a>
        <a class="link_start" href="index.php?page=qlsp">
            <span class="material-icons-sharp">
                dashboard
            </span>
            <h3>Quản lý sản phẩm</h3>
        </a>
        <a class="link_start" href="index.php?page=users">
            <span class="material-icons-sharp">
                person_outline
            </span>
            <h3>Người dùng</h3>
        </a>
        <a class="link_start" href="index.php?page=orders_management">
            <span class="material-icons-sharp">
                insights
            </span>
            <h3>Quản lý đơn hàng</h3>
        </a>
        <a class="link_start" href="index.php?page=notification">
            <span class="material-icons-sharp">
                mail_outline
            </span>
            <h3>Thông báo</h3>
            <span class="message-count">27</span>
        </a>
        <a class="link_start logout">
            <span class="material-icons-sharp">
                logout
            </span>
            <h3>Đăng xuất</h3>
        </a>
    </div>
</aside>
<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var timeString = addLeadingZero(hours) + ":" + addLeadingZero(minutes) + ":" + addLeadingZero(seconds);
        document.getElementById("clock").innerHTML = timeString;
    }

    function addLeadingZero(number) {
        return (number < 10) ? "0" + number : number;
    }
    setInterval(updateClock, 1000);
    updateClock();

    document.querySelector('.logout').onclick = e => {
        data = true
        fetch('./handle/logout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    data
                }),
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'logout') {
                    window.location.reload()
                }
            })

    }

    // const links = document.querySelectorAll(".link_start");
    // const activeClass = 'active'; // Define the active class name

    // links.forEach((l, i) => {
    //     l.onclick = e => {
    //         links.forEach((link, index) => {
    //             link.classList.remove(activeClass);
    //         });
    //         l.classList.add(activeClass);
    //     };
    // });
    var darkMode = document.querySelector('.dark-mode');

    if (darkMode) {
        darkMode.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode-variables');

            var spans = darkMode.getElementsByTagName('span');
            spans[0].classList.toggle('active');
            spans[1].classList.toggle('active');
        });
    }
</script>