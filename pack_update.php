<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Update Packdata</title>
    </head>
<style>
        body{
            font-family: arial;
            background-image: url("image/update_backg.jpg");
            background-size: cover; /*tu chia kich thuoc*/

        }
        .wrapper{
            width: 100% ;
            margin: 0px ;
            height: auto;
            margin-bottom: 20px;
            
        }
        .logo{
            float: left;
        }
       
         .header{
           margin: -15px;
            padding : 0px;
            width: auto;
            background-color: #3399FF;
           
            font-weight: bold;
            height: 100px;
            font-size: 15px;
              }
        .header h1{
           float: left;
    height: 0px;
   
    margin-left: 30px;
    font-weight: bold;
    color: white;
        }
        .tb{
            position: absolute;
           transform: translate(-50%,-50%);
          top: 70%;
            left: 50%;
        
           
        }
         .title {
            font-weight: bold;
            padding-right: 30px;
            padding-bottom: 20px;
            
           
        }
        .txt{
            padding-bottom: 20px;
        }
         .bt{
            width: 95px;
            height: 40px;
     background: #6699FF;
     font-size: 18px;
     color: #0000CC;
     text-align: center;
     margin: 15px ;
   
   border-bottom-left-radius: 2px solid #336633;
     cursor: pointer;
        }
        /*============ css header ========*/
         .logo{
            float: left;
        }
       
         .header{
           margin: -15px;
            padding : 0px;
            width: auto;
            background-color: #3399FF;           
            font-weight: bold;
            height: 100px;
            font-size: 15px;
              }
        .header h1{
           float: left;
    height: 0px;
   
    margin-left: 30px;
    font-weight: bold;
    color: white;
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
            body{
                margin: 0;
                padding:0;
                font-family: "Roboto", sans-serif;
            }
          /*==== end css header   === */ 
        </style>
    <body>
        <header>
            
            <div class="left_area">
                <h3>ooD<span>English</span></h3>
            </div>
            <div class="right_area">
                <a href="login.php" class="logout_btn">Logout</a>
            </div>
        </header>
        <?php
        include('connect.php');

        if (isset($_GET['Id'])) {
            $sql = "select * from packofdata where Id='" . $_GET['Id'] . "'";
           
        }
        $results = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($results);
        ?>
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table class="tb" align="left" width="1000">
                <tr>
                    <td class="title" align="right">Id</td>
                    <td class="txt">
                        <input type="text" name="Id123" value="<?php echo $row['Id']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Name</td>
                    <td class="txt">
                        <input type="text" name="Name" value="<?php echo $row['Name']; ?>" />
                    </td>
                </tr>
                 <tr>
                    <td class="title" align="right">Code</td>
                    <td class="txt">
                        <input type="text" name="code" value="<?php echo $row['code']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Infomation</td>
                    <td class="txt">
                  <textarea rows="9" cols="50" name="Infomation" ><?php echo $row['Infomation']; ?></textarea> 
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Price</td>
                    <td class="txt">
                        <input type="text" name="Price" value="<?php echo $row['Price']; ?>" />
                    </td>
                </tr>
               
                <tr>
                    <td class="title" align="right">Picture</td>
                    <td> <img src="image/<?php echo $row['Picture'] ?>" width="150" height="200" /></td>

                </tr>
                <tr>
                    <td align="right">&nbsp;</td>
                    <td>  <input type="file" name="image" id="image"  /> </td>
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
            if (isset($_GET['Picture'])) {
                $sl = "select Picture from packofdata where Id='" . $_GET['Id'] . "'";
           
            }
         
            $results = mysqli_query($connect, $sl);
            $d = mysqli_fetch_array($results);
            if ($d['Picture'] != $icon) {
                move_uploaded_file($anhminhhoa_tmp, "image/" . $icon);

                unlink('image/' . $d['Picture']);
            }
        }

        //lay gia tri cho tham so
        $tam = "";
        
        if (isset($_POST["Name"]))
            $name = $_POST['Name'];
        if (isset($_POST["code"]))
            $code = $_POST['code'];
        if (isset($_POST["Id123"]))
            $id = $_POST['Id123'];
        if (isset($_POST["Infomation"]))
            $info = $_POST['Infomation'];
        if (isset($_POST["Price"]))
            $price = $_POST['Price'];
        

        if (isset($_POST['Sua'])) {
            if (isset($_GET["Id"])) {
                $key = $_GET["Id"];
            }

            if ($icon == "") {
                $sl = "update packofdata set Id='$id',Name='$name',code='$code',Infomation='$info',Price='$price'"
                        . " where Id='$key'";
            } else {
                $sl = "update packofdata set Id='$id',Name='$name',code='$code',Infomation='$info',Price='$price',Picture='$icon'"
                        . " where Id='$key'";
            }
          if (mysqli_query($connect, $sl)) {
           
                echo "<script language='javascript'>";
                echo "location.href='packdata.php';</script>";
            }
        }
        ?>

    </body>
</html>