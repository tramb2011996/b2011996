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

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
//kiểm tra xem cái bảng, nếu = 0 thì trống, lớn hơn 0 thì tức là có dữ liệu
if ($result->num_rows > 0) {
  
  // trinh bay voi bang html
  //load du lieu moi len dua vao bien result
  $result = $conn->query($sql);
  $result_all = $result -> fetch_all(MYSQLI_ASSOC);
  //print_r($result_all);
  // trinh bay du lieu trong 1 bang html
  //tieu de bang

 ?>
 <h1>Bang du lieu sinh vien</h1>
 <!-- dòng 30 là hiển thị tiêu đè -->
 <table border=1><tr><th>ID</th><th>Hoten</th><th>email</th><th>ngaysinh</th><th>MaChuyenNganh</th><th>TenChuyenNganh</th><th colspan="2">Hanh dong</th></tr> 
<?php 
 // output data of each row
    foreach ($result_all as $row) {
    $date = date_create($row['Birthday']);
    // trong cái row là đang lấy dữ liệu của student, mà trong cái row đó chỉ có mã chuyên ngành thôi nen phải lấy bảng có tên chuyên ngành vò bảng major
    $sql="SELECT * FROM major WHERE id='".$row["major_id"]."'"; //Viết ra 1 câu query chưa có ý nghĩa gì cả. Lấy ra các row có mã chuyên ngành = mã chuyên ngành lấy từ studen
    $result = $conn->query($sql); //thực thi câu truy vấn đấy ( )
    $major = $result->fetch_assoc(); //lấy ra all dữ liệu của mã chuyên ngành
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . 
    $date ->format('d-m-Y')
    ."</td><td>" .$row["major_id"]."</td><td>".$major['name_major']."</td";
 ?>
<?php
echo "<td></td><td>";
?>
        <form method="post" action="xoa.php"> 
    <input type="submit" name="action" value="xoa"/>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
      echo "</td>";
    echo "<td>";
?>
        <form method="post" action="form_sua.php"> 
    <input type="submit" name="action" value="sua"/>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        </form>
<?php
      echo "</td></tr>";
    }
   echo "</table>";
  
} else {
  echo "0 ket qua tra ve";
}

//  đóng kết nối
$conn->close();
?>
