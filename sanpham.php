<?php
include 'header.php';
//session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM packofdata WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('Name'=>$productByCode[0]["Name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'Price'=>$productByCode[0]["Price"], 'Picture'=>$productByCode[0]["Picture"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
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
}
}
?>
<HTML>
<HEAD>
<TITLE>ooD English</TITLE>
<link href="css/sanpham_style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
    <div class="navigation">
    	<div class="blackRum">
        	<span class="home">
            	<a href="index.php">Trang chủ</a>
                 › 
            </span><!--end home-->
            <span class="tittleRum">
            	<?php echo 'Gói cước';
                        echo '›';
		?>
            </span><!--tittle rum-->           
        </div><!--end blackRum-->
    </div> <!--end navigation-->
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="sanpham.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["Price"];
		?>
				<tr>
				<td><img src="image/<?php echo $item["Picture"]; ?>" class="cart-item-image" /><?php echo $item["Name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo number_format($item["Price"],0)." VND"; ?></td>
				<td  style="text-align:right;"><?php echo number_format($item_price,0)." VND"; ?></td>
				<td style="text-align:center;"><a href="sanpham.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="image/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["Price"]*$item["quantity"]);
                                $_SESSION['total'] = $total_quantity;
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
        <div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="TRỌN BỘ GÓI DATA">TRỌN BỘ GIAO TIẾP </a>
            </h2><!--end parent-->
                  
        </div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM packofdata where code like 'GT%' ORDER BY Id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="sanpham.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>"width='190' height= '190'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."VND"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    <div id="product-grid">
	<div class="sliderows">
       <div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="tính năng">NGHE THÀNH THẠO</a>
            </h2><!--end parent-->
                    </div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM packofdata where code like 'N%' ORDER BY Id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="sanpham.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>"width='180' height= '180'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."VND"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    </div>
    <div id="product-grid">
	 <div class="sliderows">
       <div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="tính năng">LUYỆN VIẾT CHUẨN</a>
            </h2><!--end parent-->
                    </div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM packofdata where code like 'V%' ORDER BY Id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="sanpham.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>"width='170' height= '170'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."VND"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    </div>
    <div id="product-grid">
	
        <div class="sliderows sliderows_t sliderows_red">
       <div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="tính năng">PHẢN XẠ TOEIC</a>
            </h2><!--end parent-->
                    </div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM packofdata where code like 'GT%' ORDER BY Id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="sanpham.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>"width='190' height= '190'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."VND"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    </div>
    <div id="product-grid">
	<div class="sliderows sliderows_t sliderows_red">
       <div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="tính năng">IELTS ĐA CHIỀU</a>
            </h2><!--end parent-->
                    </div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM packofdata where code like 'GT%' ORDER BY Id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="sanpham.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>"width='190' height= '190'></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."VND"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
    </div>
    <?php 
    
        include 'footer.php';
        ?>
</BODY>
</HTML>