<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-5.3.2-dist/css/bootstrap.css?version=51">
    <link href="https://cdn.jsdelivr.net/npm/sakura-js@1.1.1/dist/sakura.min.css?version=51
" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css?version=51" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card {
            border-radius: 60px !important;
            backdrop-filter: saturate(200%) blur(20px);
            background: rgba(251, 251, 253, 0.312);
            border: none;
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

        .form-message {
            color: brown !important;
        }

        .title-sub {
            background: linear-gradient(to right, rgb(14, 11, 11), #0000ff);
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
        header('location: ../../index.php');
        exit();
    }
    $check = "";
    if (isset($_POST['login'])) {
        if ($_POST['email'] && $_POST['password']) {
            $fullname = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM users WHERE fullname = '$fullname' and password ='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['role_id'] == 1) {
                    $_SESSION['user'] = "$fullname";
                    header('location: ../../admin/index.php');
                    exit();
                } else {
                    $_SESSION['user'] = "$fullname";
                    header('location: ../../index.php');
                    exit();
                }
            } else {
                $check = "Sai tài khoản hoặc mật khẩu.";
            }
        } else {
            $check = "Vui lòng nhập đày đủ thông tin.";
        }
    }

    ?>
    <div class="box__log-in">
        <div class="d-flex box" style="width: 100%;height: 100vh; align-items: center;justify-content: center;">
            <!-- Jumbotron -->
            <div class="px-4 py-5 px-md-5 text-center text-lg-start w-100 " style="">
                <div class="container">
                    <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <h1 class=" title my-5 fw-bold ls-tight" style="font-size: 4rem;">
                                Đăng nhập <br />
                                <span class="title-sub " style="font-size: 3.8rem"></span>
                            </h1>

                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form action="" method="POST" class="form " id="form-1">
                                        <!-- 2 column grid layout with text inputs for the first and last names -->

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Tên Tài Khoản</label>
                                            <input id="email" name="email" type="text" rules="required|email" placeholder="VD: email@domain.com" class="form-control" />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password">Mật Khẩu</label>
                                            <input class="form-control" id="password" name="password" rules="required|min:6" type="password" placeholder="Nhập mật khẩu" />

                                        </div>

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex mb-2">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                                            <label class="form-check-label" for="form2Example33">
                                                Lưu Tài Khoản
                                            </label>
                                        </div>
                                        <div class="mb-2">
                                            <span class="form-message text-danger"><?php echo $check; ?></span>
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" name="login" class="btn btn-primary btn-block mb-4">
                                            Đăng Nhập
                                        </button>
                                        <button type="" class="btn  mb-4 fw-bold">
                                            <a href="../../html/sign-up/index.php" class="text-decoration-none">Đăng Ký</a>
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
    <script src="./assets/js/log-in.js"></script>
    <script>
        var options = {
            strings: ["Hãy đăng nhập.", "Để cập nhật các tin tức", "mới nhất!"],
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

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sakura-js@1.1.1/dist/sakura.min.js"></script>
    <script>
        var sakura = new Sakura('body', {
            colors: [{
                gradientColorStart: 'rgba(255, 183, 197, 0.9)',
                gradientColorEnd: 'rgba(255, 197, 208, 0.9)',
                gradientColorDegree: 120,
            }],
            delay: 200,
            maxSize: 14,
            minSize: 10
        });
        sakura.start();
    </script>
</body>

</html>