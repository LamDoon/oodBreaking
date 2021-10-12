<?php
include('connect.php');
if(isset($_GET["Id"]))
{
    $sql="delete from menu where id_menu='".$_GET["Id"]."'";
}
if(mysqli_query($connect,$sql))
{
	echo "<script language='javascript'>alert('Successful');";
		echo "location.href='menu_setting.php';</script>";
}
else 
    echo 'fail';


?>
