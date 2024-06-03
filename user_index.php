<?php  ob_start(); include 'include/header.php';?>
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

		<h3 class="display-4 font-weight-bold">
		کاربر عزیز خوش آمدید!
		</h3>
		
		
		<p>
		با سلام کاربران گزامی، شما با استفاده از شماره موبایل و رمزو ورود خود به پنل کاربری خودر وارد شود. اگر تا الان ثبت نام انجام ندادید نگران نباشید از طریق صفحه ثبت نام میتوانید خودتان ثبت نام کنید.
		</p>
		
<table><tr> <td colspan="6" style="background:#e31c25;border-radius:0.5em; color:white;">دوره های من</td> </tr>
	<tr>
		<td>کد دوره </td>
		<td>نام دوره </td>
		<td>نام مربی</td>
		<td>تعداد جلسه هفتگی</td>
		<td>مدت زمان هر جلسه</td>
	</tr>
 <?php

if ($_SESSION["User_Type"]=='1')
{
	$sql = "Select * from plans inner join register on plans.c_id = register.p_id where register.u_id=" . $_SESSION["User_ID"]; 
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while ($row = $result->fetch_assoc())
		{
			echo '<tr><td>' . $row["c_id"] . '</td><td>' . $row["c_name"] . '</td><td>' . $row["c_coach"] . '</td><td>' . $row["c_day_in_week"] . '</td><td>' . $row["c_time"] . '</td><td> <a class="btn px-4 btn-outline-primary" href="user_plan_unreg.php?pid=' . $row["c_id"] . '"> حذف دوره </a></td></tr>' ;
		}
	}
}
?>
 </table>

<br/> <hr> <br/>
 		<table>
		<tr> <td colspan="6" style="background:#e31c25;border-radius:0.5em; color:white;">لیست دوره های قابل ثبت نام</td> </tr>
			</form>
			<tr>
				<td>کد دوره </td>
				<td>نام دوره </td>
				<td>نام مربی</td>
				<td>تعداد جلسه هفتگی</td>
				<td>مدت زمان هر جلسه</td>
			</tr>
 <?php

if ($_SESSION["User_Type"]=='1')
{
	$sql = "Select * from plans where plans.c_id not in (select p_id from register where u_id=" . $_SESSION["User_ID"] . ")";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{ 
		while ($row = $result->fetch_assoc())
		{
			echo '<tr><td>' . $row["c_id"] . '</td><td>' . $row["c_name"] . '</td><td>' . $row["c_coach"] . '</td><td>' . $row["c_day_in_week"] . '</td><td>' . $row["c_time"] . '</td><td> <a class="btn px-4 btn-outline-primary" href="user_plan_reg.php?pid=' . $row["c_id"] . '"> ثبت نام </a></td></tr>' ;
		}
	}
}
$conn->close();
?> 
 </table>
 <br/> <hr> </br/>
 <center><a href="logout.php" class="btn btn-lg px-4 btn-outline-primary"> خروج از سایت </a></center>
<?php include 'include/footer.php';?>