<?php
session_start();
$servername = "localhost:3316";
$username = "root";
$password = "123456";
$dname = "coursedesign";

$code = $_SESSION['code'];

$conn = new mysqli($servername, $username, $password,$dname);
$sql = "select * from commercialtea where code = '$code'";


$result = $conn->query($sql);
date_default_timezone_set('PRC');
$day = date('Y-m-d');
$day = date('Y').''.date('m').''.date('d').'';
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $code1 = 'D'.$row['code'];
        $code = $code1;
        $product_id = $row['code'];

        $con_money = $_SESSION['buy_money'];

        $sql = "insert into indent(product_id, con_money,mfgd) value 
                      ('$product_id',$con_money,$day)";
        $conn->query($sql);
    }
}
?>
