<?php
// xu ly duong dan den database.php
$f = __DIR__ . '/Database.php';
if (file_exists($f)) {
    require_once $f;
} else {
    require_once '../../element/mod/Database.php';
}

class gia extends Database
{
    public function GiaGetAll()
    {
        $sql = 'select * from gia';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function GiaAdd($dongia, $ghichu, $idhanghoa)
    {   
        $sql = "INSERT INTO gia (dongia, ghichu, idhanghoa) VALUES (?,?,?)";
        $data = array($dongia, $ghichu, $idhanghoa,);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function GiaDelete($iddongia)
    {
        $sql = "DELETE from gia where iddongia = ?";
        $data = array($iddongia);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function GiaUpdate($dongia, $ghichu, $idhanghoa, $iddongia)
    {
        $sql = "UPDATE gia set dongia=?, ghichu=?, idhanghoa=? WHERE iddongia =?";
        $data = array($dongia, $ghichu, $idhanghoa, $iddongia);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function GiaGetbyId($iddongia)
    {
        $sql = 'select * from gia WHERE iddongia =?';
        $data = array($iddongia);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function GiaGetbyIdhanghoa($idhanghoa)
    {
        $sql = 'select * from gia where idhanghoa=?';
        $data = array($idhanghoa);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
    public function GiaSearch($keyword){
        $sql = "SELECT * FROM gia WHERE dongia LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }
}
