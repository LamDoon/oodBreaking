<?php
include('connect.php');
if(isset($_GET["Id"]))
{
    $sql="delete from users where Id='".$_GET["Id"]."'";
}
if(mysqli_query($connect,$sql))
{
	echo "<script language='javascript'>alert('Successful');";
		echo "location.href='customer.php';</script>";
}
else 
    echo 'fail';


?>
