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

//lấy id của cái form xóa đó, tại sao lại lấy id vì id là khóa chính
$id =  $_POST['id'];

$sql = "DELETE FROM student WHERE ID='".$id."'";

//nếu ko có query thì nó sẽ in ra một chuỗi vô nghĩa
if ($conn->query($sql) == TRUE) {
  header('Location: taidulieu_bang1.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
