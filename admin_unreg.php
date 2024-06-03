<?php
include 'include/header.php';
if ($_SESSION["User_Type"]=='2')
{
	$rid = strip_tags($_GET['rid']);
	$sql = 'Delete from register where r_id=' . $rid;
	$conn->query($sql);
}
header("Location:admin_registers.php");
?> 