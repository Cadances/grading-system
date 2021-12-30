<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
require_once('mysql_connection.php');
session_start();
$type = $_GET['usertype'];

$con = mysqli_connect("localhost","root","","grading_system");

$selectquery = "SELECT * FROM accounts where usertype = '".$type."'";
$selectresult = mysqli_query($con, $selectquery);
while ($row = mysqli_fetch_array($selectresult)){
	$image = $row['picture'];
}

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM accounts where username='".$username."' and password = '".$password."' and usertype = '".$type."'";
	$result	= mysqli_query($con, $query);
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
		$_SESSION["id"] = $row['id'];
		if($type == "ADMIN"){
			header('location: view_accounts.php');
		} elseif($type == "USER"){
			header('location: view_records.php');
		}
	} 
	else 
	{
		echo "<script>alert('Incorrect Username or Password!')</script>";
	}
}
?>
<body> 
	<center>
		<?php include('header.html');?>
		</br>
		<table width="25%">
			<tr>
				<th style="border: 4px solid #0909da;border-style: inset;border-radius: 10px;background-color: #88edfb;">
					<center>
						<form action="" method="post">
							<table>
								<tr>
									<font style="font-size: 15px;"><strong>(<?php echo $type;?>)</strong></font>
									</br>
								</tr>
								<tr>
									<th>Tên người dùng:</th>
									<td><input type="text" name="username" required></td>
								</tr>
								<tr>
									<th>Mật khẩu:</th>
									<td><input type="password" name="password" required></td>
								</tr>
								<tr>
									<th colspan="2">
										</br>
										<input type="submit" name="login" value="Đăng nhập" style="border-radius: 4px;border-color: #ab9090; padding: 5px 15px;font-size: 15px;">
										<button style="border-radius: 4px;border-color: #ab9090; padding: 5px 0px;font-size: 15px;"><a href="index.php" style="text-decoration: none;cursor: default;    padding: 5px 15px; color: black;">Trở lại</a></button>
									</th>
								</tr>
							</table>
						</form>
					</center>
					</br>
					</br>
				</th>
			</tr>
		</table>
	</center>
</body>
</html>