<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 9:33
 */
$id = $_POST['id'];
$title = $_POST['title'];
$type = $_POST['type'];
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');
    $title = $db->quote($title);
    $type = $db->quote($type);
    $sql = "update news set title=$title,type=$type WHERE id=$id";

    $res = $db->exec($sql);

    if($res){
        echo "<script>alert('修改成功');location.href='show.php'</script>";
        die;
    }else{
        echo "<script>alert('修改失败');location.href='show.php'</script>";
        die;
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}