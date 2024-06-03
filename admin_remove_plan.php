<?php
include 'include/header.php';
if ($_SESSION["User_Type"]=='2')
{
	$u = strip_tags($_GET['id']);
	$sql = 'Delete from plans where c_id=' . $u;
	$conn->query($sql);
}
header("Location:admin_coach.php");
?> 