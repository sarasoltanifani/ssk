<?php
include 'include/header.php';
if ($_SESSION["User_Type"]=='1')
{
	$uid = $_SESSION["User_ID"];
	$pid = strip_tags($_GET['pid']);
	$sql = 'Delete from register where u_id=' . $uid . ' and p_id=' . $pid;
	$conn->query($sql);
}
header("Location:user_index.php");
?> 