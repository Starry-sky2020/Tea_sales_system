<?php
session_start();
$_SESSION["cnt"] = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/user_login.css">
</head>
<body>
<div class="container">
    <div class="card" style="width: 25rem;">
        <img src="../Imag/two.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">茶叶销售</h5>
            <p class="card-text">野泉烟火白云间，坐饮香茶爱此山。</p>
            <p class="card-text">岩下维舟不忍去，青溪流水暮潺潺。</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">用户登录</li>
            <form action="" method="post">
            <li class="list-group-item">
                <div class="form-floating">
                    <input type="text" class="form-control" name="tel" placeholder="请输入手机号" id="floatingtel">
                    <label for="floatingtel">手机号码</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-floating">

                    <input type="password" class="form-control" name="psw" placeholder="请输入密码" id="floatingPassword">
                    <label for="floatingPassword">密码</label>

                </div>
            </li>
        </ul>
        <div class="card-body">
            <input type="submit" name="submit">
            <a href="user_submit.php" target="_blank" style="text-decoration: none">
                <button type="button" style="color: blue">用户注册</button>
            </a>
            <a href="admin_login.php" target="_blank" style="text-decoration: none">
                <button type="button" style="color: blue">管理员登录</button>
            </a>
        </div>
        </form>


<?php
    $servername = "localhost:3336";
    $username = "root";
    $password = "20222022";
    $dname = "coursedesign";

    $conn = new mysqli($servername, $username, $password, $dname);

    if (isset($_POST["tel"])){
        $tel = $_POST["tel"];
    }
    if (isset($_POST["psw"])){
        $psw = $_POST["psw"];
    }


    $sql = "select * from User";
    $result = $conn->query($sql);

    $check = 1;
    $sign = 0;
    if (!empty($_POST["submit"])){

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sign = 1;

                if ($tel == $row["id"] && $psw == $row["psw"]){
                    $_SESSION["user_id"] = $row["id"];
                    $check = 0;
                    echo '<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>';
                    echo '</div>';//卡片终结
                   //传递给个人信息页
                    echo '<div class="alert alert-info position-fixed bottom-0 end-0" role="alert">
  <strong>登录成功，即将进入页面</strong> 
    <br>
    Please return to the login page to log in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

//                    sleep(3);
//                    header('location:UI_1.php');//php跳转页面
                    header("Refresh:3;url=Main.html");
                }
            }
        }
        if ($check == 1 && $sign == 1)
            echo '<div class="alert alert-info position-fixed bottom-0 end-0" role="alert">
  <strong>账号密码错误</strong> 
    <br>
    Please go to the register page to log in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

?>
</div>
    <script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>