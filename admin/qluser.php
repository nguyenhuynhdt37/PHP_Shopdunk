<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="col-7">
    <h1 class="user-title mb-4">Quản lý User</h1>
    <div class="user row container-fluid mt-5">
        <div class="col-12 mb-3">
            <div class="user-list d-flex me-5" style="width: 100%">
                <div class="btn btn-warning btn-outline-dark d-block me-2" onclick="showTab('all-user', this)">All
                    User</div>
                <div class="btn btn-warning btn-outline-dark d-block" onclick="showTab('add-new', this)">Add New
                </div>
            </div>
        </div>
        <div class="col-12 ">
            <div class="tab-content">
                <div class="tab-pane fade show " id="all-user">
                    <div class="mb-1">
                        <h3 class="all-user-title mb-1 text-start rounded-2 p-3">Tổng số người dùng:
                            <span class="user-count">
                            <?php
                                $sql = "SELECT count(*) as tong from users where role_id = 2";
                                $row = $conn->query($sql)->fetch_assoc();
                                echo $row['tong'];
                            ?></span>
                        </h3>
                    </div>
                    <div class="container-fluid bg-white rounded-2 p-3 overflow-auto" style="height: 60vh !important">
                        <div class="table-responsive">
                            <!--Table-->
                            <table class="table table-striped">

                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th>ID Khách hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Xóa bỏ</th>
                                    </tr>
                                </thead>
                                <!--Table head-->

                                <!--Table body-->
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM users where role_id = 2";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr class="">
                                                <th scope="row"><?= $row['id'] ?></th>
                                                <td class="fw-bold"><?= $row['fullname'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger delete px-4 py-1" data-id="<?= $row['id'] ?>">xóa</button>
                                                </td>
                                            </tr>
                                    <?php    }
                                    }

                                    ?>
                                </tbody>
                                <!--Table body-->
                            </table>
                            <!--Table-->
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade show" id="add-new">
                    <div class="mb-5">
                        <h3 class="all-user-title mb-5">Add New </h3>
                    </div>
                    <div class="add-new-form p-5">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Vai trò</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                    <option>Quản trị viên</option>
                                    <option>Người dùng</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email or username</label>
                                <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/qlsp.js"></script>
<script>
    const deletes = document.querySelectorAll('.delete')
    deletes.forEach(d => {
        d.onclick = e => {
            var xacNhan = confirm("Bạn có chắc chắn muốn xóa người dùng này không?");
            if (xacNhan == true) {
                const id = d.getAttribute('data-id')
                const data = {
                    id
                }
                console.log(data);
                fetch('./handle/deleteUser.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                        if (data = "xóa thành công") {
                            alert('xóa thành công')
                            location.reload()
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error)
                    });
            }
        }

    })
</script>