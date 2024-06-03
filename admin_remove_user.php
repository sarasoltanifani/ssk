<?php
include 'include/header.php';
if ($_SESSION["User_Type"]=='2')
{
	$u = strip_tags($_GET['id']);
	$sql = 'Delete from users where User_ID=' . $u;
	$conn->query($sql);
}
header("Location:admin_index.php");
?> 