<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/UI_3.css">
    <script src="../BootStrap5/jquery-3.6.0.min.js"></script>
</head>

<body>
<div style="height: 56px"></div>
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
            <a class="nav-link active" href="UI_3.php">历史订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_4.php">预订订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="UI_5.php">个人信息</a>
        </li>
    </ul>
</nav>

<div class="container" >
<!--    <h1>Hello,Sale</h1>-->
    <?php
    ob_start();
        $servername = "localhost:3336";
        $username = "root";
        $password = "20222022";
        $dname = "coursedesign";

        $conn = new mysqli($servername, $username, $password,$dname);
        $user_code = $_SESSION["user_id"];

        $sql = "select * from indent where user_code = '$user_code'";
        $result = $conn->query($sql);
echo "<table class='table'>
  <thead>
    <tr>
    <h4>
    <th scope='col'>订单编号</th>
      <th scope='col'>商品编号</th>
      <th scope='col'>总额</th>
      <th scope='col'>名称</th>
      <th scope='col'>产地</th> 
      <th scope='col'>订单日期</th> 
      <th scope='col'>详细介绍</th>
       <th scope='col'>删除记录</th>
</h4>
      
    </tr>
  </thead> <tbody>";
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $code = $row["code"];
          $prduct_id = $row["product_id"];
          $con_money = $row["con_money"];
          $day = $row["mfgd"];

          $sql_2 = "select * from commercialtea where code = '$prduct_id'";
          $result_2 = $conn->query($sql_2);
    if ($result_2->num_rows > 0) {
        while ($row_2 = $result_2->fetch_assoc()) {
//            error_reporting(0);
            if (isset($row_2["code"])){
                $code_2 = $row_2["code"];
            }
            if(isset($row_2['name']))
                $name = $row_2['name'];
            if (isset($row_2["grade"]))
                $grade = $row_2['grade'];
            if (isset($row_2["mfgd"]))
                $date = $row_2["mfgd"];
            if (isset($row_2["variety"]))
                $variety = $row_2["variety"];
            if (isset($row_2["area"]))
                $area = $row_2['area'];
            if (isset($row_2["price"]))
                $price = $row_2['price'];
            if (isset($row_2["quality"]))
            $quality = $row_2['quality'];
            if (isset($row_2["surplus"]))
            $surplus = $row_2['surplus'];
//            $code_2 = $row_2["code"];

        }
    }

          echo "
  
    <tr>
      <th scope='row'>$code</th>
      <td>$prduct_id</td>
      <td>$con_money</td>
      <td>$name</td>
      <td>$area</td>
      <td>$day</td>
      <td>
      <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#example$code_2'>
       详细介绍</button>
                    <div class='modal fade' id='example$code_2' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
                                    商品编号：$code_2
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
                    </div>
                    
</td>
<td>
    <form action='' method='post'>
    <input type='submit' class='btn btn-danger' value='删除' name='del_submit$code'>
</form>
</td>
    </tr>";
          if (!empty($_POST["del_submit$code"])){
              $sql_del = "delete from indent where code = '$code'";
              $conn->query($sql_del);
              header("location:#");
          }
    }

    echo "</tbody>
</table>";
  }

    ?>
<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</div>


</body>
</html>