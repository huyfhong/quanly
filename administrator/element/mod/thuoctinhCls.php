 <?php
// xu ly duong dan den datbase.php
$s = '../../element/mod/Database.php';
if (file_exists($s)){
    $f = $s;
}else{
    $f= './element/mod/Database.php';
}
if (!file_exists($f)) {
    $f = './administrator/element/mod/Database.php';
    }
require_once $f;

class thuoctinh extends Database {
    public function thuoctinhGetAll(){
    $sql='select * from thuoctinh';

    $getAll =$this->connect->prepare($sql);        
    $getAll->setFetchMode(PDO::FETCH_OBJ);
    $getAll->execute();
    
    return $getAll->fetchAll();
    }
    public function thuoctinhAdd($tenthuoctinh, $ghichu){
        $sql ="INSERT INTO thuoctinh(tenthuoctinh, ghichu) VAlUES (?,?)";
        $data = array($tenthuoctinh,$ghichu);
        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
    public function thuoctinhDetele($idthuoctinh){
        $sql ="DELETE from thuoctinh where idthuoctinh=?";
        $data = array($idthuoctinh);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function thuoctinhUpdate($tenthuoctinh, $ghichu, $idthuoctinh){
        $sql ="UPDATE thuoctinh set tenthuoctinh=?, ghichu=? WHERE idthuoctinh=?";
        $data = array($tenthuoctinh, $ghichu, $idthuoctinh);

        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function thuoctinhGetbyId($idthuoctinh){
        $sql ='select * from thuoctinh where idthuoctinh=?';
        $data = array($idthuoctinh);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function ThuoctinhSearch($keyword){
        $sql = "SELECT * FROM thuoctinh WHERE tenthuoctinh LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }

}
?>