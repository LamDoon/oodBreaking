<?php
include('connect.php');
if(isset($_GET["id"]))
{
    $sql="delete from giohang1 where idsp='".$_GET["id"]."'";
}
if(mysqli_query($connect,$sql))
{
	echo "<script language='javascript'>alert('Successful');";
		echo "location.href='giohang.php';</script>";
}
else 
    echo 'fail';


?>
