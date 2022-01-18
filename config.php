<?php
class Config{
    private $connect;
    private $host,$user,$password,$dbname;
    public function __construct()
    {
        $this->host="localhost";
        $this->user="root";
        $this->password="";
        $this->dbname="news_portal";
        $this->connect=new mysqli($this->host,$this->user,$this->password,$this->dbname);

    }
    public function insertData($table,$arr){
        $col=implode(",",array_keys($arr));
        $value=implode("','",array_values($arr));
        $sql="insert into $table($col) value('$value')";
        $query=$this->connect->query($sql);
        return $query;
    }
    public function orderData($table,$name,$limt){
        $array=[];
        $sql="SELECT * FROM $table ORDER BY $name DESC LIMIT $limt";
        $query=$this->connect->query($sql);
        while($row=$query->fetch_array()){
            $array[]=$row;
        }
        return $array;
    }
    public function callingData($table,$cond=null){
        $arr=[];
        if($cond==null){
            $sql="SELECT * FROM $table";
        }
        else{
            $sql="SELECT * FROM $table WHERE $cond";
        }
       
        $query=$this->connect->query($sql);
        while($row=$query->fetch_array()){
            $arr[]=$row;
        }
        return $arr;
    }
    public function refresh($page="index.php"){
      echo "<script>window.open('$page','_self')</script>";
    }
    public function deleteData($table,$cond){

        $del = "DELETE FROM $table WHERE $cond";
        $query=$this->connect->query($del);
        return $query;
    }

    public function singleCalling($table,$cond=null){
        $query=$this->connect->query("SELECT * FROM $table WHERE $cond");
        $row=$query->fetch_array();
        return $row;
    }
    public function update($table,$cond=null,$staus){
        $query=$this->connect->query("UPDATE $table SET $staus WHERE $cond");
        return $query;
    }
}

$datawork=new Config();
?>