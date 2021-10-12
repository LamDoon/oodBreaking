<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	session_start();
	ini_set("display_errors","0");
?>
<body>
<div id ="wrapper">
<?php 
	include("connect.php");
        include ('header.php');
?>

</div>
    
    
   
<<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<title>ooD Product</title>
<script>	
	$(document).ready(function() {
	function ativeMenuLoaiDa(var_e,var_t)
	{
		$('#loaida').find('.iconE').removeClass("iconEavtive");$(var_e).find('.iconE').addClass("iconEavtive");$('#loaidaval').val("Da "+var_t);
	}

	});
</script>
</head>

<body>

<div id ="wrapper">
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
    <section class="content_ld">
   <aside class="product_l">
        	<div class="product_boder">
            	<?php 
                include("connect.php");
								// tong so records
//								$result =mysqli_query($conn,"select count(Id) as total from packofdata");
//								$row = mysqli_fetch_assoc($result);
//								$total_records = $row['total'];
//								// tim limit va current 
//								$current_page = isset($_GET['page']) ? $_GET['page']:1;
//								$litmit =12;
//								$total_page =  ceil($total_records / $litmit);
//								if($current_page > $total_page )
//								{
//									$current_page = $total_page;
//								}
//								else if($current_page < 1 )
//								{
//									$current_page = 1;
//								}
//								$start = ($current_page - 1) * $litmit;
								$result = mysqli_query($connect,"SELECT * FROM packofdata ");
								
                                                                
                                                                
				?>
                <?php
            	
                
					while ($row = mysqli_fetch_assoc($result))
					{
                                           
						echo"<div class='product_item'>";
						echo"
							<a href='#' class='images'>
							<img name='img_pro' alt='".$row['Name']."' src='image/".$row['Picture']."' width='190' height= '190'>
							</a>
							<h2 style='margin-top:0px;margin-bottom:0px;'>
							<a title='".$row['Name']."' href='#'>".$row['Name']."</a>
							</h2>
							<div class='price'>".number_format($row['Price'])." VNĐ</div><!--end pricxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxe-->
							<div class='ratings'>
								<div class='rating-box'>
									<div style='width:100%;' class='rating'></div><!--end rating-->
								</div><!--end ratingbox-->
							</div><!--end ratings-->
							<div class='add_cart' onclick='clickme()'><i></i>MUA NGAY</div>
							";
							echo "</div><!--end product_items-->";
					}
				?>
                
            </div><!--end product_boder-->
            <div class="phan_trang">
            	<?php
                	if($current_page > 1 && $total_page > 1)
					{
						echo "<a href='cham-soc-da-mat.php?page=".($current_page - 1)."'>
								<b class='prev'></b>
							</a>";
					}
					echo"<ul class='ul_phan_page'>";
					for($i = 1;$i <= $total_page;$i++)
					{
						
						if($i == $current_page)
						{
							echo "<li><span class='color_current'>".$i."</span></li>";
						}
						else
						echo "<li><a href='cham-soc-da-mat.php?page=".$i."'>".$i."</a></li>";
						
					}
					echo"</ul>";
					if($current_page < $total_page  && $total_page > 1)
					{
						echo "<a href='cham-soc-da-mat.php?page=".($current_page + 1)."'>
							<b class='next'></b>
						</a>";
					}
					
				?>
         
 </aside><!--end product_l-->
    </section><!--end content ld-->

<!------------------------------------------FOOTER------------------------------------------------------>

<?php                            include 'footer.php'; ?>

</div><!--End Wrapper---> 
</body>
</html>