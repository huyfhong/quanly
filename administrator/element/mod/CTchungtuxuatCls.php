<?php
$s = '../../element/mod/Database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './element/mod/Database.php';
   // if (!file_exists($f)) {
        //$f = './administrator/element_nguyenhuyphong/mod/Database.php';
    }
//}
require_once $f;
class ctchungtuxuat extends Database
{
    public function CTchungtuxuatGetAll()
    {
        $sql = 'select * from ctchungtuxuat';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function CTchungtuxuatAdd($tenhangxuat, $soluong, $ghichu, $idchungtuxuat)
    {   
        $sql = "INSERT INTO ctchungtuxuat (tenhangxuat, soluong, ghichu, idchungtuxuat) VALUES (?,?,?,?)";
        $data = array($tenhangxuat, $soluong, $ghichu, $idchungtuxuat);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function CTchungtuxuatDelete($idCTchungtuxuat)
    {
        $sql = "DELETE from ctchungtuxuat where idCTchungtuxuat = ?";
        $data = array($idCTchungtuxuat);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function CTchungtuxuatUpdate($tenhangxuat, $soluong, $ghichu, $idchungtuxuat, $idCTchungtuxuat)
    {
        $sql = "UPDATE ctchungtuxuat set tenhangxuat=?, soluong=?, ghichu=?, idchungtuxuat=? WHERE idCTchungtuxuat =?";
        $data = array($tenhangxuat, $soluong, $ghichu, $idchungtuxuat, $idCTchungtuxuat);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function CTchungtuxuatGetbyId($idCTchungtuxuat)
    {
        $sql = 'select * from ctchungtuxuat WHERE idCTchungtuxuat=?';
        $data = array($idCTchungtuxuat);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function CTchungtuxuatGetbyIdchungtuxuat($idchungtuxuat)
    {
        $sql = 'select * from ctchungtuxuat where idchungtuxuat=?';
        $data = array($idchungtuxuat);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }

    public function CTchungtuxuatSearch($keyword) {
        $sql = "SELECT * FROM ctchungtuxuat WHERE tenhangxuat LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }
}
