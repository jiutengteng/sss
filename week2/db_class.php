<?php
/**
 * Created by PhpStorm.
 * User: 酒腾腾
 * Date: 2019/7/15
 * Time: 8:48
 */
class Db
{
    protected $name;
    protected $user;
    protected $pwd;
    protected $dbh;
    public function __construct($name,$user,$pwd)
    {
        $this->name = $name;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->dbh = new PDO("mysql:host=127.0.0.1;dbname=$this->name",$this->user,$this->pwd);
    }

    /**
     * @param $table
     * @param $data
     * @return array添加数据
     */
    public function insert($table,$data){
        $key = '';
        $val = '';
        foreach($data as $k => $v){
            $key .= $k.",";
            $v = $this->dbh->quote($v);
            $val .= $v.",";
        }
        $key = substr($key,0,-1);
        $val = substr($val,0,-1);

        $sql = "insert into $table ($key) value ($val)";
        $res = $this->dbh->exec($sql);
        if($res){
            $arr=array('code'=>0,'meg'=>'添加成功');
        }else{
            $arr=array('code'=>1,'meg'=>'添加失败');
        }
        return $arr;
    }

    /*
     * 删除数据
     */
    public function delete($table,$where){
        if($where == ''){
            $arr = array('code'=>1,'meg'=>'条件不能为空！');
            return $arr;
        }
        $sql = "delete from $table where $where";
        $res = $this->dbh->exec($sql);
        if($res){
            $arr=array('code'=>0,'meg'=>'删除成功');
        }else{
            $arr=array('code'=>1,'meg'=>'删除失败');
        }
        return $arr;
    }
    /**
     * 修改方法
     */
    public function update($table,$data,$where){
        if($where == ''){
            $arr = array('code'=>1,'meg'=>'条件不能为空！');
            return $arr;
        }
        $key = '';
        $val = '';
        $new = '';
        foreach($data as $k => $v){
            $v = $this->dbh->quote($v);
            $new .= $k."=".$v.",";
        }
        $new = substr($new,0,-1);
        $sql = "update $table set $new where $where ";

        $res = $this->dbh->exec($sql);

        if($res){
            $arr=array('code'=>0,'meg'=>'修改成功');
        }else{
            $arr=array('code'=>1,'meg'=>'修改失败');
        }
        return $arr;
    }

    /**
     * 查询一条数据
     */
    public function find($table,$where){
        $sql = "select * from $table where $where";
        $res = $this->dbh->query($sql);
        $data = $res->fetch(2);
        return $data;
    }
    /**
     * 得到多条数据
     */
    public function select($table){
        $sql = "select * from $table";
        $res = $this->dbh->query($sql);
        $data = $res->fetchAll(2);
        return $data;
    }
}
$obj = new Db('test1','root','root');
//调用添加方法
//$res = $obj->insert('news',array('title'=>'世界大战','content'=>'6666'));

//调用删除方法
//$res = $obj->delete('news','id=1');

//调用修改方法
//$res = $obj->update('news',array('title'=>'外国大战','content'=>'9999'),'id=3');

//调用得到一条数据的方法
//$res = $obj->find('news','id=3');

//调用得到多条数据的方法
//$res = $obj->select('news');
//print_r($res);
