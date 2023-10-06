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

$id =  $_POST['id'];
//lấy dữ liệu từ cái có name là "birth" để update
//truyền vào cái date-create để format lại kiểu dữ liệu mới
$date = date_create($_POST["birth"]);
	  
$sql = "UPDATE student set fullname = '".$_POST['fullname']."', email = '".$_POST['email']."',birthday = '".$date ->format('Y-m-d')."'";
$sql = $sql. " WHERE ID='".$id."'";


if ($conn->query($sql) == TRUE) {
	//dòng này để quay trở lại trang taidulieu_bang1
  header('Location: taidulieu_bang1.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
