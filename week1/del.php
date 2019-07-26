<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 9:25
 */
$id = $_GET['id'];
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');

    $sql = "delete from news where id=$id";

    $res = $db->exec($sql);

    if($res){
        echo "<script>alert('删除成功');location.href='show.php'</script>";
        die;
    }else{
        echo "<script>alert('删除失败');location.href='show.php'</script>";
        die;
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}