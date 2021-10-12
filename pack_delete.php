<?php
include('connect.php');
if(isset($_GET["Id"]))
{
    $sql="delete from packofdata where Id='".$_GET["Id"]."'";
}
if(mysqli_query($connect,$sql))
{
	echo "<script language='javascript'>alert('Successful');";
		echo "location.href='packdata.php';</script>";
}
else 
    echo 'fail';



?>
