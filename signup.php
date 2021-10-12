<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
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
                background: #fff;
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgba(0,0,0,.5);
                border-radius: 10px;
            }
            .box h2{
                margin: 0 0 30px;
                padding: 0;
                color: #0099CC;
                text-align: center;
            }
            .box .inputBox{
                position: relative;
            }
            .box .inputBox input{
                width: 100%;
                padding: 10px 0;
                font-size: 16px;
                color: #0099CC;
                letter-spacing: 1px;
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid #0099CC;
                outline: none;
                background: transparent;
                font-size: 13px;
            }
            .box .inputBox label{
                position: absolute;
                top: 0;
                left: 0;
                padding: 10px 0;
                font-size: 16px;
                color: #0099CC;
                pointer-events: none;
                transform: .5s;
                letter-spacing: 1px;
            }
            .box .inputBox input:focus ~ label,
            .box .inputBox input:valid ~ label{
                top: -18px;
                left: 0;
                color: #CCCCCC;
                font-size: 12px;
            }
            .box input[type="submit"]{
               border-bottom: none;
               cursor: pointer;
               background: #0099CC;
               color: #fff;
               margin-bottom: 0;
               text-transform: uppercase;
               width: 100%;
               padding: 10px;
            }
            
        </style>   
    </head>
    <body>
        <div class="box">
            <h2>SignUp</h2>
            <form method="post" action="signup.php">
                <div class="inputBox">
                    <input type="text" name="FullName" required="">
                    <label>Fullname</label>
                </div>
                <div class="inputBox">
                    <input type="email" name="Email" required="">
                    <label>Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="UserName" required="">
                    <label>Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="Password" required="">
                    <label>Password</label>
                </div>
                 <div class="inputBox">
                    <input type="text" name="Birthday" required="">
                    <label>Birthday</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="Phone" required="">
                    <label>PhoneNumber</label>
                </div>
                <div class="inputBox">
                   <input type="text" name="Address" required="">
                    <label>Address</label>
                </div>
               
                <input name="sub" type="submit" value="Creat">
                
            </form>
        </div>
   <?php     
        include('connect.php');
        if (isset($_POST['sub'])) {
            $username = filter_input(INPUT_POST, 'UserName');
            $password = $_POST['Password'];
          // echo $password;
            $password = md5($password);    
         //  echo " chaoooo: ".$password;
            $phone = filter_input(INPUT_POST, 'Phone');
            $address = filter_input(INPUT_POST, 'Address');
            $fullname = filter_input(INPUT_POST, 'FullName');
            $email = filter_input(INPUT_POST, 'Email');
            $bir = filter_input(INPUT_POST, 'Birthday');
            $sl = "INSERT INTO users(UserName,FullName,Type,Address,Phone,Password,Birthday,Email) Value('$username','$fullname','cus','$address','$phone','$password','$bir','$email')";
            $kq = mysqli_query($connect, $sl);
           echo "<script language='javascript'>alert('Đăng ký tài khoản thành công! Mời bạn đăng nhập để tiếp tục');";
           echo "location.href='login.php';</script>";
           
        }
        ?>
        <?php
        mysqli_close($connect);
        ?>
        
        
    </body>
</html>

