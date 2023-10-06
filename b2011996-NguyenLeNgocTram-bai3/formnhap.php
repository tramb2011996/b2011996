<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "select * FROM major"; //lấy dữ l
// <!-- laays ra id trong banr majjor cuar indes vaf luuw vaof bieens teen row -->
$result = $conn->query($sql); //thực thi lệnh nhập vào
$result_all = $result->fetch_all(MYSQLI_ASSOC); //lấy  all dlieu bảng major lưu vào biến fetch_all
?>

<!DOCTYPE HTML>
<html>  
<body>

<form action="luu.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Birthday: <input type="date" name="birth"><br>
Major: <select name="name_major"> 
<option>Select</option>
<?php foreach ($result_all as $row) { ?>
			<option value="<?php echo $row['id'];?>"><?php echo $row['name_major'];?></option> <?php }?> s
		</select>
<input type="submit">
</form>

</body>
</html>
