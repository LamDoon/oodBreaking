<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <style>
            body{
                margin: 0;
                padding:0;
                font-family: sans-serif;
                background-size: cover;
                background-image: url(image/login_backg.jpg);
            }
            .box{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                width: 400px;
                padding: 40px;
                background: #0099CC;
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgba(0,0,0,.5);
                border-radius: 10px;
            }
            .box h2{
                margin: 0 0 30px;
                padding: 0;
                color: #fff;
                text-align: center;
            }
            .box .inputBox{
                position: relative;
            }
            .box .inputBox input{
                width: 100%;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                letter-spacing: 1px;
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid #fff;
                outline: none;
                background: transparent;
            }
            .box .inputBox label{
                position: absolute;
                top: 0;
                left: 0;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                pointer-events: none;
                transform: .5s;
                letter-spacing: 1px;
            }
            .box .inputBox input:focus ~ label,
            .box .inputBox input:valid ~ label{
                top: -18px;
                left: 0;
                color: #3366CC;
                font-size: 12px;
            }
            .box input[type="submit"]{
                background: transparent;
                border: none;
                outline: none;
                color: #fff;
                background: #03a9f4;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
            }
            .box .adr{
                margin-top: 5px;
            }
            .box .adr a{
                font-size: 12px;
               color: #3366CC;
               text-decoration: none;
            }
        </style>   
    </head>
    <body>
        <div class="box">
            <h2>Login</h2>
            <form method="post" action="login.php">
                <div class="inputBox">
                    <input type="text" name="name" required="">
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="Password" required="">
                    <label>Password</label>
                </div>
                <input type="submit" name="subb" class=""  value="Submit">
                <div class="adr"> <a href="">Forgot password</a></div>         
                <div class="adr"><a href="signup.php">Creat a account</a></div>
            </form>
        </div>
        <?php
        
session_start();
ob_start();
include('connect.php');
session_unset();
//$_SESSION['name']="";
if(isset($_POST['subb'])){
$password=$_POST['Password'];
//echo $password;
$password= md5($password);
//echo " helooooooooo: ".$password;
$username = filter_input(INPUT_POST, 'name');
$sql = "SELECT * FROM users WHERE UserName = '$username' and Password='$password'";
    $rs = mysqli_query($connect, $sql);     
    $row = mysqli_fetch_array($rs);    
   if (mysqli_num_rows($rs) > 0) { 
       
        if ($row['Type']=='admin'){            
        echo "<script language='javascript'>alert('Bạn đã đăng nhập với tư cách Admin');";
        $_SESSION['name']=$username;
			echo "location.href='index.php';</script>";
}
else 
    if ($row['Type']=='cus'){
echo "<script language='javascript'>";
echo "location.href='index.php';</script>";
 $_SESSION['name']=$username;
}
    }else{
    echo "<script language='javascript'>alert('Đăng nhập thất bại');";
echo "location.href='login.php';</script>";}
}
?>
    </body>
</html>

