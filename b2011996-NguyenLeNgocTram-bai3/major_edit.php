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

//lấy id từ cái form nhậ vào
$id =  $_POST['id'];
//thực thi lệnh nhập vào
$sql = "select * FROM major WHERE ID='".$id."'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE HTML>
<html>  
<!-- 1.hthi ds
2.khi click vao ds se hien thi cai id, va hien thi ra form
3.sau khi hien thi ra form sẽ dua toi trang thu 3  -->
<body>

<form action="major_edit_save.php" method="post">
<!-- truyeenf id vì bây giờ mình sẽ update id nào, nếu k truyền id thì sẽ k biết sửa id nào, thường kiểu id sẽ là hidđen -->
<input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
<!-- cần hiển thị dữ liệu cũ tên gì ddweerr người dùng biết để sửa -->
Name: <input type="text" name="name_major" value="<?php echo $row['name_major'];?>"><br>


<input type="submit">
</form>

</body>
</html>

