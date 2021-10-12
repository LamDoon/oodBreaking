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
    margin-top: 120px;
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
                    a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
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
            <a href="banner_manage.php"><i class="far fa-image"></i><span>Banner</span></a>
            <a href="admin_setting_account.php"><i class="fas fa-sliders-h"></i><span>Admin</span></a>
        </div>
        <div class="content">           
             <table class="tb" align="center" border="1" width="1000px" >
        <tr align="center"  class="truong" >
            <td class="title">ID</td>
            <td class="title">Hình Ảnh</td>            
            <td class="title">ID GC</td> 
            <td class="title">IDUser</td>
            <td class="title">Khách Hàng</td>             
            <td class="title">Số Điện Thoại</td>
            <td class="title">Địa Chỉ</td>
            <td class="title">Ngày Đặt</td>
            <td class="title">Thành Tiền</td>  
            <td class="title">Tình Trạng</td>
            <td class="title"><a href="">Xoá tất cả</a></td>
        </tr>
        <?php 
		$sql= "select * from ordertable order by Id desc ";
		$rs = mysqli_query($connect,$sql);
                $sql1= "select * from users ";
		$rs1 = mysqli_query($connect,$sql1);
		$rows1 = mysqli_fetch_assoc($rs1);		
		while( ($rows = mysqli_fetch_assoc($rs))!= NULL )
		{
	?>
        <tr align="center">
            <td><?php echo $rows['Id']; ?></td>
            <td><img src="image/<?php echo $rows['Picture'] ?>" width="80" height="100" /></td>            
            <td><?php echo $rows['IdPack']; ?></td>
            <td><?php echo $rows['IdUser']; ?></td>
            <td><?php echo $rows1['FullName']; ?></td>
            <td><?php echo $rows['Phone']; ?></td>
            <td><?php echo $rows['Address']; ?></td>
           <td><?php echo $rows['OrderDate']; ?></td> 
            <td><?php echo $rows['Money']; ?></td>     
             <td><?php echo $rows['Status']; ?></td>  
<!--            <td>    <form> 
                    <input type="radio" name="status" id="chua" >                
                    <input type="radio" name="status" id="giao">
                   </form>
                  
           
 <button onclick="checkchua()">chua</button>
<button onclick="checkgiao()">giao</button>
             
                </td>    
                     
                <script>
function checkgiao() {
  document.getElementById("giao").checked = true;
}
function checkchua() {
  document.getElementById("chua").checked = true;
}
</script>
                -->
                
                
          
            <td class="op">
                <a href="order_delete.php?Id=<?php echo $rows['Id'];?>" onclick="return confirm('Are you want to delete this?');">Delete</a>
            </td>
        </tr>
<?php } 
mysqli_close($connect);
?>
            
         </table>  
        </div>
    </body>
</html>