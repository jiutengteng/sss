<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 8:51
 */
$title = $_POST['title'];
$type = $_POST['type'];
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');
    $title = $db->quote($title);
    $type = $db->quote($type);
    $addtime = date('Y-m-d h:i:s',time());

    $sql = "insert into news value(null,$title,$type,'$addtime')";

    $res = $db->exec($sql);

    if($res){
        echo "<script>alert('添加成功');location.href='show.php'</script>";
        die;
    }else{
        echo "<script>alert('添加失败');location.href='add.php'</script>";
        die;
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}