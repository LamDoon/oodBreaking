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
<!----------------------------------BANNER------------------>
<div class="content">
	<div class="banner">
    	<?php include("banner.php"); ?>
    </div><!--end banner-->
    
    <div class="homenew">
    	<a href="#" tittle="Khuyến mãi" target="_blank">
            <img src="image/uudai1.jpg" alt="Khuyến mãi" class="uudai"/>
        </a>
        <div class="figure">
            <a href="#">CÒN ĐỢI GÌ NỮA?</a>
            <b></b>
        </div><!--end figure-->
        <div class="image_figure">
            <img src="image/uudai.png" atl=""/>
        </div>
    </div>
    <!------------------------ slider TRỌN BỘ DATA-------------------------->
    <div class="sliderows">
    	<div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="TRỌN BỘ GÓI DATA">TRỌN BỘ GÓI DATA </a>
            </h2><!--end parent-->
            <div class="sub">
        		<a href="san-pham/cham-soc-da-mat.php" tittle="Xem tất cả">Xem tất cả</a>
                <i></i>
        	</div>            
        </div>
    <a href="#" tittle="Bộ sản phẩm" target="_blank">
        <img class="banner_rows" src="image/eng2.jpg" alt="Bộ sản phẩm"/>
    </a>
    <div class="selling">
    	<a href="#" tittle=" Tính năng " target="_blank">
        	<img src="image/allpack.png" alt=" Tính năng "/>
    	</a>
    </div>   		
    </div>
   <!------------------------ slider TÍNH NĂNG MỚI--------------------------> 
    <div class="sliderows sliderows_t sliderows_red">
    	<div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="tính năng">TÍNH NĂNG MỚI</a>
            </h2><!--end parent-->
            <div class="sub">
        		<a href="#" tittle="Xem tất cả">Đặt hàng ngay</a>
                <i></i>
        	</div> 
        </div>
        <a href="#" tittle="tính năng" target="_blank">
        	<img class="banner_rows" src="image/eng5.png" alt="tính năng"/>
    	</a>
    <div class="selling">
    	<a href="#" tittle=" tính năng " target="_blank">
        	<img src="image/eng3.png" alt=" tính năng "/>
    	</a>
    </div>       
    </div>
   <!------------------------ slider BA KỸ THUẬT-------------------------->
    <div class="sliderows sliderows_t sliderows_blue">
    	<div class="navicate">
        	<h2 class="parent">
            	<a href="#" tittle="3 KỸ THUẬT">BA KỸ THUẬT </a>
            </h2><!--end parent-->
            <div class="sub">
        		<a href="#" tittle="Xem tất cả">Đặt Hàng Ngay </a>
                <i></i>
        	</div>
        </div>
        <a href="#" tittle="nge" target="_blank">
        	<img class="third_rows" src="image/nghe.png" alt="nghe"/>
    	</a>
         <a href="#" tittle="phản xạ" target="_blank">
        	<img class="third_rows" src="image/talking.jpg" alt="phản xạ"/>
    	</a>
         <a href="#" tittle="nói" target="_blank">
        	<img class="third_rows" src="image/noi.png" alt="nói"/>
    	</a>
        <h2 class="third_rows_tit">KỸ THUẬT NGHE</h2>
        <h2 class="third_rows_tit">KỸ THUẬT PHẢN XẠ</h2>
        <h2 class="third_rows_tit">KỸ THUẬT NÓI</h2>    
    </div>

<!----------------------------------sliderows button dathang------------------------------------------->    
    
    <div class="sliderows sliderows_t sliderows_hg">
    	<div class="navicate">
        	<div class="btn_dathang">
                  <a href="#" tittle="" target="_blank">
                      <span>ĐẶT HÀNG NGAY</span></a>   
                </div>
        </div>
    </div>
</div>


<!------------------------------------------FOOTER------------------------------------------------------>
<?php include 'footer.php';?>
</div>
	
</body>
</html>