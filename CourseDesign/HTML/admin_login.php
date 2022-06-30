<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin_login.css">
    <script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <form action="" method="post">
    <div class="card" style="width: 25rem;">
        <img src="../Imag/two.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><strong>茶叶销售管理系统</strong></h5>
            <p class="card-text">一舟海角到天涯，春信江南梅欲花。</p>
            <p class="card-text">莫道别时无酒语，与君剪烛夜烹茶。</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">管理员登录</li>
            <li class="list-group-item">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="请输入管理员姓名" name="admin_name">
                    <label for="floatingInput">管理员姓名</label>
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="请输入管理员id" name="admin_id">
                    <label for="floatingPassword">密码</label>
                </div>
            </li>
            <!--            <li class="list-group-item">A third item</li>-->
        </ul>
        <div class="card-body">
            <input type="submit" name="submit">
            <a href="user_submit.php" target="_blank" style="text-decoration: none">
                <button type="button" style="color: blue">用户注册</button>
            </a>
            <a href="user_login.php" target="_blank" style="text-decoration: none">
                <button type="button" style="color: blue">用户登录</button>
            </a>
        </div>
    </div>
    </form>
</div>
<?php
    $servername = "localhost:3336";
    $username = "root";
    $password = "20222022";
    $dname = "coursedesign";
    $conn = new mysqli($servername, $username, $password,$dname);
    $admin_name = $_POST["admin_name"];
    $admin_id = $_POST["admin_id"];
    $sql = "select * from admin";
    $result = $conn->query($sql);
    $check_1 = 0; $check_2 = 0;
    if (!empty($_POST["submit"])){
        if ($result->num_rows>0){
            while ($row = $result->fetch_assoc()){
                $check_1 = 1;
                $id = $row["id"];$name = $row["name"];

                if ($admin_id === $id && $admin_name === $name){
                    if ($row["permission"] == 1){
                        $_SESSION["admin"] = 1;
                    } elseif($row["permission"] == 0)  $_SESSION["admin"] = 0;
                    $check_2 = 1;
                    echo '<div class="alert alert-info position-fixed bottom-0 end-0" role="alert">
  <strong>登录成功，即将进入页面</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                    header("Refresh:3;url=admin_5_UI.html");
                }
            }
        }
    }

    if ($check_1 == 1 && $check_2 == 0){
        echo '<div class="alert alert-info position-fixed bottom-0 end-0" role="alert">
  <strong>登录失败，请核实身份</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
?>
<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>

</body>
</html>