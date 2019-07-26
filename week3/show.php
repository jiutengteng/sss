<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/22
 * Time: 9:25
 * 引用文件
 * 实例化对象，调用这个查询所有数据的方法进行展示页面的书写
 */
include 'pdoClass.php';
$obj = new pdoNew('big_two');
$data = $obj->select('buy_car');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车展示</title>
    <style>
        ul li{
            list-style: none;
        }
    </style>
</head>
<body>
<center>
    <ul>
        <?php foreach($data as $k => $v){
            echo "<li><p><img src='$v[img]' width='30px' height='30px'></p>$v[name]<span style='color: red'>￥$v[price].00</span>数量：$v[num]</li>";
        } ?>
    </ul>
</center>
</body>
</html>
