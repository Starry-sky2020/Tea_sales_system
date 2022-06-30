<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin_3_UI.css">
    <script src="../BootStrap5/jquery-3.6.0.min.js"></script>
    <script src="../BootStrap5/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-dark fixed-top bg-dark" >
    <!-- Navbar content -->

    <ul class="nav nav-pills nav-fill" style="width: 100%">
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_5_UI.html">主页</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_1_UI.php">添加</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link " style="color: white" href="admin_2_UI.php">货架</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" style="background-color: #efa60a" href="admin_3_UI.php">删除记录</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_4_UI.php">下架商品</a>
        </li>

    </ul>
</nav>
<div style="height: 65px;"></div>
<div class="container" >

    <?php
    ob_start();
        $servername = "localhost:3336";
        $username = "root";
        $password = "20222022";
        $dname = "coursedesign";

        $conn = new mysqli($servername, $username, $password,$dname);
//        $user_code = $_SESSION["user_id"];

        $sql = "select * from behind ";
        $result = $conn->query($sql);


        echo "<table class='table table-dark' style='text-align: center'>
<form action='' method='post'>
  <thead>
    <tr>
   
      <th scope='col'>商品编号</th>
      <th scope='col'>删除日期</th>
      <th scope='col'>名称</th>
      <th scope='col'>品类</th>
      <th scope='col'>等级</th>
      <th scope='col'>产地</th>
      <th scope='col'>生产日期</th>
      <th scope='col'>净含量</th>
      <th scope='col'>
      <input type='submit' value='删除' name='del_behind' style='color:black; background-color: white'>
      </th>
    
    </tr>
  </thead>
    <tbody>
    ";
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $code = $row["code"];
                $product_behind = $row["product_behind"];
                $day = $row["day"];
                $variety = $row["variety_del"];
                $name = $row["name_del"];
                $grade = $row["grade_del"];
                $area = $row["area_del"];
                $mfgd = $row["mfgd_del"];
                $quality = $row["quality_del"];

                echo "
    <tr>
      <td>$product_behind</td>
      <td>$day</td>
      <td>$name</td>
      <td>$variety</td>
      <td>$grade</td>
      <td>$area</td>
      <td>$mfgd</td>
      <td>$quality</td>
      <td>
      
                
                <input type='checkbox'
                    name='checkbox[]' value='$code'>
</td>

    </tr>
";
            }
        }
        echo "  </tbody>
</table>

</form>";

        if (!empty($_POST["del_behind"])){
            if (isset($_POST["checkbox"])){
                $value = $_POST["checkbox"];
                foreach ($value as $behind_code){
                    $del_behind = "delete  from behind where code = '$behind_code'";
                    $conn->query($del_behind);
                }
            }
            header("location:#");
        }
    ?>
    <script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>