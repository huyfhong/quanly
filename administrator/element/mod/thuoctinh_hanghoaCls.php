<?php
// xu ly duong dan den database.php
$f = __DIR__ . '/Database.php';
if (file_exists($f)) {
    require_once $f;
} else {
    require_once '../../element/mod/Database.php';
}

class thuoctinh_hanghoa extends Database
{
    public function Thuoctinh_hanghoaGetAll()
    {
        $sql = 'select * from thuoctinh_hanghoa';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function Thuoctinh_hanghoaAdd($giatri, $ghichu, $idhanghoa, $idthuoctinh)
    {   
        $sql = "INSERT INTO thuoctinh_hanghoa (giatri, ghichu, idhanghoa, idthuoctinh) VALUES (?,?,?,?)";
        $data = array($giatri, $ghichu, $idhanghoa, $idthuoctinh);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function Thuoctinh_hanghoaDelete($idthuoctinh_hanghoa)
    {
        $sql = "DELETE from thuoctinh_hanghoa where idthuoctinh_hanghoa = ?";
        $data = array($idthuoctinh_hanghoa);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function Thuoctinh_hanghoaUpdate($giatri, $ghichu, $idhanghoa, $idthuoctinh, $idthuoctinh_hanghoa)
    {
        $sql = "UPDATE thuoctinh_hanghoa set giatri=?, ghichu=?, idhanghoa=?, idthuoctinh=? WHERE idthuoctinh_hanghoa =?";
        $data = array($giatri, $ghichu, $idhanghoa, $idthuoctinh, $idthuoctinh_hanghoa);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function Thuoctinh_hanghoaGetbyId($idthuoctinh_hanghoa)
    {
        $sql = 'select * from thuoctinh_hanghoa WHERE idthuoctinh_hanghoa=?';
        $data = array($idthuoctinh_hanghoa);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function Thuoctinh_hanghoaGetbyIdhanghoa($idhanghoa)
    {
        $sql = 'select * from thuoctinh_hanghoa where idhanghoa=?';
        $data = array($idhanghoa);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
    public function Thuoctinh_hanghoaGetbyIdthuoctinh($idthuoctinh)
    {
        $sql = 'select * from thuoctinh_hanghoa where idthuoctinh=?';
        $data = array($idthuoctinh);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
    public function Thuoctinh_hanghoaSearch($keyword){
        $sql = "SELECT * FROM thuoctinh_hanghoa WHERE giatri LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }
}
