<?php
session_start();
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/15
 * Time: 9:25
 */
try{
    $name = $_POST['username'];
    $checkName = '/^\d|[a-z|A-Z][5,20]$/';
    if($name == '' || !preg_match($checkName,$name)){
        echo "用户名no";
        die;
    }

    $pwd = $_POST['userpwd'];
    $checkPwd = '/^\d|\w[6,20]$/';
    if($pwd == '' || !preg_match($checkPwd,$pwd)){
        echo "密码no";
        die;
    }

    $dbh = new PDO('mysql:host=127.0.0.1;dbname=test1','root','root');
    $name=$dbh->quote($name);
    $pwd=$dbh->quote($pwd);
    $sql = "select * from test12 where username=$name AND userpwd=$pwd";
    $stmt = $dbh->query($sql);
    $res = $stmt->fetch(2);
    if($res){
        $_SESSION['user']=$res;
        echo "登录成功";
    }else{
        echo "登录失败";
    }
}catch(PDOException $e){
    echo $e->getMessage();
    die;
}