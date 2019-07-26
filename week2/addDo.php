<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/15
 * Time: 9:40
 */
include ('Db_class.php');
$title = $_POST['title'];
$content = $_POST['content'];
$arr['title'] = $title;
$arr['content'] = $content;
$obj = new Db('test1','root','root');
//调用添加方法
$res = $obj->insert('news',$arr);
print_r($res);