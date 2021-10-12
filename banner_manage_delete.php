<?php
include('connect.php');
if(isset($_GET["id_banner"]))
{
    $sql="delete from banner where id_banner='".$_GET["id_banner"]."'";
}
if(mysqli_query($connect,$sql))
{
	echo "<script language='javascript'>alert('Successful');";
		echo "location.href='banner_manage.php';</script>";
}
else 
    echo 'fail';


?>
