<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/15
 * Time: 9:44
 */
include ('Db_class.php');
$obj = new Db('test1','root','root');
//调用得到多条数据的方法
$res = $obj->select('news');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>标题</td>
        <td>内容</td>
        <td>操作</td>
    </tr>
    <?php foreach($res as $k => $v){
        echo "<tr><td>$v[title]</td><td>$v[content]</td><td><a href='del.php?id=$v[id]'>删除</a></td></tr>";
    } ?>
</table>
</body>
</html>
