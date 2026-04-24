<?php
// xu ly duong dan den database.php
$f = __DIR__ . '/Database.php';
if (file_exists($f)) {
    require_once $f;
} else {
    require_once '../../element/mod/Database.php';
}

class loaihang extends Database{

    public function LoaihangGetAll(){
        $sql="select * from loaihang";

        $getAll =$this->connect->prepare($sql);        
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
    }
    public function LoaihangAdd($tenloaihang, $ghichu, $hinhanh){
        $sql ="INSERT INTO loaihang(tenloaihang, ghichu, hinhanh) VAlUES (?,?,?)";
        $data = array($tenloaihang, $ghichu, $hinhanh);

        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
    public function LoaihangDelete($idloaihang){
        $sql ="DELETE from loaihang where idloaihang=?";
        $data = array($idloaihang);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function LoaihangUpdate($tenloaihang, $ghichu, $hinhanh, $idloaihang){
        $sql ="UPDATE loaihang SET tenloaihang= ?, ghichu=?, hinhanh=? WHERE idloaihang=?";
        $data = array($tenloaihang, $ghichu, $hinhanh, $idloaihang);

        $update =$this->connect->prepare($sql);  
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function LoaihangGetbyId($idloaihang){
        $sql ="select * from loaihang where idloaihang=?";
        $data = array($idloaihang);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function LoaihangSearch($keyword){
        $sql = "SELECT * FROM loaihang WHERE tenloaihang LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }
    public function Loaihangview(){
        $sql = "SELECT * FROM view_loaihang_hanghoa";
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}
?>
