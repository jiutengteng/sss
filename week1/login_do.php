<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/9
 * Time: 8:51
 */
$uname = $_POST['uname'];
$upwd = $_POST['upwd'];
try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=big_two','root','root');
    $uname = $db->quote($uname);
    $upwd = $db->quote($upwd);
    $sql = "select * from users where uname=$uname and upwd=$upwd";
    $res = $db->query($sql);
    $info = $res->fetch(2);
    if($info){
        $_SESSION['uid']=$info['uid'];
        echo "<script>alert('登录成功');location.href='show.php'</script>";
        die;
    }else{
        echo "<script>alert('登录失败');location.href='login.html'</script>";
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}