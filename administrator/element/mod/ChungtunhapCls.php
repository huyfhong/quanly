<?php
require_once __DIR__ . '/Database.php';

class chungtunhap extends Database {
    public function ChungtunhapGetAll(){
    $sql='select * from chungtunhap';

    $getAll =$this->connect->prepare($sql);        
    $getAll->setFetchMode(PDO::FETCH_OBJ);
    $getAll->execute();
    
    return $getAll->fetchAll();
    }
    public function ChungtunhapAdd($tenchungtunhap, $ngaynhap, $ghichu){
        $sql ="INSERT INTO chungtunhap(tenchungtunhap, ngaynhap, ghichu) VAlUES (?,?,?)";
        $data = array($tenchungtunhap, $ngaynhap, $ghichu);
        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
    public function ChungtunhapDetele($idchungtunhap){
        $sql ="DELETE from chungtunhap where idchungtunhap=?";
        $data = array($idchungtunhap);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function ChungtunhapUpdate($tenchungtunhap, $ngaynhap, $ghichu, $idchungtunhap){
        $sql ="UPDATE chungtunhap set tenchungtunhap=?, ngaynhap=?, ghichu=? WHERE idchungtunhap=?";
        $data = array($tenchungtunhap, $ngaynhap, $ghichu, $idchungtunhap);

        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function ChungtunhapGetbyId($idchungtunhap){
        $sql ='select * from chungtunhap where idchungtunhap=?';
        $data = array($idchungtunhap);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function ChungtunhapSearch($keyword){
        $sql = "SELECT * FROM chungtunhap WHERE tenchungtunhap LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }

}
?>