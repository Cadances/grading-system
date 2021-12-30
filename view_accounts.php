<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
require_once('mysql_connection.php');
$con = mysqli_connect("localhost","root","","grading_system");
session_start();
if(!isset($_SESSION["id"]) || $_SESSION["id"] == '') 
{
	header('location: index.php');
}
?>
<body>
	<center>
		<?php include('header.html');?>
		<?php include('admin_header.php');?>
		</br>
		<form action="" post="POST">
		<table width="58%" cellspacing="0" style="border:3px solid #f35306;border-style: inset;">
			<tr>
				<th>
					<table width="100%" cellspacing="0">
						<tr>
							<th colspan="6" style="border-bottom: 1px solid;background-color: #f7b553;padding: 5px 0px;">Tài khoản giáo viên</th>
						</tr>
						<tr>
							<th width="30%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 5px 0px;">Hình ảnh</th>
							<th width="20%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 5px 0px;">Họ tên</th>
							<th width="15%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 5px 0px;">Tên người dùng</th>
							<th width="15%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 5px 0px;">Phân loại</th>
							<th colspan="2" width="20%" style="background-color: #f38b5a;border-bottom: 1px solid;padding: 5px 0px;"></th>
						</tr>
						<?php
						$query = "SELECT * FROM accounts order by id ASC";
						$result = mysqli_query($con, $query);
						while($row = mysqli_fetch_array($result)){
							$id = $row['id']; 
							$firstname = $row['firstname']; 
							$lastname = $row['lastname']; 
							$username = $row['username']; 
							$password = $row['password']; 
							$usertype = $row['usertype']; 
							$picture = $row['picture']; 
						?>
						<tr>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><img src="images/<?php echo "$picture";?>"  style="width: 40%; height: 60px; width: 60px;background-color: #f9f5f5;border: 2px solid black;"></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$lastname $firstname";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$username";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;"><?php echo "$usertype";?></th>
							<th style="background-color: #efb295;border-bottom: 1px solid;">
								<a href="edit_account.php?id=<?php echo $row['id'];?>" style="text-decoration: none;padding: 0px 15px;color: black;background-color: #abb5fb;border: 2px solid black;border-style: outset;border-radius: 5px;">Chỉnh sửa</a>
							</th>
							<th style="background-color: #efb295;border-bottom: 1px solid;">
								<a href="delete_account.php?id=<?php echo $row['id'];?>" style="text-decoration: none;padding: 0px 15px;color: black;background-color: #abb5fb;border: 2px solid black;border-style: outset;border-radius: 5px;">Xóa</a>
							</th>

						</tr>
						<?php }?>
					</table>
				</th>
			</tr>
		</table>
		</form>
	</center>
</body>
</html>