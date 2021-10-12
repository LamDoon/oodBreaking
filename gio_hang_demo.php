<?php
if(!isset($_SESSION)){
    session_start();
}
include 'connect.php';
//include 'header.php';
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
                    $sql_ds = "SELECT * FROM packofdata WHERE Id='" . $_GET["code"] . "'";                    
      $rs_ds = mysqli_query($connect,$sql_ds);
                   
        while ($row=mysqli_fetch_assoc($rs_ds)){
			$productByCode[] = $row; 
                        echo $productByCode[0]["Id"];
                        }
                        
			$itemArray = array($productByCode[0]["Id"]=>array('Name'=>$productByCode[0]["Name"], 'Id'=>$productByCode[0]["Id"], 'quantity'=>$_POST["quantity"], 'Price'=>$productByCode[0]["Price"], 'Picture'=>$productByCode[0]["Picture"]));
                       
			if(!empty($_SESSION["cart_item"])) {
                           
				if(in_array($productByCode[0]["Id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["Id"] == $k) {
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
<TITLE>ood English</TITLE>
<link href="css/giohang_style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Your Cart</div>

<a id="btnEmpty" href="gio_hang_demo.php?action=empty">Empty Cart</a>
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
				<td><?php echo $item["Id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                <td  style="text-align:right;"><?php echo "VND ".number_format($item["Price"],0); ?></td>
				<td  style="text-align:right;"><?php echo "VND ". number_format($item_price,0); ?></td>
				<td style="text-align:center;"><a href="gio_hang_demo.php?action=remove&code=<?php echo $item["Id"]; ?>" class="btnRemoveAction"><img src="image/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
                                $_SESSION['total'] = $total_quantity;
				$total_price += ($item["Price"]*$item["quantity"]);
                        
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "VND ".number_format($total_price, 0); ?></strong></td>
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
	<?php
        $sql = "SELECT * FROM packofdata ORDER BY Id ASC";
        $rs = mysqli_query($connect,$sql); 
        while ($row=mysqli_fetch_assoc($rs)){
            $product_array[] = $row;
         
           
        }
	
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){ 
	?>
		<div class="product-item">
			<form method="post" action="gio_hang_demo.php?action=add&code=<?php echo $product_array[$key]["Id"]; ?>">
                            <div class="product-image"><img src="image/<?php echo $product_array[$key]["Picture"]; ?>" width='180' height= '180' class="img_sp"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-price"><?php echo $product_array[$key]["Price"]."đ"; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
      
</div>
      <?php include 'footer.php';?>
</BODY>
</HTML>