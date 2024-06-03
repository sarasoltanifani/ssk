<?php include 'include/header.php';?>
<style>
table, th, td {
  padding: 15px;
  text-align:center;
}
table {
  margin-left: auto;
  margin-right: auto;
  background:#F1F1F1;
  border-radius:0.5em;
  width:600px;
}
</style>

    <!-- Register Start -->

		<table>
		<tr> <td colspan="4" style="background:#e31c25;border-radius:0.5em; color:white;">لیست  کاربران</td> </tr>
			<tr>
				<td>کد کاربر </td>
				<td>نام کاربر </td>
				<td>موبایل کاربر </td>
			</tr>
 <?php

if ($_SESSION["User_Type"]=='2')
{
	$sql = "Select * from users where User_Type=1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{ 
			while ($row = $result->fetch_assoc())
			{
				echo '<tr><td>' . $row["User_ID"] . '</td><td>' . $row["Username"] . '</td><td>' . $row["Mobile"] . '</td><td> <a class="btn px-4 btn-outline-primary" href="admin_remove_user.php?id=' . $row["User_ID"] . '"> حذف کاربر </a></td></tr>' ;
			}
		}
}
$conn->close();
?> 
 </table>
    <!-- Register End -->
<?php include 'include/admin_menu.php';?>
<?php include 'include/footer.php';?>