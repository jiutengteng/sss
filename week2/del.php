<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/15
 * Time: 9:47
 */
include ('Db_class.php');
$id=$_GET['id'];

$obj = new Db('test1','root','root');
//调用删除方法
$res = $obj->delete('news',"id=$id");
print_r($res);