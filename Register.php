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
  width:500px;
}
</style>

    <!-- Register Start -->
    <div class="container py-5">
        <div class="row align-items-center" style="text-align:right;">
		<h2>ثبت نام در باشگاه</h2>
		
		<p>کاربران عزیز خوش آمدید، برای ثبت نام اولیه در باشگاه بدنسازی لطفا مشخصات خود را در قسمت زیر وارد نمایید تا ثبت نام شما توسط ما بازبینی و تکمیل گردد. از اینکه به ما اعتماد میکنید تشکر میکنیم.
		</p>
		<img src="img/register.png" />
		<table padding=2>
		<form id="Register_Form" method="post">
		<tr> <td colspan=2> <center><b> مشخصات کاربری جدید </B><center></td></tr>
		<tr>
			<td>نام و نام خانوادگی</td>
			<td><input type="text" name="Username"/></td>
		</tr>
		
		<tr>
			<td>شماره موبایل</td>
			<td><input type="text" name="Mobile"/></td>
		</tr>
		
		<tr>
			<td>رمز عبور</td>
			<td> <input type="password" name="Password"/> </td>
		</tr>
		
		<tr>
			<td>تکرار رمز عبور</td>
			<td> <input type="password" name="Password2"/> </td>
		</tr>
		
		<tr>
			
			<td colspan=2> <input type="submit" value="ثبت نام" name="submit" class="btn btn-lg px-4 btn-outline-primary" style="width:350px"/></td>
 		</tr>
		</form>
		</table>
		
<?php
if (isset($_POST['Username']))
{
	$Username = strip_tags(@$_POST['Username']);
	$Mobile = strip_tags(@$_POST['Mobile']);
	$Password = strip_tags(@$_POST['Password']);
	$Password2 = strip_tags(@$_POST['Password']);
	
	if (($Password == $Password2) & !empty($Username) & !empty($Password))
	{
		$sql = "insert into users (Username, Password ,Mobile ,User_Type) values('$Username', '$Password' ,'$Mobile' ,'1')";
 
		if ($conn->query($sql) === TRUE) {	echo '<center> کاربر عزیز ثبت نام شما با موفقیت انجام شد. </center>';}
		else { echo "Error: " . $sql . "<br>" . $conn->error;	}
	}
	
}

$conn->close();

?> 
        </div>
    </div>
    <!-- Register End -->
<?php include 'include/footer.php';?>