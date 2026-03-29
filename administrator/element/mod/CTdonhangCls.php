<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');  
$s = '../../element/mod/Database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element/mod/Database.php';
}
if(!file_exists($f)) {
    $f='./administrator/element/mod/Database.php';
}
require_once(__DIR__ . '/Database.php');

class ctdonhang extends Database
{
    public function CTdonhangGetAll(){
        $sql='select * from ctdonhang';
        $getAll =$this->connect->prepare($sql);        
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
    }
    public function CTdonhangDelete($idctdonhang){
        $sql ="DELETE from ctdonhang where idctdonhang=?";
        $data = array($idctdonhang);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    }
    public function CTdonhangGetbyId($idctdonhang){
        $sql ='select * from ctdonhang where idctdonhang=?';
        $data = array($idctdonhang);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function CTdonhangUpdate($soluong,$idcthanghoa){
        $sql = "UPDATE ctdonhang set soluong=?  where idctdonhang=?";
        $data = array($soluong,$idcthanghoa);
        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        return $update->rowCount();
    }
    public function CTdonhangAdd($iddonhang,$idhanghoa,$tenhanghoa,$dongia,$soluong,$thanhtien){
        $sql = "INSERT INTO ctdonhang (iddonhang, idhanghoa,tenhanghoa, dongia, soluong, thanhtien) VALUES (?,?,?,?,?,?)";
        $data = array($iddonhang,$idhanghoa,$tenhanghoa,$dongia,$soluong,$thanhtien);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function CTdonhangGetByDonhang($iddonhang)
    {
        $sql = 'select * from ctdonhang where iddonhang=?';
        $data = array($iddonhang);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }

    public function CTdonhangSearch($keyword) {
        $sql = "SELECT * FROM ctdonhang WHERE tenhanghoa LIKE ?";
        $data = array("%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }
}
