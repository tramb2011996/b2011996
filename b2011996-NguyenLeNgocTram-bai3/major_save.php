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

//truyền dữ liệu mới
$name = $_POST["name_major"];
// chèn vào bange major, chỉ chèn mỗi name
$sql = "INSERT INTO major (name_major) VALUES ('".$name."')";

// kiểm tra điều kiện xem câu truy vấn có in ra được không
if ($conn->query($sql) == TRUE) {
  echo "Them sinh vien thanh cong";
// neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
// nếu không thì dùng lệnh header trả về lệnh 
  header('Location: major_index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>



