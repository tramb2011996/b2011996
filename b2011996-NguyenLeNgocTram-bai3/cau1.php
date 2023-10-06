<?php
// thong tin ve chuoi ket noi gom server name, username va mat khau de dang nhap vao mysql, mac dinh cua xampp la root, password rong

// $servername = "127.0.0.1"
$servername = "localhost";
$username = "root";
$password = "";

// Create connection - Tạo một kết nối
$conn = new mysqli($servername, $username, $password);
// Check connection
// khi khai báo 1 class mysqli có sãn connect_error nên không cần khai báo, chỉ cần gọi
if ($conn->connect_error) {
//hien thi loi neu ket noi khong duoc
  die("Connection failed: " . $conn->connect_error);
}
//neu ket noi thanh cong
echo "Connected successfully";
?>
