<?php 
// Địa chỉ SQL serve
$serverName = "127.0.0.1,1433";
//  TÀi khoản kết nối
$uid = "root";
$pwd ="";

// cấu hình kết nối
$connectionInfo = array ("UID"=>$uid, "PWD"=>$pwd, "Database"=>"tenDB");

//thực hiện kết nối
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if ($conn === false){
	echo "ko ket noi dc";
	//die nếu có lỗi sẽ hiển thị cái lỗi ra màn hình, nếu như kết thúc chương trình hoàn toàn. Sau lệnh die đó sẽ không làm gì hết
	die (print_r(sqlsrv_errors(), true));
}

?>