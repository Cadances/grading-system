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

$id = $_GET['id'];

$selectquery = "SELECT * FROM records WHERE id = '".$id."'";
$result = mysqli_query($con, $selectquery);
while($row = mysqli_fetch_array($result)){
	$getfirstname = $row['firstname']; 
	$getlastname = $row['lastname']; 
	$getmi = $row['mi']; 
	$getfirst = $row['first_grading'];
	$getsecond = $row['second_grading']; 
	$getthird = $row['third_grading']; 
	$getfourth = $row['fourth_grading'];
	$getpicture= $row['picture'];
}

if(isset($_POST['yes'])){
	$deletequery = "DELETE from records where id = '".$id."' ";
	mysqli_query($con, $deletequery);
?>
	<script>alert('Data successfully deleted!')</script>
	<script>windows: location="view_records.php"</script>
<?php
}

if(isset($_POST['no'])){
	echo '<script>windows: location="view_records.php"</script>';
}
?>
<body>
	<center>
		<?php include('header.html');?>
		<?php include('teacher_header.php');?>
		</br>
		<table width="40%" style="border: 4px solid #0909da;border-style: inset;border-radius: 10px;background-color: #c9e8ec;">
			<tr>
				<td>
					<center>
					<form action="" method="post">
						<table width="100%">
							<tr>
								<th width="50%" colspan="2"><img src="images/<?php echo "$getpicture";?>"  style="width: 25%; height: 100px; width: 100px;background-color: #f9f5f5;border: 2px solid black;"></th>
							</tr>
							<tr>
								<th width="50%" colspan="2"><?php echo "$getlastname $getmi $getfirstname";?></th>
							</tr>
							<tr>
								<th colspan="2" style="border-top: 2px solid black; padding: 10px 0px;">
									<font style="font-size: 20px"><strong>Bạn có chắc muốn xóa dữ liệu?</strong></font>
								</th>
							</tr>
							<tr>
								<th colspan="2">
									</br>
									<input type="submit" name="yes" value="Có" style="padding: 5px 30px;font-size: 12px;font-weight: bold;border-radius: 3px;border: 2px solid crimson;">&nbsp;&nbsp;
									<input type="submit" name="no" value="Không" style="padding: 5px 30px;font-size: 12px;font-weight: bold;border-radius: 3px;border: 2px solid crimson;">
									</br>
								</th>
							</tr>
						</table>
					</form>
					</center>
				</td>
			</tr>
		</table>	
	</center>
</body>
</html>