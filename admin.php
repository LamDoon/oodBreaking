<?php   session_start();
ob_start();?>
<!doctype hml>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ooD Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/admin_style.css"/>
        <style>
            .content{
                margin-left: 250px;
                 background: url(image/admin_background.jpg);
                background-position: center;
                background-size: cover;
                height: 100vh;
                transition: 0.5s;
            }
        </style>
    </head>
    <body>
     

        <input type="checkbox" id="check">
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div class="left_area">
                <h3>ooD<span><a href="index.php">English</a></span></h3>
            </div>
            <div class="right_area">
                <a href="login.php" class="logout_btn">Logout</a>
            </div>
        </header>
        
        <div class="sidebar">
            <center>
                <img src="image/ood.jpg" class="profile_image" alt="">
                <h4><?php echo $_SESSION['name']; ?></h4>
            </center>
            <a href="menu_setting.php"><i class="fas fa-desktop"></i><span>Menu</span></a>
            <a href="packdata.php"><i class="fas fa-wallet"></i><span>Gói Cước</span></a>
            <a href="order.php"><i class="fas fa-table"></i><span>Đơn Hàng</span></a>
            <a href="customer.php"><i class="fas fa-users"></i><span>Khách Hàng</span></a>
            <a href="banner_manage.php"><i class="far fa-image"></i></i><span>Banner</span></a>
            <a href="admin_setting_account.php"><i class="fas fa-sliders-h"></i><span>Admin</span></a>
        </div>
        <div class="content"></div>
    </body>
</html>