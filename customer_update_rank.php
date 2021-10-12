<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Update Rank</title>
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
          top: 50%;
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
            $sql = "select * from users where Id='" . $_GET['Id'] . "'";
           
        }
        $results = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($results);
        ?>
        <form action="" method="post" enctype="multipart/form-data" name="form1">
            <table class="tb" align="left" width="1000">
                <tr>
                    <td class="title" align="right">Id</td>
                    <td class="txt">
                        <input type="text" disabled name="Id" value="<?php echo $row['Id']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td class="title" align="right">Rank</td>
                    <td class="txt">                        
                        <input list="rank" name="Rank" />
                            <datalist id="rank">
                            <option value="1">
                            <option value="2">
                            <option value="3">
                            </datalist>      
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
        //lay gia tri cho tham so
        $tam = "";
        if (isset($_POST["Id"]))
            $id = $_POST['Id'];
        if (isset($_POST["Rank"]))
            $rank = $_POST['Rank'];
        if (isset($_POST['Sua'])) {
            if (isset($_GET["Id"])) {
                $key = $_GET["Id"];
            }
        $sl = "update users set IdRank='$rank'"
                        . " where Id='$key'";
                echo $sl;
          if (mysqli_query($connect, $sl)) {
                echo "<script language='javascript'>alert('Cập nhật thành công');";
                echo "location.href='customer.php';</script>";
            }
        }
        ?>

    </body>
</html>