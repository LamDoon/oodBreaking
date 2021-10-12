 <?php   session_start();
ob_start();?>
<!doctype hml>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>ooD Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
        <style>
            body{
                margin: 0;
                padding:0;
                font-family: "Roboto", sans-serif;
            }
            header{
                position: fixed;
                background: #22242A;
                padding: 20px;
                width: 100%;
                height: 30px;
            }
            .left_area h3{
                color: #fff;
                margin: 0;
                text-transform: uppercase;
                font-size: 22px;
                font-weight: 900;
            }
            .left_area span{
                color: #1DC4E7;
            }
            .logout_btn{
                padding: 5px;
                background: #19B3D3;
                text-decoration: none;
                float: right;
                margin-top: -30px;
                margin-right: 40px;
                border-radius: 2px;
                font-size: 15px;
                font-weight: 600;
                color: #fff;
                transition: 0.5s;
                transition-property: background;
            }
            .logout_btn:hover{
                background: #0D9DBB;
            }
            .sidebar{
                background: #2F323A;
                margin-top: 70px;
                padding-top: 30px;
                position: fixed;
                left: 0;
                width: 250px;
                height: 100%;
                transition: 0.5s;
                transition-property: left;
            }
            .sidebar .profile_image{
                width: 100px;
                height: 100px;
                border-radius: 100px;
                margin-bottom: 10px;
            }
            .sidebar h4{
                color: #ccc;
                margin-top: 0;
                margin-bottom: 20px;
            }
            .sidebar a{
                color: #fff;
                display: block;
                width: 100%;
                line-height: 60px;
                text-decoration: none;
                padding-left: 40px;
                box-sizing: border-box;
                transition: 0.5s;
                transition-property: background;
            }
            .sidebar a:hover{
                background: #19B3D3;
            }
            .sidebar i{
                padding-right: 10px;
            }
            label #sidebar_btn{
                z-index: 1;
                color: #fff;
                position: fixed;
                cursor: pointer;
                left: 300px;
                font-size: 20px;
                margin: 5px 0;
                transition: 0.5s;
                transition-property: color;
            }
            label #sidebar_btn:hover{
                color: #19B3D3;
            }
            #check:checked ~ .sidebar{
                left: -190px;
            }
            #check:checked ~ .sidebar a span{
                display: none;
            }
            #check:checked ~ .sidebar a{
                font-size: 20px;
                margin-left: 170px;
                width: 80px;
                height: 30px; 
                
                
            }
            .content{
                margin-left: 250px;
               background: url(image/admin_background.jpg);
                background-position: center;
                background-size: cover;
                height: 100vh;
                transition: 0.5s;
            }
            #check:checked ~.content{
                margin-left: 60px;
            }
            #check{
                display: none;
            }
             .wrapper{
            width: 100% ;
            margin: 0px ;
            height: auto;
                   
        }
      
        
        .tb {
    margin-top: 90px;
    float: left;
    border-color: #00CCFF;
    color: #001100;
    margin-left:  50px;
     background-color: #0099FF;
    
     
        }
        .op{
            background-color: #009999;
        }
        .tb a{
            text-decoration: none;
            color: #330000	;
            
        }
        .tb a:hover{
            color: #996666;
        }
        .title {
            color: #FFFFCC;
           
        }
        .truong {
        
            color: #EEEEEE;
            background-color: #3B5998;
           
        }
        .header a{
                        color: white;
                        text-decoration: none;
                    }
        .header a:hover{
                        color: #FFCCCC;
                    }
                    .title {
            font-weight: bold;
            padding-right: 30px;
            padding-bottom: 20px;
            
           
        }
        .txt{
            padding-bottom: 20px;
           width: 95px;
        }
         .bt{
            width: 95px;
            height: 40px;
     background: #6699FF;
     font-size: 18px;
     color: #0000CC;
     text-align: center;
     margin: 15px ;}
         .tb txt {
              width: 300px;
         }
        </style>
    </head>
    <body>
    <?php        include 'connect.php'; ?>

        <input type="checkbox" id="check">
        <header>
            <label for="check">
                <i class="fas fa-bars" id="sidebar_btn"></i>
            </label>
            <div class="left_area">
                <h3>ooD<span><a href="index.php">English</a></span></h3>
            </div>
            <div class="right_area">
                <a href="index.php" class="logout_btn">Logout</a>
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
            <a href="banner_manage.php"><i class="far fa-image"></i><span>Banner</span></a>
            <a href="admin_setting_account.php"><i class="fas fa-sliders-h"></i><span>Admin</span></a>
        </div>
        <div class="content">
           
         <?php   include('connect.php');

       
            $sql = "select * from users where UserName='" . $_SESSION['name'] . "'";
           
        
        $results = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($results);
        ?>
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table class="tb" align="left" width="1000">
                <tr>
                    <td class="title" align="right">Picture</td>
                    <td><img src="image/<?php echo $row['Avt'] ?>" width="150" height="150" /></td>
                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>  <input type="file" name="image" id="image"  /> </td>
                </tr>
                <tr>
                    <td class="title" align="right">Id</td>
                    <td class="txt">
                        <input type="text" name="Id" disabled="true"value="<?php echo $row['Id']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">AdminName</td>
                    <td class="txt">
                        <input type="text" name="UserName" value="<?php echo $row['UserName']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Password</td>
                    <td class="txt">
                        <input type="password" name="Password" value="<?php echo $row['Password']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">FullName</td>
                    <td class="txt">
                        <input type="text" name="FullName" value="<?php echo $row['FullName']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Birthday</td>
                    <td class="txt">
                        <input type="text" name="Birthday" value="<?php echo $row['Birthday']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Email</td>
                    <td class="txt">
                        <input type="text" name="Email" value="<?php echo $row['Email']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Phone number</td>
                    <td class="txt">
                        <input type="text" name="Phone" value="<?php echo $row['Phone']; ?>" />
                    </td>
                </tr> 
                 <tr>
                    <td class="title" align="right">Address</td>
                    <td class="txt">
                      <textarea rows="5" cols="25" name="Address" ><?php echo $row['Address']; ?></textarea>
                   
                    </td>
                </tr>    
                <tr>
                    <td align="right">
                        <input type="hidden"  name="Id" value="<?php echo $_GET['Id']; ?>" />
                        <input type="submit" class="bt" name="Sua" value="Update" />
                    </td>
                    <td>
                        <input type="reset" class="bt"  name="Huy" value="Cancel" />
                    </td>
                </tr>
            </table>
        </form>
        <?php
        include('connect.php');

  

 
// upload hinh anh
        if (isset($_FILES["image"]["name"]))
            $icon = $_FILES["image"]["name"];
        if (isset($_FILES['image']['tmp_name'])) {
            $anhminhhoa_tmp = $_FILES['image']['tmp_name'];
            // nếu thay doi file anh khac thi xoa file da cu di
            if (isset($row['Avt'])) {
               $sl = "select Avt from users where Id='" . $row['Id'] . "'";
           echo $sl;
            }         
            $results = mysqli_query($connect, $sl);
            $d = mysqli_fetch_array($results);
          
            if ($d['Avt'] != $icon) {
                move_uploaded_file($anhminhhoa_tmp, "image/" . $icon);
                unlink('image/'.$d['Avt']);
            }
        }
        //lay gia tri cho tham so
        $tam = "";
        if (isset($_POST["Id"]))
            $id = $_POST['Id'];
        if (isset($_POST["UserName"]))
            $name = $_POST['UserName'];
        if (isset($_POST["Password"]))
            $pass = $_POST['Password'];
        if (isset($_POST["FullName"]))
            $full = $_POST['FullName'];
        if (isset($_POST["Birthday"]))
            $bir = $_POST['Birthday'];
        if (isset($_POST["Email"]))
            $email = $_POST['Email'];
        if (isset($_POST["Phone"]))
            $phone = $_POST['Phone'];
        if (isset($_POST["Address"]))
            $adr = $_POST['Address'];
        

        if (isset($_POST['Sua'])) {
          
                $key = $row["Id"];
            

            if ($icon == "") {
                $sl = "update users set UserName='$name',Password='$pass',FullName='$full',Email='$email',Birthday='$bir',Address='$adr',Phone='$phone'"
                        . " where Id='$key'";
               
            } 
            else {
                $sl = "update users set UserName='$name',Password='$pass',FullName='$full',Email='$email',Birthday='$bir',Address='$adr',Phone='$phone',Avt='$icon'"
                        . " where Id='$key'";
            }
          if (mysqli_query($connect, $sl)) {
                echo "<script language='javascript'>alert('Update succefull');";
                echo "location.href='admin.php';</script>";
            //  echo $sl;
                $_SESSION['name']=$name;
            }
        }
        ?>
            
         </table>  
        </div>
    </body>
</html>