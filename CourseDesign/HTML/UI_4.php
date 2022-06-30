<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/UI_4.css">
    <script src="../BootStrap5/jquery-3.6.0.min.js"></script>
</head>

<body>

<nav class="navbar navbar-light fixed-top" style="background-color: #e3f2fd;" >
    <!-- Navbar content -->
    <ul class="nav nav-pills nav-fill" style="width: 100%">
        <li class="nav-item">
            <a class="nav-link" href="UI_1.php">主页</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link" href="UI_2.php">商品</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_3.php">历史订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="UI_4.php">预订订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_5.php">个人信息</a>
        </li>
    </ul>
</nav>

<div class="container"  >
    <div style="height: 60px;"></div>
    <?php
    ob_start();
        $servername = "localhost:3336";
        $username = "root";
        $password = "20222022";
        $dname = "coursedesign";

        $conn = new mysqli($servername, $username, $password,$dname);
//        if (isset($_SESSION["user_id"]))
        error_reporting(0);
        $cart_user = $_SESSION["user_id"];
        $sql = "select * from cart where user_code = '$cart_user'";
        $result = $conn->query($sql);


    echo "<table class='table'>
  <thead>
    <tr>
      <th scope='col'>预定编号</th>
      <th scope='col'>商品编号</th>
      <th scope='col'>数量</th>
      <th scope='col'>总额</th>
      <th scope='col'>名称</th>
      <th scope='col'>产地</th>
      <th scope='col'>预定日期</th>
      <th scope='col'>详情</th>
    </tr>
  </thead><tbody>";


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $cart_code = $row["code"];
            $cart_num = $row["num"];
            $cart_money = $row["con_money"];
            $product_id = $row['product_id'];
            $sql_mess = "select * from commercialtea where code = '$product_id'";
            $result_mess = $conn->query($sql_mess);
            if ($result_mess->num_rows > 0){
                while ($row_mess = $result_mess->fetch_assoc()){
                    $mess_variety = $row_mess['variety'];
                    $tea_code = $row_mess['code'];
                    $mess_name = $row_mess['name'];$mess_grade = $row_mess['grade'];
                    $mess_date = $row_mess['mfgd'];$mess_variety = $row_mess['variety'];
                    $mess_area = $row_mess['area'];$mess_price = $row_mess['price'];
                    $mess_quality = $row_mess['quality'];$mess_surplus = $row_mess["surplus"];
                    $mess_day = $row["day"];

                }
            }


            echo "
                        <tr>
                          <th scope='row'>$cart_code</th>
                          <td>$tea_code</td>
                          <td>$cart_num</td>
                          <td>$cart_money</td>
                          <td>$mess_name</td>
                          <td>$mess_area</td>
                          <td>$mess_day</td>
                          
                          <td>
      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#example$tea_code'>
       详细介绍</button>
                    <div class='modal fade' id='example$tea_code' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='exampleModalLabel'>$mess_name</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    品类：$mess_variety
                                    </div>
                                    <div class='col-md-6'>
                                    生产日期：$mess_date
                                    </div>
                                    </div>
                                     <div class='row'>
                                    <div class='col-md-6'>
                                    等级：$mess_grade
                                    </div>
                                
                                    <div class='col-md-6'>
                                    生产地：$mess_area
                                    </div>
                                    </div>
                                </div>
                                <div class='modal-body'>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    净含量：$mess_quality
                                    </div>
                                    <div class='col-md-6'>
                                    单价：$mess_price
                                    </div>
                                    </div>
                                    <div class='row'>
                                    <div class='col-md-6'>
                                    商品编号：$tea_code
                                    </div>
                                    <div class='col-md-6'>
                                    剩余量：$mess_surplus
                                    </div>
                                </div>
                                
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
</td>
<form action='' method='post'>
                <td>
                <input type='checkbox'
                    name='checkbox[]' value='$cart_code'>
</td>

                        </tr>";
        }

        //避免 结算按钮遮盖数据

    }

    echo "</tbody>
</table>";
    echo '<div style="height: 200px">';
    echo '</div>';
    echo '<div class="row">';
    echo '<div class="col-md-6">';
    echo '<input type="submit" name="Cal" class="btn btn-warning"  style="width: 480px;"value="结算" id="cal">';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<input type="submit" name="Del" class="btn btn-danger"  style="width: 480px;"value="清除" id="del">';
    echo '</div>';
    echo '</div>';
    echo '</form>';

    if (isset($_POST['checkbox'])){
        $value = $_POST['checkbox'];

        date_default_timezone_set('PRC');
        $day = date('Y').''.date('m').''.date('d').'';

        //多选购买处理
    if (!empty($_POST['Cal']) || !empty($_POST['Del'])){
    foreach ($value as $onevalue) {
//        header("location:#");//及时刷新
            $sql1 = "select * from cart where code = '$onevalue'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows > 0){
                while ($row1 = $result1->fetch_assoc()) {
                    $product_id = $row1['product_id'];
                    $num = $row1['num'];
                    $con_money = $row1['con_money'];

                    if (!empty($_POST["Cal"])){ //结算购物车
                        $sql3 = "delete from cart where code = '$onevalue'";
                        $conn->query($sql3);
                        $sql2 = "insert into indent(product_id,con_money,mfgd) 
                            value ('$product_id',$con_money,$day)";
                        $conn->query($sql2);
                    }
                    if (!empty($_POST["Del"])){ //清除购物车
                        echo 'hello';
                        $sql4 = "delete from cart where code = '$onevalue'";
                        $conn->query($sql4);
                        $sql5 = "update commercialtea set surplus = surplus + '$num'
                                where code = '$product_id'";

                        $conn->query($sql5);
                    }
                    header("location:#");
                }
            }
        }
    }

    }


    ?>
</div>
<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>