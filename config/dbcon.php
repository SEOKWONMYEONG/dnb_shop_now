<?php
// 집
//$mysql_host = 'localhost:3306';
//$mysql_user = 'root';
//$mysql_password = '1234';
//$mysql_db = 'dalandbyeolshop';

//사무실
$mysql_host = 'localhost:3200';
$mysql_user = 'root';
$mysql_password = '';
$mysql_db = 'dalandbyeolshop';

$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

if($conn){
}else{
    echo "<script>alert('DB 연결에 실패하였습니다. 관리자에게 문의하세요.')</script>";
}

?>
