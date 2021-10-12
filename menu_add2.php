<?php
	    
    include('connect.php');
		
	$id = $_POST['Id'];
	$ten = $_POST['Name'];
	$link = $_POST['Link'];
       
	$sql = "insert into menu (id_menu,name_menu,link_menu) "
                . "Value('$id','$ten','$link')";

	if(mysqli_query($connect,$sql))
	{
		echo "<script language='javascript'>alert('Add Succefull');";
		echo "location.href='menu_setting.php';</script>";
	}
	else
	{
		echo 'Lỗi: ',mysqli_error();
	}

?>
