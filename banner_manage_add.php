<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Banner</title>
</head>
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
            width: 90px;
            height: 40px;
     background: #6699FF;
     font-size: 20px;
     color: #0000CC;
     text-align: center;
     margin: 15px ;   
   border-bottom-left-radius: 2px solid #336633;
     cursor: pointer;}
        
        
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
    <form action="banner_manage_add2.php" method="post" enctype="multipart/form-data" name="form1">
        <table class="tb" align="left"  >
            <tr >
            <td class="title" align="right">ID Banner</td>
            <td class="txt"><input type="text" name="Id" value="" required="" size="48"/></td>
        </tr>
        <tr >
            <td class="title" align="right">Name</td>
            <td class="txt"><input type="text" name="Name"  size="48" /></td>
        </tr>
       
            <td class="title" align="right">Picture</td>
            <td class="txt"><input type="file" name="image" id="anh" /></td>
        </tr>           
            <tr >
            <td  align="right">
		<input type="submit" class="bt" name="Luu" value="Lưu" />
            </td>
            <td>
                <input type="reset" class="bt" name="Huy" value="Hủy" />
            </td>
        </tr>
    </table>
</form>

</body>
</html>
