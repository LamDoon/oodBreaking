<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
//	if(!isset($_SESSION)){
//        session_start();}
//    ini_set("display_errors","0");

	
?>
    <?php 
	include("connect.php");
        include ('header.php');
?>
    <?php
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "remove":
     
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}}
  ?>  	
<body>
<div id ="wrapper">


</div>
    <?php 
    if (isset($_SESSION['name']))
	{ $sql_user = "select * from users where UserName ='".$_SESSION['name']."'";
            $result_user = mysqli_query($connect,$sql_user) or die ('Cannot select table!');
		if ($rows_user = mysqli_fetch_array($result_user))
        { $_SESSION['id_user'] = $rows_user['Id'];}
    
    
    
    ?>
    <div id ="wrapper">


<div class="navigation">

</div>

<form method="post">
	<div class="main-shopping">
<p class="cart_info"><?php






if($_SESSION['cart_item'] != NULL) {echo "Thông tin chi tiết giỏ hàng!"; 
?></p>
	<div class="cart_oder">
    	<ul class="top_cart">
        	<li class="sp">SẢN PHẨM </li>
            <li class="dg">ĐƠN GIÁ</li>
            <li class="sl">SỐ LƯỢNG</li>
            <li class="tt">THÀNH TIỀN</li>
        </ul>
		

            <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["Price"];
		?>
<!--SHOW CART-->
	       <ul class="bottom_cart">
        	<li class="sp">
            	<a><img src="image/<?php echo $item["Picture"]; ?>" class="cartImg"/><?php echo $item["Name"]; ?> </a>
              
                <div class="delete_Cart"><a href="gio_hang.php?action=remove&code=<?php echo $item["code"]; ?>">Bỏ sản phẩm</a></div>
            </li>
            <li class="dg"><?php echo "VND ".number_format($item["Price"],0);?> VNĐ</li>
            <li class="dg"><?php echo $item["quantity"];?></li>
            <li class="dg"><?php echo number_format($item['Price']);?> VNĐ</li>
        </ul>	
                
<?php
   

    $total_quantity += $item["quantity"];
                    $_SESSION['total'] = $total_quantity;
				$total_price += ($item["Price"]*$item["quantity"]);
 }
?>
    </div><!--end cart_oder-->

<p class="sum_money">Tổng sản phẩm:<strong class="sum_sp"><?php echo $total_quantity; ?></strong><br/>Tổng tiền:<strong class="sum_sp"><?php echo number_format($total_price); ?> VNĐ</strong></p>

<!--<a href="javascript:history.go(-1)" class="back_page"> Tiếp tục mua hàng</a>-->
<a href="sanpham.php" class="back_page"> Tiếp tục mua hàng</a>

<a href="gio_hang.php?action=empty" class="delete_all">Xóa giỏ hàng</a>



</form>
        <?php
} else{echo"Hiện tại bạn chưa có sản phẩm nào!";}

?>
</div><!--end main shopping--> 

    <!------------------------------------------FOOTER------------------------------------------------------>

<?php    

include 'footer.php'; ?>

</div><!--End Wrapper--->  <?php
//        }
//        else {    echo 'VUI LÒNG ĐĂNG NHẬP ĐỂ TIẾP TỤC';}
        }
        ?>
</body>
</html>
    