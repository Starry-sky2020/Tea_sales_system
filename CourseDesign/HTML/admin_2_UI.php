<?php
session_start();
//ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../CSS/admin_2_UI.css">
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
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
            <a class="nav-link"  style="color: white" href="admin_1_UI.php">添加</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link active" style="background-color: #efa60a" href="admin_2_UI.php">货架</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_3_UI.php">删除记录</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_4_UI.php">下架商品</a>
        </li>

    </ul>
</nav>
<div class="container" style="width: 75%">

      <div style="height: 65px"></div>
<div style="margin-right: auto" id="search_set">
    <form action="" class="d-flex" role="search" method="post" >
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width: 20rem" name="data">
        <input class="btn btn-outline-success" type="submit" value="Search" name="re_str">
    </form>
</div>

<hr>
<form action="" method="post">
    <div class="row-cols-md-auto">
        <input type="submit" class="btn btn-dark" value="价格降序" name="price_low">
        <input type="submit"  class="btn btn-secondary" value="价格升序" name="price_high">

        价格区间：<input type="text" name="money_low" style="width: 6rem;height: 2rem">
        -<input type="text" name="money_high" style="width: 6rem;height: 2rem">
        <input type="submit" value="确认" name="affrim" id = "btn_affrim">

    </div>
</form>

<?php
//                    ob_start();

                    $servername = "localhost:3336";
                    $username = "root";
                    $password = "20222022";
                    $dname = "coursedesign";
                    $conn = new mysqli($servername, $username, $password,$dname);

                    $sql = "select * from commercialtea where sign = 1";
                    //搜索
                    if (!empty($_POST['re_str'])){
                        if (isset($_POST['data'])){
                            $re_data = $_POST["data"];
                            $sql = "select * from commercialtea
            where code like '%$re_data%' or variety like '%$re_data%'
            or name like '%$re_data' or grade like '%$re_data%'
            or area like '%$re_data' or mfgd like '%$re_data%'
            or quality like '%$re_data%' or price like'%$re_data%'
            or surplus like '%$re_data%'";
                        }else{
                            echo "查询失败";
                        }
                    }
                    //价格升序
                    else if (!empty($_POST['price_high'])){
                        $sql = "select * from commercialtea
                    order by price asc";
                    }
                    //价格降序
                    else if (!empty($_POST['price_low'])){
                        $sql = "select * from commercialtea
                    order by price desc";
                    }
                    //价格区间
                    else if (!empty($_POST['affrim'])){
                        if(isset($_POST['money_low']) && isset($_POST['money_high'])){
                            if (!empty($_POST['money_low']) && !empty($_POST['money_high'])){
                                $money_high = $_POST['money_high'];
                                $money_low = $_POST['money_low'];

                                $sql = "select * from commercialtea
                    where price between $money_low and $money_high";
                            }
                        }else echo "查询失败";
                    }

                    $cnt = 0;

                    $result = $conn->query($sql);
if ($result->num_rows <= 0){
echo "商品列表为空！";
}

if ($result->num_rows > 0) {
    $_SESSION["change"] = 0;
    $_SESSION["delete"] = 0;
    $_SESSION["behind"] = 0;
while($row = $result->fetch_assoc()) {
if ($cnt % 4 == 0){
echo '<hr/>';
echo '<div class="row" style="height: 420px;">';
    }
    $imag = $row["imag"];
    echo '<div class="col-md-3">';
        echo '<div class="card" style="width: 15rem;">';
            echo "<img src='../Imag/$imag' class='card-img-top' style='height: 150px; width: 238px;'>";

            echo '<ul class="list-group list-group-flush">';

                echo '<li class="list-group-item">';
                    echo '<div class="row">';
                    echo '<div class="col-auto">';
                    echo $row["name"];
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';

                echo '<li class="list-group-item">';
                    echo '<div class="row">';
                        echo '<div class="col-auto">';
                            echo '单价：'.$row["price"].'元';
                            echo '</div>';
                        echo '<div class="col-auto">';
                            echo '质量：'.$row["quality"].'g';
                            echo '</div>';
                        echo '</div>';
                    echo '</li>';
                echo '<li class="list-group-item">';
                    echo '<div class="row">';
                        echo '<div class="col-auto">';
                            echo '等级：'.$row["grade"];
                            echo '</div>';
                        echo '<div class="col-auto">';
                            echo '剩余量：'.$row["surplus"];
                            echo '</div>';
                        echo '</div>';
                    echo '</li>';



                        $code = $row['code'];
//                        echo $code;
                        $name = $row['name'];$grade = $row['grade'];
                        $date = $row['mfgd'];$variety = $row['variety'];
                        $area = $row['area'];$price = $row['price'];
                        $quality = $row['quality']; $surplus = $row['surplus'];
    echo '<li class="list-group-item">';
    echo "<form action='' method='post'>";
    echo '<div class="row">';
    echo '<div class="col-auto">';

    echo "<input type='submit' class='btn btn-outline-danger' value='清空' style='width: 5rem;' name='delete$code'>";
    echo '</div>';
    echo '<div class="col-auto">';
    echo "<input type='submit' class='btn btn-outline-warning' value='下架' style='width: 5rem;' name='behind$code'>";
    echo '</div>';
    echo '</div>';
    echo "</form>";
    echo '</li>';

    if (!empty($_POST["delete$code"])){
        $_SESSION["delete"] = 1;
        $_SESSION["code"] = $code;
    }
    if (!empty($_POST["behind$code"])){
        $_SESSION["behind"] = 1;
        $_SESSION["code"] = $code;
    }
//
                    echo '<li class="list-group-item">';
                        echo "
<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#ch$code'>
    修改信息
</button>



<div class='modal fade' id='ch$code'  tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
    <input type='submit' class='btn btn-primary' name='change$code' value='修改信息' style='width: 29rem;'>
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
</div> ";





                        //模态框
    echo "    
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#example$code'>
                                        详细介绍
                    </button>
                    <div class='modal fade' id='example$code' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>$name</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    品类：$variety
                                    </div>
                                    <div class='col-md-6'>
                                    生产日期：$date
                                    </div>
                                    </div>
                                     <div class='row'>
                                    <div class='col-md-6'>
                                    等级：$grade
                                    </div>
                                
                                    <div class='col-md-6'>
                                    生产地：$area
                                    </div>
                                    </div>
                                </div>
                                <div class='modal-body'>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    净含量：$quality
                                    </div>
                                    <div class='col-md-6'>
                                    单价：$price
                                    </div>
                                    </div>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    商品编号：$code
                                    </div>
                                    <div class='col-md-6'>
                                    剩余量：$surplus
                                    </div>
                                </div>
                                
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>";
                        echo '</li>';

    if (!empty($_POST["change$code"])){
        $_SESSION["change"] = 1;
        $_SESSION["code"] = $code;
    }

                $cnt++;
                echo '</div>';
        echo '</div>';

    if ($cnt % 4 == 0 && $cnt != 0){

        echo '</div>';
    }

 }
}

?>
    <?php
    error_reporting(0);
    $code = $_SESSION["code"];
    $f = 0;
    date_default_timezone_set('PRC');
    $day = date('Y').''.date('m').''.date('d').'';
    if ($_SESSION["delete"] == 1){
        $sear_sql = "select * from commercialtea where code = '$code'";
        $record = $conn->query($sear_sql);
        if ($record->num_rows > 0){
            while ($row_reco = $record->fetch_assoc()){
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
        $conn->query($sql);
        $_SESSION["delete"] = 0;
        echo '<script> location.replace("admin_2_UI.php"); </script>';
//        header("location:#");
        $f = 1;
    }

    if ($_SESSION["behind"] == 1){

        $sql = 'SET foreign_key_checks = 0';
        $conn->query($sql);
        $sql_chan = "update commercialtea set sign = 0 where code = '$code'";
        $sql_day = "update commercialtea set behind_day = '$day' where code = '$code'";
        $conn->query($sql_chan);
        $conn->query($sql_day);
        $sql = 'SET foreign_key_checks = 1';


        $_SESSION["behind"] = 0;
        echo '<script> location.replace("admin_2_UI.php"); </script>';
//        header("location:#");
        $f = 1;
    }
    if ($f){
        $f = 0;
        header("location:#");
    }
    if ($_SESSION["change"] == 1){

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

        $_SESSION["change"] = 0;
        echo '<script> location.replace("admin_2_UI.php"); </script>';
    }

    ?>
</div>
<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>