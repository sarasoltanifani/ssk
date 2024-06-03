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
  width:80%;
}
</style>

<table>
<tr> <td colspan="7" style="background:#e31c25;border-radius:0.5em; color:white;">لیست ثبت نام های انجام شده</td> </tr>
<tr>
	<td>نام کاربری </td>
	<td>موبایل </td>
	<td>نام دوره </td>
	<td>نام مربی </td>
	<td>تعداد جلسه هفتگی</td>
	<td>مدت زمان هر جلسه</td>
</tr>
 <?php

if ($_SESSION["User_Type"]=='2')
{
	$sql = "Select * from users INNER JOIN register on users.User_ID = register.u_id INNER JOIN plans on plans.c_id = register.p_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{ 
			while ($row = $result->fetch_assoc())
			{
				echo '<tr><td>' . $row["Username"] . '</td><td>' . $row["Mobile"] . '</td><td>' . $row["c_name"]. '</td><td>' . $row["c_coach"] . '</td><td>' . $row["c_day_in_week"] . '</td><td>' . $row["c_time"] . '</td><td> <a class="btn px-4 btn-outline-primary" href="admin_unreg.php?rid=' . $row["r_id"] . '"> حذف ثبت نام </a></td></tr>' ;
			}
		}
}
$conn->close();
?> 
 </table>

    <!-- Register End -->
<?php include 'include/admin_menu.php';?>
<?php include 'include/footer.php';?>