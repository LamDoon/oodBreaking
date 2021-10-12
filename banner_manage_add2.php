<?php
	    
    include('connect.php');
		// upload hinh anh	
	$pic=$_FILES['image']['name'];
    $anhminhhoa_tmp=$_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp,"image/".basename($pic));

	$id = $_POST['Id'];
	$ten = $_POST['Name'];
	
	
	$sql = "insert into banner (id_banner,name_banner,image_banner) "
                . "Value('$id','$ten','$pic')";

	if(mysqli_query($connect,$sql))
	{
		echo "<script language='javascript'>alert('Add Succefull!');";
		echo "location.href='banner_manage.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error();
	}

?>
