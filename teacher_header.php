<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
</head>
<body>
<?php
$id = $_SESSION['id'];
$con = mysqli_connect("localhost","root","","grading_system");
$selectquery = "SELECT * FROM accounts where id = '".$id."'";
$selectresult = mysqli_query($con, $selectquery);
while ($row = mysqli_fetch_array($selectresult)){
	$picture = $row['picture'];
	$lastname = $row['lastname'];
	$firstname = $row['firstname'];
	$username = $row['username'];
}
?>
	<table>
		<tr>
			<th style="text-align: right;width: 76.7%;">
				<a href="view_records.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">Bảng điểm</a>
				<a href="create_student_account.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">Tạo học sinh mới</a>
				<a href="choose_grading.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">Thêm điểm</a>
				<a href="logout.php" style="text-decoration: none;background-color: #21f794;color: #000;padding: 10px 20px;font-weight: bolder;border: 3px solid #d05a5a;border-style: inset;">Đăng xuất</a>
			</th>
			<th style="padding: 5px 0px; text-align: center;">
				<img src="images/<?php echo "$picture";?>"  style="width: 18%; height: 38px; width: 38px;background-color: #f9f5f5;border: 2px solid black;">
				<span><?php echo "$username";?></span>
			</th>
		</tr>
	</table>
</body>
</html>