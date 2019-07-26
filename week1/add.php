<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 9:00
 */
try{
    if(!isset($_SESSION['uid'])){
        echo "<script>alert('请先登录');location.href='login.html'</script>";
        die;
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="./bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="add_do.php" method="post">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">新闻标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="firstname"
                   placeholder="请输入标题">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">新闻类型</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="type" id="lastname"
                   placeholder="请输入新闻类型">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加数据</button>
        </div>
    </div>
</form>

</body>
</html>