<?php

$servername = "localhost:3316";
$username = "root";
$password = "123456";
$dname = "coursedesign";

$conn = new mysqli($servername, $username, $password,$dname);
$sql = "select * from commercialtea";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo $row["code"]." ".$row["variety"]." ".
        $row["name"]." ".$row["grade"]." ".
        $row["mfgd"]." ".$row["quality"]." ".
        $row["price"]." ".$row["surplus"]."<br>";
    }
} else {
    echo "0 结果";
}

