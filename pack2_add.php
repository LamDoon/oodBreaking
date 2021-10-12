<?php
	    
    include('connect.php');
		// upload hinh anh	
	$pic=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"image/".basename($pic));

	$id = $_POST['Id'];
	$ten = $_POST['Name'];
        $code = $_POST['code'];
	$tt = $_POST['Infomation'];
        $gia = $_POST['Price'];
	
	$sql = "insert into packofdata (Id,Name,code,Infomation,Price,Picture) "
                . "Value('$id','$ten','$code','$tt','$gia','$pic')";

	if(mysqli_query($connect,$sql))
	{
		echo "<script language='javascript'>";
		echo "location.href='packdata.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error();
	}

?>
