<?php

/**
 * Class pdo增删改查
 */
class pdoNew
{
    protected $dbh;
    //构造方法
    public function __construct($dbname)
    {
       $this->dbh = new PDO("mysql:host=127.0.0.1;dbname=$dbname",'root','root');
    }
    //增加方法
    public function insert($table,$data){
        $key = '';
        $val= '';
        foreach($data as $k => $v){
            $key .= ','.$k;
            $val .= ','."'".$v."'";
        }
        $key = substr($key,1);
        $val = substr($val,1);
        $sql = "insert into $table($key) value ($val)";
        $res = $this->dbh->exec($sql);
        if($res){
            echo 'ok';
        }else{
            echo "no";
        }
    }
    //删除方法
    public function delete($table,$where){
        $sql = "delete from $table where $where";
        $res = $this->dbh->exec($sql);
        if($res){
            echo 'ok';
        }else{
            echo "no";
        }
    }
    //修改方法
    public function update($table,$data,$where){
        $val = '';
        foreach($data as $k => $v){
            $val .= ',`'.$k.'`='."'".$v."'";
        }
        $val = substr($val,1);
        $sql = "update $table set $val where $where";
//        echo $sql;die;
        $res = $this->dbh->exec($sql);
        if($res){
            echo 'ok';
        }else{
            echo "no";
        }
    }
    //查询方法
    public function select($table){
        $sql = "select * from $table";
        $stmt = $this->dbh->query($sql);
        $data = $stmt->fetchAll(2);
        return $data;
    }
}
//测试数据
//$obj = new pdoNew('big_two');
//print_r($obj->insert('buy_car',array('name'=>'这是嵊州似的hiad卡打开的哈利电话费','img'=>'dhaisdhiadhasid','price'=>316,'num'=>10)));
//print_r($obj->delete('buy_car','id=1'));
//print_r($obj->update('buy_car',array('name'=>'这是利电话费','img'=>'dhaisdhiadhasid','price'=>300,'num'=>100),'id=2'));
//print_r($obj->select('buy_car'));