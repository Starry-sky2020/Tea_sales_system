<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../CSS/UI_5.css">
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
            <a class="nav-link" href="UI_4.php">预订订单</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="UI_5.php">个人信息</a>
        </li>
    </ul>
</nav>
<div style="height: 60px"></div>
  <div class="container"  >

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      请完善信息
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="row g-4" action="" method="post">
            <div class="col-md-12"></div>
            <div class="col-md-6 offset-3">
              <label for="inputEmail4" class="form-label">真实姓名</label>
              <input type="text" name="uname" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6 offset-3">
              <label for="inputPassword4" class="form-label">手机号码</label>
              <input type="text" name="tel" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-4 offset-1">
              <label for="inputState" class="form-label">性别</label>
              <select id="inputState" class="form-select" name="sex">
                <option>男</option>
                <option>女</option>
              </select>
            </div>
            <div class="col-md-4 offset-2">
              <label for="inputAddress" class="form-label">年龄</label>
              <input type="text" name="age" class="form-control" id="inputAddress">
            </div>

            <div class="col-md-12">
              <label for="inputCity" class="form-label">详细地址</label>
              <input type="text" name="address" class="form-control" id="inputCity">
            </div>

            <div class="col-12">
              <div class="offset-4">
                <input type="submit" name="submit" class="btn btn-primary" style="width: 10rem" value="保存">
              </div>
            </div>
          </form>
      </div>
    </div>

</div>
      <?php

          $servername = "localhost:3336";
          $username = "root";
          $password = "20222022";
          $dname = "coursedesign";

          $conn = new mysqli($servername, $username, $password,$dname);
          date_default_timezone_set("PRC");
          $day = date('Y').'-'.date('m').'-'.date('d');

          $re_id = $_SESSION["user_id"];
          $sql_sear = "select * from user";
          $result_sear = $conn->query($sql_sear);
          if ($result_sear->num_rows > 0){
              while ($row_sear = $result_sear->fetch_assoc()){
                  $nname = $row_sear["nname"];
                  $id = $row_sear["id"];
                  $uname = $row_sear["uname"];
                  $address = $row_sear["address"];
                  $sex = $row_sear["sex"];
                  $age = $row_sear["tel"];
                  $tel = $row_sear["tel"];
                  $record = $row_sear["record"];
                  $re_mess = $row_sear["re_mess"];
              }

          }


      echo '
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-inner" >
        <div class="carousel-item active"  data-bs-interval="3000">
            <div class="card text-center" style="background-color: rgb(255,255,255,0.3)"> 
                <div class="card-header" >
                    茶鉴
                </div>
                <div class="card-body text-center" >
                    <blockquote class="blockquote mb-0">
                        <p>何以相携古兰若，细看香篆味茶干。</p>
                        <footer class="blockquote-footer">宋·喻良能<cite title="Source Title">《游龙井》</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="card" style="background-color: rgb(255,255,255,0.3)">
                <div class="card-header text-center" >
                    茶鉴
                </div>
                <div class="card-body text-center">
                    <blockquote class="blockquote mb-0">
                        <p>不饮客来还贳酒，长闲饭罢必煎茶。</p>
                        <footer class="blockquote-footer">宋·潘牥<cite title="Source Title">《⼭居苦》</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="carousel-item"  data-bs-interval="3000">
            <div class="card" style="background-color: rgb(255,255,255,0.3)">
                <div class="card-header text-center">
                    茶鉴
                </div>
                <div class="card-body text-center" >
                    <blockquote class="blockquote mb-0">
                        <p>醉起西窗⽇欲斜，新烟初试⾬前茶。</p>
                        <footer class="blockquote-footer">宋·赵崇嶓<cite title="Source Title">《醉起》</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

';
          if($record == 1 && $re_id == $id && $re_mess == 1)
              {
                  echo "<div class='card text-center'  >
    <div class='card-header'>
        <h5 class='card-title'>个人信息</h5>
    </div>
    <div class='card-body'>
        <h5 class='card-title'>欢迎$nname 进入网页</h5>
        <p class='card-text'>昵称：$nname</p>
        <p class='card-text'>id：$id</p>
        <p class='card-text'>姓名：$uname</p>
        <p class='card-text'>年龄：$age</p>
        <p class='card-text'>性别：$sex</p>
         <p class='card-text'>收货地址：$address</p>
          <p class='card-text'>联系方式：$tel</p>
        
        <a href='UI_2.php' class='btn btn-primary'>去购物</a>
    </div>
    <div class='card-footer text-muted'>
        $day
    </div>
</div>";
              }else {

              if (isset($_POST["sex"])) {
                  $sex = $_POST["sex"];
                  $sql_sex = "update user set sex = '$sex' where id = '$re_id'";
                  $conn->query($sql_sex);
              }

              if (isset($_POST["age"])) {
                  $age = $_POST["age"];
                  $sql_age = "update user set age = '$age'  where id = '$re_id'";
                  $conn->query($sql_age);
              }
              if (isset($_POST["address"])) {
                  $address = $_POST["address"];
                  $sql_address = "update user set address = '$address' where id = '$re_id'";
                  $conn->query($sql_address);
              }
              if (isset($_POST["uname"])) {
                  $uname = $_POST["uname"];
                  $sql_uname = "update user set uname = '$uname' where id = '$re_id'";
                  $conn->query($sql_uname);
              }
              if (isset($_POST["tel"])) {
                  $tel = $_POST["tel"];
                  $sql_tel = "update user set tel = '$tel' where id = '$re_id'";
                  $conn->query($sql_tel);
              }


//              $_SESSION["mess"] = 1; //用户添加信息标示
//              $re_mess = 1;
              $sql_mess = "update user set re_mess = 1 where id = '$re_id'";
              $conn->query($sql_mess);
              $sql_record = "update user set record = 1 where id = '$re_id'";
              $conn->query($sql_record);

              $sql = "select * from user where id = '$re_id'";
              //搜索
              $result = $conn->query($sql);



              if ($_SESSION["cnt"] == 1) {
                  $sex = $_SESSION["sex"];
                  $age = $_SESSION["age"];
                  $address = $_SESSION["address"];
                  $uname = $_SESSION["uname"];
                  $nname = $_SESSION["nname"];
                  $tel = $_SESSION["tel"];
                  $id = $_SESSION["id"];
                  echo "<div class='card text-center'   style='background-color:rgb(255,255,255,0.3);'>
    <div class='card-header'>
        <h5 class='card-title'>个人信息</h5>
    </div>
    <div class='card-body'>
        <h5 class='card-title'>欢迎$nname 进入网页</h5>
        <p class='card-text'>昵称：$nname</p>
        <p class='card-text'>id：$id</p>
        <p class='card-text'>姓名：$uname</p>
        <p class='card-text'>年龄：$age</p>
        <p class='card-text'>性别：$sex</p>
         <p class='card-text'>收货地址：$address</p>
          <p class='card-text'>联系方式：$tel</p>
        
        <a href='UI_2.php' class='btn btn-primary'>去购物</a>
    </div>
    <div class='card-footer text-muted'>
        $day
    </div>
</div>";
              }
              if ($_SESSION["cnt"] == 0) {
                  if (!empty($_POST["submit"])) {
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              $sex = $_SESSION["sex"] = $row["sex"];
                              $age = $_SESSION["age"] = $row["age"];
                              $address = $_SESSION["address"] = $row["address"];
                              $uname = $_SESSION["uname"] = $row["uname"];
                              $nname = $_SESSION["nname"] = $row["nname"];
                              $tel = $_SESSION["tel"] = $row["tel"];
                              $id = $_SESSION["id"] = $row["id"];
                              echo "<div class='card text-center'>
    <div class='card-header'>
        <h5 class='card-title'>个人信息</h5>
    </div>
    <div class='card-body'>
        <h5 class='card-title'>欢迎$nname 进入网页</h5>
        <p class='card-text'>昵称：$nname</p>
        <p class='card-text'>id：$id</p>
        <p class='card-text'>姓名：$uname</p>
        <p class='card-text'>年龄：$age</p>
        <p class='card-text'>性别：$sex</p>
         <p class='card-text'>收货地址：$address</p>
          <p class='card-text'>联系方式：$tel</p>
        
        <a href='UI_2.php' class='btn btn-primary'>去购物</a>
    </div>
    <div class='card-footer text-muted'>
        $day
    </div>
</div>";
                              $_SESSION["cnt"]++;
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