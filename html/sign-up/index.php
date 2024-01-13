<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-5.3.2-dist/css/bootstrap.css?version=51">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css?version=51" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
            border-radius: 60px !important;
            backdrop-filter: saturate(200%) blur(20px);
            background: rgba(251, 251, 253, 0.312);
            border: none;
        }

        .header__nav {
            display: none !important;
        }

        .typed-cursor {
            font-size: 60px;
            position: relative !important;
            top: -3px;
            color: rgb(112, 29, 29) !important;
        }

        .form-label {
            font-weight: 500;
        }

        .title-sub {
            background: linear-gradient(to right, black, blue);
            -webkit-background-clip: text;
            color: transparent;
            /* Đặt màu chữ thành trong suốt */
        }

        .form-control:focus {
            box-shadow: none !important;
            border: 1px solid brown !important;
        }

        .box {
            background-size: cover;
            background-image: url(https://i.pinimg.com/originals/00/05/f5/0005f5c4a5f1b48f474f576d11563cde.jpg);
        }

        .card-body {}

        .btn-icon {
            font-size: 25px !important;
        }

        @media(max-width: 960px) {

            .title-sub,
            .typed-cursor {
                font-size: 40px !important;
            }

            .card {
                border-radius: 20px !important;
            }



            .form-control {
                padding: 10px;
            }
        }

        @media(max-width: 578px) {

            .title-sub,
            .typed-cursor {
                display: none;
            }

            .title {
                font-size: 50px !important;
                text-transform: capitalize;

            }

        }
    </style>
</head>

<body>
    <?php
    include('../../handle/connect.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['user'])) {
        header("location: ../../index.php");
        exit();
    }
    $check = "";
    if (isset($_POST['signin'])) {
        if ($_POST['email'] && $_POST['password1'] && $_POST['password2']) {
            $fullname1 = mysqli_real_escape_string($conn, $_POST['email']);
            $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
            $role_id = 2;
            if ($password1 == $password2) {
                $emailExistQuery = "SELECT * FROM users WHERE fullname = '$fullname1'";
                $result = mysqli_query($conn, $emailExistQuery);
                if (mysqli_num_rows($result) > 0) {
                    $check = "Tài khoản này có người đã sử dụng";
                } else {
                    $sql = "INSERT INTO users ( role_id, fullname, password) VALUE(  $role_id,  '$fullname1', '$password1')";
                    if (mysqli_query($conn, $sql)) {
                        $_SESSION['user'] = $fullname1;
                        header("location: ../../index.php");
                        exit();
                    } else {
                        $check = "Sever đang quá tải!, bạn vui lòng tải lại sau.";
                    }
                }
            } else {
                $check = "Vui lòng nhập trùng mật khẩu.";
            }
        } else {
            $check = "Vui lòng nhập đầy đủ thông tin.";
        }
    }

    ?>
    <div class="box__sign-in">
        <div class="d-flex box" style="width: 100%;height: 100vh; align-items: center;justify-content: center;">
            <!-- Jumbotron -->
            <div class="px-4 py-5 px-md-5 text-center text-lg-start w-100 ">
                <div class="container">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class=" title my-5 fw-bold ls-tight" style="font-size: 4rem;">
                                Đăng ký <br />
                                <span class="title-sub " style="font-size: 3.8rem"></span>
                            </h1>

                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form method="POST" class="form" id="form-1">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Tên Tài Khoản</label>
                                            <input id="email" name="email" type="text" rules="required|email" placeholder="VD: email@domain.com" class="form-control" />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password1">Mật Khẩu</label>
                                            <input class="form-control" id="password1" name="password1" rules="required|min:6" type="password" placeholder="Nhập mật khẩu" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password2">Nhập lại Khẩu</label>
                                            <input class="form-control" id="password2" name="password2" type="password" placeholder="Nhập mật khẩu" />
                                        </div>


                                        <!-- Checkbox -->
                                        <div class="form-check d-flex">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                            <label class="form-check-label" for="form2Example33">
                                                Lưu Tài Khoản
                                            </label>


                                        </div>
                                        <div>
                                            <p class="form-message text-danger mt-2 fw-bold">
                                                <?php echo $check ?></span>
                                        </div>


                                        <!-- Submit button -->
                                        <button type="submit" name="signin" class="btn btn-primary btn-block mb-4">
                                            Đăng Ký
                                        </button>
                                        <button type="" class="btn  mb-4 fw-bold">
                                            <a class="text-decoration-none" href="../../html/login/index.php">Đăng Nhập</a>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Section: Design Block -->

    <!-- Jmbotron -->
    <!-- Section: Design Block -->
    <script src="./assets/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var options = {
            strings: ["Bắt đầu hành trình mới", "Đăng ký tài khoản ngay", "Cùng nhiều những ưu đãi hấp dẫn", " và tính năng độc đáo."],
            typeSpeed: 150, // Tốc độ chữ hiển thị (milliseconds)
            backSpeed: 50, // Tốc độ chữ mất đi (milliseconds)
            //   startDelay: 0, // Độ trễ trước khi bắt đầu (milliseconds)
            backDelay: 100, // Độ trễ trước khi bắt đầu mất đi (milliseconds)
            loop: true, // Lặp lại
            showCursor: true, // Hiển thị dấu nhấn (chỉ tương thích với CSS)
            cursorChar: "|", // Ký tự của dấu nhấn
        };

        var typed = new Typed(".title-sub", options);
    </script>
    <script src="./assets/js/log-in.js"></script>
</body>

</html>