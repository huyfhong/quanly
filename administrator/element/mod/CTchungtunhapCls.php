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
class ctchungtunhap extends Database
{
    public function CTchungtunhapGetAll()
    {
        $sql = 'select * from ctchungtunhap';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function CTchungtunhapAdd($tenhangnhap, $soluong, $ghichu, $idchungtunhap)
    {   
        $sql = "INSERT INTO ctchungtunhap (tenhangnhap, soluong, ghichu, idchungtunhap) VALUES (?,?,?,?)";
        $data = array($tenhangnhap, $soluong, $ghichu, $idchungtunhap);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function CTchungtunhapDelete($idCTchungtunhap)
    {
        $sql = "DELETE from ctchungtunhap where idCTchungtunhap = ?";
        $data = array($idCTchungtunhap);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function CTchungtunhapUpdate($tenhangnhap, $soluong, $ghichu, $idchungtunhap, $idCTchungtunhap)
    {
        $sql = "UPDATE ctchungtunhap set tenhangnhap=?, soluong=?, ghichu=?, idchungtunhap=? WHERE idCTchungtunhap =?";
        $data = array($tenhangnhap, $soluong, $ghichu, $idchungtunhap, $idCTchungtunhap);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function CTchungtunhapGetbyId($idCTchungtunhap)
    {
        $sql = 'select * from ctchungtunhap WHERE idCTchungtunhap=?';
        $data = array($idCTchungtunhap);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function CTchungtunhapGetbyIdchungtunhap($idchungtunhap)
    {
        $sql = 'select * from ctchungtunhap where idchungtunhap=?';
        $data = array($idchungtunhap);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }

    public function CTchungtunhapSearch($keyword) {
        $sql = "SELECT * FROM ctchungtunhap WHERE tenhangnhap LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }
}
