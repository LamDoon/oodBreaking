<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	
 if(!isset($_SESSION)){
        session_start();}
ini_set("display_errors","0");
?>
<?php

 // so san pham da add vao cart
	$prd = 0;
	if(isset($_SESSION['cart_item']))
	{
		$prd = $_SESSION['total'];
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style1.css"/>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<title>ooD English</title>
<script src='http://localhost:8080/webmypham/js/jquery-1.11.3.min.js' type='text/javascript'></script>

<script type='text/javascript'>
$(function() {
				 $(window).scroll(function() {
				 if ($(this).scrollTop() != 0) 
				 {
					$('.backtop').fadeIn();
				 }
				  else {
					$('.backtop').fadeOut();
				 }
 				 });
		$('.backtop').click(function() {
			$('body,html').animate({scrollTop: 0}, 700);
 		});

});
		
</script>


</head>

<div id ="header">

	<div class ="topbar">
    <div class ="container">
    	<div class="logo">
        	<a href="index.php">           

<img  class="lg"src="image/ood_logo_header1.jpg"><br>    
            </a>
        </div><!--end logo-->
    	<div class="search">
        	<form class="searchform" action="index/search.php" method="get">
			<input class="s" onfocus="if (this.value == 'Tìm kiếm …') {this.value = '';}" onblur="if (this.value == '') {this.value =		 		'Tìm kiếm …';}" type="text" name="timkiem" value="Tìm kiếm …" width="300px" />
        	<button class="searchsubmit" name="btTimkiem" type="submit" value=""> </button>
			</form>
        </div><!--
<!---end search---->
        
        <!--ĐĂNG NHẬP-->
     
<?php

?>
        <div class="login">
        <?php
                        $sql_user =" select * from users where UserName='".$_SESSION['name']."'";                       
			$sql_query =mysqli_query($connect,$sql_user);                        
			$row = mysqli_fetch_array($sql_query);
                        if (mysqli_num_rows($sql_query) > 0) { 
                        $type = $row['Type'];}
                        
        	if (isset($_SESSION['name']))
			{
                   
                   
				if($type == 'admin')
				{
					echo  '<a href="admin.php" style="display:block; !important;" class="xinchao">Xin chào: '.$_SESSION['name'].'
				<div class="hv_member">
          		<span class="exit"><a href="login.php">Đăng xuất</a></span>
         		 </div><!--end member-->
				</a>';
				}
				else
				{
					echo '<a href="#" style="display:block; !important;" class="xinchao">Xin chào: '.$_SESSION['name'].'
				<div class="hv_member">
          		<span class="exit"><a href="login.php">Đăng xuất</a></span>
         		 </div><!--end member-->
				</a>';
				}
				echo '<a href="#login-box" class="login-window" style="display:none !important;">Đăng nhập</a><a href="#" style="display:none !important;"> / Đăng ký</a>';
			}
			else
			{
				echo '<a href="admin/admin.php" style="display:none; !important;" class="xinchao">Xin chào:'.$_SESSION['username'].'</a>';
				echo '<a href="login.php" class="login-window" style="display:block !important;">Đăng nhập/Đăng ký</a>';

			}
			
		?>

        </div><!--end login-->
        
        <!--END ĐĂNG NHẬP-->
       	<div class="hotline">
        	<div class="ptittle">Hotline:</div><!--ptille-->
            <div class="pdetail">0313200022 - 0612200011</div><!--pdetail-->
        </div><!--hotline-->        
        
     </div><!--end container-->
    </div><!--End topbar--->
    
    <div class="menu">
    	<div class="container1">
        	<div class="nav">
        	<?php
                                include 'connect.php';
				$menu_query = "SELECT * FROM menu";
				$menu_result = mysqli_query($connect,$menu_query) or die ('Cannot connect table!'.mysqli_error($connect));
		
				while ($menu_items = mysqli_fetch_array($menu_result,MYSQLI_ASSOC))
				{
                                    echo "<div class='menu_leve_1'><a href = '".$menu_items['link_menu']."' class='parent'>".$menu_items['name_menu']."</a>
					<ul class='menuHiden' style='display: none;margin-bottom: 0px;margin-top: 0px;padding-left: 0px;padding-H:10px;'>";
				echo "</ul></div>";				
				}
			?>
            <div class="cart_div">
            <a href="gio_hang.php" class="cart_top">
            	<span class="count"><?php echo $prd; ?></span><!--end count-->
    			<span class="tit">Giỏ hàng</span><!--end tit-->
                    
    		</a>
<!--            <div class="quick_cart">-->
    <?php //cap nhat lai gia khi nhap vao so luong
    if (isset($_SESSION['name']))
	{ $sql_user = "select * from users where UserName ='".$_SESSION['name']."'";
            $result_user = mysqli_query($connect,$sql_user) or die ('Cannot select table!');
		if ($rows_user = mysqli_fetch_array($result_user))
        { 
        }}
    ?>                
<!--   
                    </div>End Quick-->
            </div><!--end cart_div-->
            
            </div><!--end nav-->
            
        </div><!--end container-->
    </div><!---menu-->    
</div><!--End Header--->