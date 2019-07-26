<?php
session_start();
ob_start();
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 9:00
 */
try{
    if(!isset($_SESSION['uid'])){
        echo "<script>alert('请先登录')</script>";
        die;
    }else{
        $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');
        $sql = "select * from news";
        $res = $db->query($sql);
        $data = $res->fetchAll(2);
    }

}catch(PDOException $e){
    echo $e->getMessage();
    die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>展示页面</title>
</head>
<body>
<center>
    <table border="1" cellspacing="0">
        <tr style="background-color:#2aabd2; color: #f5f5f5">
            <td>ID</td>
            <td>新闻标题</td>
            <td>新闻类别</td>
            <td>发布时间</td>
            <td>操作</td>
            <td>操作</td>
        </tr>
        <?php foreach($data as $k => $v){
            echo "<tr><td>$v[id]</td><td>$v[title]</td><td>$v[type]</td><td>$v[addtime]</td><td><a href='sav.php?id=$v[id]'>编辑</a></td><td><a href='del.php?id=$v[id]'>删除</a></td></tr>";
        } ?>
    </table>
</center>
</body>
</html>
<?php
//设置过期时间
$timeOut = 5*60;

    if(file_exists('show.html')){
        if(time()-filectime('show.html') > $timeOut){
            unlink('show.html');
            file_put_contents('show.html',ob_get_contents());
            ob_flush();
            ob_clean();
        }
    }else{
        file_put_contents('show.html',ob_get_contents());
        ob_flush();
        ob_clean();
    }
?>
