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
$date = date_create($_POST["birth"]);
//.$_POST["name"]: lấy dữ lieu từ cái form và truyenf cái name trong input vào cái form đấy. Tương tự $_POST["email"]

// đoạn này có nghĩa là lấy dữ liệu từ form để hiện thị ra màn hình, nếu ko có mà chỉ ghi echo $sql; thì chỉ in ra màn hình 1 chuỗi vô nghĩa
$sql = "INSERT INTO student (fullname, email, birthday) VALUES ('".$_POST["name"] ."', '".$_POST["email"] ."', '".$date ->format('Y-m-d') ."')";

if ($conn->query($sql) == TRUE) {
  echo "Them sinh vien thanh cong";
//neu thuc hien thanh cong, chung ta se cho di chuyen den taidulieu_bang.php
  header('Location: taidulieu_bang.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//  đóng kết nối
$conn->close();
?>


