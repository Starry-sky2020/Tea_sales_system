<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/UI_2.css">
  <script src="../BootStrap5/jquery-3.6.0.min.js"></script>
    <script src="../BootStrap5/js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-light fixed-top" style="background-color: #e3f2fd;" >
    <!-- Navbar content -->
    <ul class="nav nav-pills nav-fill" style="width: 100%">
        <li class="nav-item">
            <a class="nav-link" href="UI_1.php">主页</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link active" href="UI_2.php">商品</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_3.php">历史订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_4.php">预订订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_5.php">个人信息</a>
        </li>
    </ul>
</nav>


<div class="container">
<!--    控制格式-->
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
        ob_start();

        $servername = "localhost:3336";
        $username = "root";
        $password = "20222022";
        $dname = "coursedesign";
        $conn = new mysqli($servername, $username, $password,$dname);

        $sql = "select * from commercialtea";
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
            while($row = $result->fetch_assoc()) {
//                $pic = '0001.jpg';

                if ($cnt % 4 == 0){
                    echo '<hr/>';
                    echo '<div class="row" style="height: 450px;">';
                }
                $imag = $row["imag"];
                echo '<div class="col-md-3">';
                echo '<div class="card" style="width: 15rem; height: 12rem">';
                echo "<img src='../Imag/$imag' class='card-img-top' style='height: 150px; width: 238px;'>";
//                echo '"';
//                echo "class='card-img-top' style='height: 150px; width: 235px;'>";

                echo '<ul class="list-group list-group-flush">';

                echo '<li class="list-group-item">';
                echo $row["name"];
                echo '</li>';

                echo '<li class="list-group-item">';
                echo '<div class="row">';
                echo '<div class="col-auto">';
                echo '单价：'.$row["price"];
                echo '</div>';
                echo '<div class="col-auto">';
                echo '净含量：'.$row["quality"];
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
                echo '<form action="" method="get">';
                echo '<li class="list-group-item">';
                $code = $row['code'];
                $name = $row['name'];$grade = $row['grade'];
                $date = $row['mfgd'];$variety = $row['variety'];
                $area = $row['area'];$price = $row['price'];
                $quality = $row['quality']; $surplus = $row['surplus'];

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
                echo '</form>';
                $max = $row["surplus"];

                echo '<li class="list-group-item">';
                echo '<form action="" method="post">';
                echo "购买数量:<input type='number' name='$cnt' min='1' max='$max' step='1' style='width: 3rem'>";
                echo '</li>';
                echo '<li class="list-group-item">';
                echo "<input type='submit' class='btn btn-warning' name='car$cnt' style='float: left; width: 6rem' value='加购'>";
                echo "<input type='submit' class='btn btn-success' name='bnt$cnt' style='float: right; width: 6rem' value='购买'>";
                echo '</form>';
                echo '</li>';

                if (!empty($_POST["bnt$cnt"])) {
                    $_SESSION['buy'] = 1;
                    if (isset($_POST["$cnt"])) {
                        //买的数量
                        $buy_name = intval($_POST["$cnt"]);
                    }//数量减少

                    $buy_money = $buy_name * $row["price"];
                    $re = $row['code'];
                    $_SESSION["buy_number"] = $buy_name;
                    $_SESSION["buy_money"] = $buy_money;
                    $_SESSION['code'] = $row["code"];

                    if ($buy_name == 0)
                    {
                        echo '<script type = "text/javascript">';
                        echo 'alert("未选择购买商品数量")';
                        echo '</script>';
                    }else{
                        $sql = "update commercialtea set surplus = surplus - '$buy_name'
                                where code = '$re'";
                        $conn->query($sql);
                        header("location:#");//及时刷新
                        exit();
                    }
                }

                if (!empty($_POST["car$cnt"])) {
                    $_SESSION['car'] = 1;
                    if (isset($_POST["$cnt"])) {
                        $buy_name = intval($_POST["$cnt"]);
                    }//数量减少

                    $buy_money = $buy_name * $row["price"];
                    $re = $row['code'];

                    $_SESSION["car_num"] = $buy_name;
                    $_SESSION["car_money"] = $buy_money;
                    $_SESSION['car_code'] = $row["code"];

                    if ($buy_name == 0)
                    {
                        echo '<script type = "text/javascript">';
                        echo 'alert("未选择购买商品数量")';
                        echo '</script>';
                    }else{
                        $sql = "update commercialtea set surplus = surplus - '$buy_name'
                                where code = '$re'";
                        $conn->query($sql);
                        header("location:#");//及时刷新
//                        header(header:'#top');//及时刷新
                        exit();
                    }
                }

                $cnt++;
                echo '</div>';
                echo '</div>';
                if ($cnt % 4 == 0 && $cnt != 0)
                    echo '</div>';
            }
        }
        echo '<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>';
        ?>

<?php

//历史订单
    $user_id = $_SESSION["user_id"];
date_default_timezone_set('PRC');
$day = date('Y').''.date('m').''.date('d').'';
    error_reporting(0);
        if ($_SESSION['buy'] == 1){
        $code = $_SESSION['code'];
        $conn2 = new mysqli($servername, $username, $password,$dname);
        $sql2 = "select * from commercialtea where code = '$code'";

    $result2 = $conn2->query($sql2);

    if ($result2->num_rows > 0) {

        while ($row2 = $result2->fetch_assoc()) {

            $product_id = $row2['code'];
            $con_money = $_SESSION['buy_money'];
            $sql2 = "insert into indent(product_id, con_money,mfgd,user_code) value 
                      ('$product_id',$con_money,$day,'$user_id')";
            $conn2->query($sql2);
        }
    }
            $_SESSION['buy'] = 0;
    }

        //预订订单
    if ($_SESSION['car'] == 1){
        $code = $_SESSION['car_code'];

        $conn1 = new mysqli($servername, $username, $password,$dname);
        $sql1 = "select * from commercialtea where code = '$code'";
        $result1 = $conn1->query($sql1);
        if ($result1->num_rows>0){
            while ($row1 = $result1->fetch_assoc()){

                $product_id = $row1['code'];
                $con_money = $_SESSION['car_money'];
                $num = $_SESSION['car_num'];

                $sql1 = "insert into cart(product_id,con_money,num,user_code,day)
                            value ('$product_id',$con_money,$num,'$user_id','$day')" ;
                $conn1->query($sql1);
            }
        }
        $_SESSION['car'] = 0;
    }

    ?>

</body>

</html>
