<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
	
 include 'header.php';
?>
    <head>
        <title>ooD English</title>
      <link rel="stylesheet" type="text/css" href="css/dathang_style.css"/>
    </head>
    <body>

        <div class="dathang_bacgr">
            <form action="action" method="post" id="form1">
                <h2 id="title">Thông Tin Đặt Hàng</h2>
               
                <label>Người nhận(*)</label>
                <input type="text" name="inp" class="inp" placeholder="" required="">
                <label>Email(*)</label>
                <input type="text" name="inp" class="inp" placeholder="" required="">
                <label>Số điện thoại(*)</label>
                <input type="text" name="inp" class="inp" placeholder="" required="">
                <label>Tỉnh, thành phố(*)</label>
                <input list="tp" name="inp" class="inp" />
                            <datalist id="tp">
                            <option value="An Giang">
                            <option value="Bà Rịa - Vũng Tàu">
                            <option value="Bạc Liêu">
                            <option value="Bình Dương">
                            <option value="Bình Phước"> 
                            <option value="Bình Định">
                            <option value="Cà Mau">
                            <option value="Cần Thơ">
                            <option value="Đà Nẵng">
                            <option value="Đắk Lắk">
                            <option value="Đắk Nông">
                            <option value="Đồng Nai">
                            <option value="Đồng Tháp">
                            <option value="Gia Lai">
                            <option value="Hà Giang">
                            <option value="Hà Nội">
                            <option value="Hải Phòng">
                            <option value="Thành phố HCM">
                            <option value="Hưng Yên">
                            <option value="Khánh Hoà">
                            <option value="Kon Tum">
                            <option value="Lai Châu">
                            <option value="Lạng Sơn">
                            <option value="Lào Cai">
                            <option value="Lâm Đồng">
                            <option value="Nghệ An">
                            <option value="Ninh Bình">
                            <option value="Ninh Thuận">
                            <option value="Phú Thọ">
                            <option value="Phú Yên">
                            <option value="Quảng Bình">
                            <option value="Quảng Nam">
                            <option value="Quảng Ngãi">
                            <option value="Quảng Trị">
                            <option value="Sóc Trăng">
                            <option value="Tây Ninh">
                            <option value="Thái Bình">
                            <option value="Thái Nguyên">
                            <option value="Thanh Hoá">
                            <option value="Thừa Thiên - Huế">
                            <option value="Vĩnh Long">
                            <option value="Vĩnh Phúc">
                            <option value="Yên Bái">
                            </datalist>      
                <label>Địa chỉ nhận hàng(*)</label>
                <input type="text" name="inp" class="inp" placeholder="" required="">
                    <button class="btdh">Đặt Hàng</button>
                    </form>
            
        </div>
    </body>
</html>