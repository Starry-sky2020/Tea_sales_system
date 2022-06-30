<?php
session_start();
//$_SESSION["admin"] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../BootStrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/admin_1_UI.css">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark" >
    <!-- Navbar content -->

    <ul class="nav nav-pills nav-fill" style="width: 100%">
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_5_UI.html">主页</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" style="background-color: #efa60a"href="admin_1_UI.php">添加</a>
        </li>
        <li class="nav-item" aria-current="page">
            <a class="nav-link " style="color: white" href="admin_2_UI.php">货架</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_3_UI.php">删除记录</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white" href="admin_4_UI.php">下架商品</a>
        </li>

    </ul>
</nav>
<div class="container" style="z-index: 1">
    <div class="row">
<!--        <div class="col-md-8">-->
                    <form action="" method="post">
                        <div style="height: 80px"></div>

                        <table class="table table-dark table-hover" style="width: 700px;margin: 50px 120px">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" style="text-align: center">添加/修改商品信息</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">商品编号：<input type="text" class="form-control" placeholder="商品编号" name="code"></th>
                                <th> 茶叶类别：<input type="text" class="form-control" placeholder="茶叶类别" name="variety"></th>
                            </tr>
                            <tr>
                                <th scope="row">
                                    茶叶名称：<input type="text" class="form-control" placeholder="茶叶名称" name="name">
                                </th>
                                <th>
                                    茶叶等级：<input type="text" class="form-control" placeholder="茶叶等级" name="grade">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">
                                    生长地区：<input type="text" class="form-control" placeholder="生长地区" name="area">
                                </th>
                                <th colspan="2">
                                    净含量（g）：<input type="text" class="form-control" placeholder="净含量" name="quality">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">
                                    单价（元）：<input type="text" class="form-control" placeholder="单价" name="price">
                                </th>
                                <th colspan="2">
                                    生产日期：<input type="text" class="form-control" placeholder="生产日期" name="mfgd">
                                </th>
                            </tr>
                            <tr>
                                <th scope="row">
                                    进货量：<input type="text" class="form-control" placeholder="进货量" name="surplus">
                                </th>
                                <th colspan="2">
                                    商品图片：<input type="text" class="form-control" placeholder="商品图片" name="imag">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2" style="text-align: center">
                                    <input type="submit" name="submit" style="background-color: #b3b3b3;width: 52rem">
                                </th>
                            </tr>
                            </tbody>
                        </table>

                    </form>
    </div>
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post">
                <div></div>
                <div class="card border-primary mb-3" style="width: 33rem; height: auto; margin: auto">
                    <div class="card-header">
                        <h3 style="text-align: center">添加管理员账号</h3>
                        <p style="text-align: center">仅供最高权限管理员使用</p>
                    </div>
                    <div class="card-body text-primary" >
                        <!--                                    <h5 class="card-title">Primary card title</h5>-->
                        <table class="table" >
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" style="text-align: center">请输入信息</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="text-align: center;vertical-align:middle;height: 5rem">
                                    管理员姓名：<input type="text" name="name" placeholder="管理员姓名" style="width: 12rem;">
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;vertical-align:middle;height: 5rem">
                                    id（密码）：<input type="text" name="id" placeholder="管理员id（密码）" aria-label="Last name"  style="width: 12rem;">
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;vertical-align:middle;height: 5rem">
                                    <input type="submit" name="submit_mess" style="background-color: #b3b3b3;width: 30rem">
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        <p class="card-text" style="text-align: center">
                            添加管理员帮助管理此系统
                        </p>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-6">

            <div></div>
            <div class="card border-primary mb-3" style="width: 33rem; height: auto; margin: auto">
                <form action="" method="post">
                <div class="card-header">
                    <h3 style="text-align: center">删除管理员账号</h3>
                    <p style="text-align: center">仅供最高权限管理员使用 &nbsp&nbsp&nbsp<input type="submit" name="update" value="刷新" style="color:#022cff;"></p>
                </div>
                </form>
                <div class="card-body text-primary">
                    <!--                                    <h5 class="card-title">Primary card title</h5>-->
                    <table class="table">
                        <thead>

                        <tr>
                            <th scope="col" colspan="2" style="text-align: center">请输入信息</th>

                        </tr>


                        <form action="" method="post">
                        </thead>
                        <tbody>
                        <tr>
                            <th style="text-align: center;vertical-align:middle;height: 5rem">
                                <p>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                        查看管理员
                                    </button>
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card card-body">
                                                <?php
//                                                session_start();
//                                                echo $_SESSION['admin'];
                                                if ($_SESSION["admin"] == 1){

                                                    $servername = "localhost:3336";
                                                    $username = "root";
                                                    $password = "20222022";
                                                    $dname = "coursedesign";
                                                    $conn = new mysqli($servername, $username, $password,$dname);

                                                    $sql = "select * from admin";
                                                    $admin_re = $conn->query($sql);
                                                    if ($admin_re->num_rows > 0){
                                                        echo "<div class='row'>
                                                            <div class='col-md-4'>id</div>
                                                            <div class='col-md-4'>姓名</div>
                                                            <div class='col-md-4'>权限</div>
                                                            </div>";
                                                        while ($admin_ele = $admin_re->fetch_assoc()){
                                                            $id = $admin_ele["id"];
                                                            $name = $admin_ele["name"];
                                                            $permission = $admin_ele["permission"];
                                                            echo "<div class='row'>
                                                            <div class='col-md-4'>$id</div>
                                                            <div class='col-md-4'>$name</div>
                                                            <div class='col-md-4'>$permission</div>
                                                            </div>";
                                                        }
                                                    }else{
                                                        echo "<p><strong>抱歉，您无此权限</strong></p>";
                                                    }

                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: center;vertical-align:middle;height: 5rem">
                                id（密码）：<input type="text" name="id2" placeholder="管理员id（密码）" aria-label="Last name"  style="width: 12rem;">
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: center;vertical-align:middle;height: 5rem">
                                <input type="submit" name="del_mess" style="background-color: #b3b3b3;width: 30rem">
                            </th>
                        </tr>
                        </tbody>
                    </table>
                    <p class="card-text" style="text-align: center">
                        删除管理员
                    </p>
                </div>
            </div>
            </div>
        </form>
    </div>

</div>
</div>

<?php
error_reporting(0);
if (isset($_POST["code"])) {

    $code = $_POST["code"];
    $variety = $_POST["variety"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];
    $area = $_POST["area"];
    $mfgd = $_POST["mfgd"];
    $quality = $_POST["quality"];
    $price = $_POST["price"];
    $surplus = $_POST["surplus"];
    $imag = $_POST["imag"];
}
$servername = "localhost:3336";
$username = "root";
$password = "20222022";
$dname = "coursedesign";
$conn = new mysqli($servername, $username, $password,$dname);

$sql = "select * from commercialtea where code = '$code'";
$result = $conn->query($sql);
if (!empty($_POST["submit"])) {
    if ($result->num_rows == 0) {
        $sql_in = "insert into commercialtea value('$code','$variety','$name','$grade',
                    '$area','$mfgd',$quality,$price,$surplus,'$imag')";
        if($conn->query($sql_in)){
            echo '<div class="alert alert-success position-fixed bottom-0 end-0" >
            添加成功！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            </div>
  ';
        }else{
            echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    添加失败！
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
 ';
        }

    } else {
        while ($row = $result->fetch_assoc()) {
            $sql_up = "update commercialtea set surplus = surplus + '$surplus' where code = '$code'";
            if($conn->query($sql_up)){
                echo '<div class="alert alert-success bottom-0 end-0" role="alert" >
            更新成功！
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            </div>
   ';
            }else{
                echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    更新失败！
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
   ';
            }
        }
    }
}

if (!empty($_POST["submit_mess"])){
    if ($_SESSION["admin"] == 1){
        $name = $_POST["name"];
        $id = $_POST["id"];
        $sql = "insert into admin(id,name) value ('$id','$name')";
//        $result = $conn->query($sql);
        if ($conn->query($sql)){
            echo '<div class="alert alert-success position-fixed bottom-0 end-0" role="alert" >
            添加成功
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
     ';
        }else{
            echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    添加失败！
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
        }
    }else{
        echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    抱歉，您尚无此权限！
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
    }

}

if (!empty($_POST["del_mess"])){
    if ($_SESSION["admin"] == 1){
        $name = $_POST["name2"];
        $id = $_POST["id2"];
        $sql = "delete from admin where id = '$id'";
//        $result = $conn->query($sql);
        if ($conn->query($sql)){

            echo '<div class="alert alert-success position-fixed bottom-0 end-0" role="alert" style="z-index:999">
            删除成功
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
';
        }else{
            echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    删除失败！
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';

        }
}else{
        echo '<div class="alert alert-danger position-fixed bottom-0 end-0" role="alert">
    抱歉，您尚无此权限！
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
    }


}

if (!empty($_POST["update"])){
    echo '<script> location.replace("admin_1_UI.php"); </script>';
}
?>

<script src="../BootStrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>