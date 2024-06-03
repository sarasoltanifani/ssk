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
  width:400px;
}
</style>

    <!-- Register Start -->
    <div class="container py-5">
        <div class="row align-items-center" style="text-align:right;">
		<h3 class="display-4 font-weight-bold">
		احراز هویت کاربران
		</h3>
		<p>
		با سلام کاربران گزامی، شما با استفاده از شماره موبایل و رمزو ورود خود به پنل کاربری خودر وارد شود. اگر تا الان ثبت نام انجام ندادید نگران نباشید از طریق صفحه ثبت نام میتوانید خودتان ثبت نام کنید.
		</p>
		<img src="img/register.png" />
		
		<table padding=2>
		<form id="login_Form" name="login_Form" method="post">
		<tr> <td colspan=2><b> مشخصات کاربری </B></td></tr>

		<tr>
			<td>شماره موبایل</td>
			<td><input type="text" name="Mobile"/></td>
		</tr>
		<tr>
			<td>رمز عبور</td>
			<td> <input type="password" name="Password"/> </td>
		</tr>

		<tr>
			<td colspan=2> <input type="submit" value="ورود به سایت" name="submit" class="btn btn-lg px-4 btn-outline-primary" style="width:350px"/></td>
		</tr>
		</form>
		</table>
 
 <?php

if (isset($_POST['Mobile']))
{
	$Mobile = strip_tags(@$_POST['Mobile']);
	$Password = strip_tags(@$_POST['Password']);
	
	if (!empty($Mobile) & !empty($Password))
	{
		$sql = "Select * from users where Mobile='$Mobile' and Password='$Password';";

			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{ 
				$row = $result->fetch_assoc();
				$_SESSION["User_ID"] =  $row["User_ID"];
				$_SESSION["Username"] =  $row["Username"];
				$_SESSION["Mobile"] =  $row["Mobile"];
				$_SESSION["User_Type"] =  $row["User_Type"];

				if ($row["User_Type"]=='1')
				{
						header("Location:user_index.php"); /* Redirect browser */
				}
				else
				{
					header("Location:admin_index.php"); /* Redirect browser */
				}
			}
			else
			{
				echo '<p style="color:red"> نام کاربری و رمز اشتباه است</p>';
			}
	}
	
}

$conn->close();

?> 
 
        </div>
    </div>
    <!-- Register End -->
<?php include 'include/footer.php';?>