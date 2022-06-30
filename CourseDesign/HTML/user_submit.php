<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/user_submit.css">
</head>
<body>
<div class="container">
    <div class="card" style="width: 30rem;">
        <img src="../Imag/two.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">茶叶销售</h5>
            <p class="card-text">坐酌泠泠水，看煎瑟瑟尘。
                无由持一碗，寄与爱茶人。
            </p>


        <form action="" method="post">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">用户注册</li>
            <li class="list-group-item">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" name="nname" placeholder="请输入一个昵称">
                    <label for="floatingInput">昵称</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-floating">
                    <input type="text" class="form-control" name="tel" placeholder="请输入手机号">
                    <label for="floatingPassword">手机号码</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-floating">

                    <input type="password" class="form-control" name="psw" placeholder="请输入密码">
                    <label for="floatingPassword">密码</label>

                    </div>
            </li>
        </ul>
            <div class="card-body">
            <input type="submit"  id="liveToastBtn" name="submit" value="注册">

                <a href="admin_login.php" target="_blank" style="text-decoration: none">
                    <button type="button" style="color: blue">管理员登录</button>
                </a>
                <a href="user_login.php" target="_blank" style="text-decoration: none">
                    <button type="button" style="color: blue">用户登录</button>
                </a>
            </div>
        </form>
    </div>

    </div>

<?php
$servername = "localhost:3336";
$username = "root";
$password = "20222022";
    $dname = "coursedesign";

    $conn = new mysqli($servername, $username, $password, $dname);
    if (isset($_POST["nname"])){
        $nname = $_POST["nname"];
    }else error_reporting(0);
    if (isset($_POST["tel"])){
        $tel = $_POST["tel"];
    }
    $psw = $_POST["psw"];

    $sql = "select * from User";
    $result = $conn->query($sql);

    $check = 0;
    if (!empty($_POST["submit"])){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($nname === $row['nname'])
                    $check = 1;
                if ($tel == $row["id"])
                    $check = 2;
            }
        }
        if ($check == 0){
            $sql_in = "insert into user(id,nname,psw) 
        value ('$tel','$nname','$psw')";
            $conn->query($sql_in);
            echo $nname;
            echo $tel;
            echo '<div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0"  >
    <strong>注册成功，请返回登陆页登录</strong> 
    <br>
    Please return to the login page to log in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }elseif ($check == 1){
            echo '<div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0"  >
    <strong>用户名已存在</strong>
    <br>
    The user name already exists
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        } elseif ($check == 2){
            echo '<div class="alert alert-warning alert-dismissible fade show position-fixed bottom-0 end-0"  >
    <strong>该手机号已经注册，请返回登录</strong>
    <br>
    The user name already exists
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
    }
?>
<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>