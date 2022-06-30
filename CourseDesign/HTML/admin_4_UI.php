<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品上架</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin_4_UI.css">
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
            <a class="nav-link " style="color: white" href="admin_1_UI.php">添加</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link " style="color: white" href="admin_2_UI.php">货架</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_3_UI.php">删除记录</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" style="background-color: #efa60a" href="admin_4_UI.php">下架商品</a>
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

    $sql = "select * from commercialtea where sign = 0";
    $result = $conn->query($sql);


    echo "<table class='table' style='text-align: center;'>
  <thead >
    <tr class='table-secondary' >
      <th scope='col'>商品编号</th>
      <th scope='col'>下架日期</th>
      <th scope='col'>名称</th>
      <th scope='col'>品类</th>
      <th scope='col'>等级</th>
      <th scope='col'>产地</th>
      <th scope='col'>生产日期</th>
      <th scope='col'>净含量</th>
      <th scope='col'>重新上架</th>
      <th scope='col'>清除</th>
    </tr>
  </thead>
    <tbody>
    ";
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $code = $row["code"];
            $variety = $row["variety"];
            $name = $row["name"];
            $grade = $row["grade"];
            $area = $row["area"];
            $mfgd = $row["mfgd"];
            $quality = $row["quality"];
            $behind_day = $row["behind_day"];

            echo "
    <tr class='table-secondary'>
    <td>$code</td>
    <td>$behind_day</td>
      <td>$name</td>
      <td>$variety</td>
      <td>$grade</td>
      <td>$area</td>
      <td>$mfgd</td>
      <td>$quality</td>
      <td> 
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#up$code'>
                重新上架
</button>



<div class='modal fade' id='up$code'  tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog  modal-dialog-scrollable'>

        <div class='modal-content'>

<div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>$name</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
<form class='row g-3' action='' method='post'> 
<div class='modal-body'>

<table class='table '>
<tbody>
<tr class='table-active'>
    <th>
    <label for='inputEmail4' class='form-label' >名称</label>
    <input type='text' class='form-control' id='inputEmail4' name='name_$code'>
    </th>
    <th>
    <label for='inputPassword4' class='form-label' >品类</label>
    <input type='text' class='form-control' id='inputPassword4' name='variety_$code'>
    </th>
</tr>
<tr class='table-active'>
    <th colspan='2'>
    <label for='inputAddress' class='form-label' >产地</label>
    <input type='text' class='form-control' id='inputAddress' name='address_$code'>
    </th>
</tr>

<tr class='table-active'>
<th>
    <label for='inputEmail4' class='form-label'>生产日期</label>
    <input type='text' class='form-control' id='inputEmail5' name='mfgd_$code'>
    </th>
    <th>
    <label for='inputPassword4' class='form-label' >净含量（g）</label>
    <input type='text' class='form-control' id='inputPassword5' name='quality_$code'>
     </th>
  
</tr>    
<tr class='table-active'>
  <th>
    <label for='inputCity' class='form-label' >价格（元）</label>
    <input type='text' class='form-control' id='inputCity' name='price_$code'>
    </th>
    <th>
    <label for='inputZip' class='form-label'>剩余量</label>
    <input type='text' class='form-control' id='inputZip' name='surplus_$code'>
      </th>
   
    
</tr>     
<tr class='table-active'>
<th colspan='2'>
<label for='inputEmail4' class='form-label' >图片名称</label>;
    <input type='text' class='form-control' id='inputEmail6' name='img_$code'>
    </th>
</tr>
<tr class='table-active'>
<th colspan='2'>
    <input type='submit' class='btn btn-primary' name='change$code' value='修改信息并上架' style='width: 29rem;'>
    </th>
</tr>  
</tbody>
</table>
</div>
</form>

            <div class='modal-footer' style='height: 4rem;'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>关闭</button>
            </div>
        </div>
    </div>
</div> 
</td>
<form action='' method='post'>
<td><input type='submit' class='btn btn-danger' value='清除' name='del_record$code'></td>
</form>
    </tr>
";
            if (!empty($_POST["change$code"])){
                $_SESSION["change_up"] = 1;
                $_SESSION["code"] = $code;
            }
            if (!empty($_POST["del_record$code"])){
                $_SESSION["del_record"] = 1;
                $_SESSION["code"] = $code;
            }
        }
    }
    echo "  </tbody>
</table>";


    ?>
    <?php
    error_reporting(0);
    $code = $_SESSION["code"];

    if ($_SESSION["change_up"] == 1){

        if(!empty($_POST["name_$code"])){
            $name_ = $_POST["name_$code"];

            $change_sql = "update commercialtea set name = '$name_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["variety_$code"])){
            $variety_ = $_POST["variety_$code"];
            $change_sql = "update commercialtea set variety = '$variety_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["address_$code"])){
            $address_ = $_POST["address_$code"];
            $change_sql = "update commercialtea set address = '$address_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["mfgd_$code"])){
            $mfgd_ = $_POST["mfgd_$code"];
            $change_sql = "update commercialtea set mfgd = '$mfgd_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["quality_$code"])){
            $quality_ = $_POST["quality_$code"];
            $change_sql = "update commercialtea set quality = '$quality_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["price_$code"])){
            $price_ = $_POST["price_$code"];
            $change_sql = "update commercialtea set price = '$price_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["surplus_$code"])){
            $surplus_ = $_POST["surplus_$code"];
            $change_sql = "update commercialtea set surplus = '$surplus_' where code = '$code'";
            $conn->query($change_sql);
        }
        if (!empty($_POST["img_$code"])){
            $img_ = $_POST["img_$code"];
            $change_sql = "update commercialtea set img = '$img_' where code = '$code'";
            $conn->query($change_sql);
        }
        $sql_chan = "update commercialtea set sign = 1 where code = '$code'";
        $conn->query($sql_chan);

        $_SESSION["change_up"] = 0;
        echo '<script> location.replace("admin_4_UI.php"); </script>';
    }
    $day = date('Y').''.date('m').''.date('d').'';
    if ($_SESSION["del_record"] == 1){
        $sql = "select * from commercialtea where code = '$code'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row_reco = $result->fetch_assoc()){
                $variety_r = $row_reco["variety"];
                $name_r = $row_reco["name"];
                $grade_r = $row_reco["grade"];
                $area_r = $row_reco["area"];
                $mfgd_r = $row_reco["mfgd"];
                $quality_r = $row_reco["quality"];
            }
        }
        $sql = 'SET foreign_key_checks = 0';
        $conn->query($sql);
        $sql_del = "delete from commercialtea where code = '$code'";
        $conn->query($sql_del);
        $sql_add = "insert into behind(product_behind, day,variety_del,name_del,grade_del,area_del,mfgd_del,quality_del)
                    value ('$code',$day,'$variety_r','$name_r','$grade_r','$area_r','$mfgd_r','$quality_r')";
        $conn->query($sql_add);
        $sql = 'SET foreign_key_checks = 1';
    }
    ?>
</body>
</html>