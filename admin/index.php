<?php
include('../handle/connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $sql = "SELECT * FROM users where fullName = '$user'";
    $check = mysqli_query($conn, $sql)->fetch_assoc();
    if ($check['role_id'] != 1) {
        header("location: ../index.php");
        exit;
    }
} else {
    header("location: ../index.php");
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?verison=51">
    <link rel="stylesheet" href="./css/style.css">

    <title>Admin Dashboard | TuanIT</title>
</head>

<body>

    <div class="container-fluid row gx-4">
        <!-- Sidebar Section -->
       
            <?php include_once("./nav_bar.php");
            ?>
      

        <!-- Main Content -->
       
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'orders_management':
                    include("./order_management.php");
                    break;  
                default:
                    include_once("./home.php");
                    break;
            }
        } else {
            include_once("./home.php");
        }
        ?>
       
        <!-- End of Main Content -->

        <!-- Right Section -->
       
            <?php include_once("./admin_user.php") ?>
       
    </div>

</body>

</html>