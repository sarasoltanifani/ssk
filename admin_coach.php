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

<form name="new_plan" method="post"> 
		<table>
		<tr> <td colspan="2" style="background:#e31c25;border-radius:0.5em; color:white;">مشخصات دوره جدید</td> </tr>
		<tr><td>نام دوره <input type="text" name="c_name" /> </td>
		<td>مربی دوره <input type="text" name="c_coach" /> </td></tr>
		<tr><td>تعداد جلسه <input type="text" name="c_day_in_week" /> </td>
		<td>زمان هر جلسه<input type="text" name="c_time" /> </td></tr>
		<tr><td colspan="2"> <input type="submit" name="c_coach" value="ثبت دوره جدید" class="btn btn-lg px-4 btn-outline-primary" style="width:300px;"/> </td></tr>
		</table>
		<br/>
		<table>
		<tr> <td colspan="6" style="background:#e31c25;border-radius:0.5em; color:white;">لیست دوره ها</td> </tr>
			</form>
			<tr>
				<td>کد دوره </td>
				<td>نام دوره </td>
				<td>نام مربی</td>
				<td>تعداد جلسه هفتگی</td>
				<td>مدت زمان هر جلسه</td>
			</tr>
 <?php

if ($_SESSION["User_Type"]=='2')
{
	if (isset($_POST['c_name']))
	{
		$c_name = strip_tags(@$_POST['c_name']);
		$c_coach = strip_tags(@$_POST['c_coach']);
		$c_day_in_week = strip_tags(@$_POST['c_day_in_week']);
		$c_time = strip_tags(@$_POST['c_time']);
		
		$sql = "insert into plans (c_name, c_coach ,c_day_in_week ,c_time) values('$c_name', '$c_coach' ,'$c_day_in_week' ,'$c_time')";
 
		if ($conn->query($sql) === TRUE) {	echo '<center> دوره جدید با موفقیت ثبت شد </center>';}
		else { echo "Error: " . $sql . "<br>" . $conn->error;	}
	}
	$sql = "Select * from plans";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{ 
			while ($row = $result->fetch_assoc())
			{
				echo '<tr><td>' . $row["c_id"] . '</td><td>' . $row["c_name"] . '</td><td>' . $row["c_coach"] . '</td><td>' . $row["c_day_in_week"] . '</td><td>' . $row["c_time"] . '</td><td> <a class="btn px-4 btn-outline-primary" href="admin_remove_plan.php?id=' . $row["c_id"] . '"> حذف دوره </a></td></tr>' ;
			}
		}
}
$conn->close();
?> 
 </table>

    <!-- Register End -->
<?php include 'include/admin_menu.php';?>
<?php include 'include/footer.php';?>