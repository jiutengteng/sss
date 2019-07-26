<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 9:28
 */
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');
    $id = $_GET['id'];
    $sql = "select * from news where id=$id";
    $res = $db->query($sql);
    $info = $res->fetch(2);
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改页面</title>
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="./bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="sav_do.php" method="post">
    <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">新闻标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="firstname"
                   value="<?php echo $info['title']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">新闻类型</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="type" id="lastname"
                   value="<?php echo $info['type']; ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改数据</button>
        </div>
    </div>
</form>

</body>
</html>
