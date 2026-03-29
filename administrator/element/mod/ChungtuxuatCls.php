<?php
// xu ly duong dan den datbase.php
$s = '../../element/mod/Database.php';
if (file_exists($s)){
    $f = $s;
}else{
    $f= './element/mod/Database.php';
}
require_once $f;

class chungtuxuat extends Database {
    public function ChungtuxuatGetAll(){
    $sql='select * from chungtuxuat';

    $getAll =$this->connect->prepare($sql);        
    $getAll->setFetchMode(PDO::FETCH_OBJ);
    $getAll->execute();
    
    return $getAll->fetchAll();
    }
    public function ChungtuxuatAdd($tenchungtuxuat, $ngayxuat, $ghichu){
        $sql ="INSERT INTO chungtuxuat(tenchungtuxuat, ngayxuat, ghichu) VAlUES (?,?,?)";
        $data = array($tenchungtuxuat, $ngayxuat, $ghichu);
        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
    public function ChungtuxuatDetele($idchungtuxuat){
        $sql ="DELETE from chungtuxuat where idchungtuxuat=?";
        $data = array($idchungtuxuat);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function ChungtuxuatUpdate($tenchungtuxuat, $ngayxuat, $ghichu, $idchungtuxuat){
        $sql ="UPDATE chungtuxuat set tenchungtuxuat=?, ngayxuat=?, ghichu=? WHERE idchungtuxuat=?";
        $data = array($tenchungtuxuat, $ngayxuat, $ghichu, $idchungtuxuat);

        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function ChungtuxuatGetbyId($idchungtuxuat){
        $sql ='select * from chungtuxuat where idchungtuxuat=?';
        $data = array($idchungtuxuat);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function ChungtuxuatSearch($keyword) {
        $sql = "SELECT * FROM chungtuxuat WHERE tenchungtuxuat LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }

}
?>