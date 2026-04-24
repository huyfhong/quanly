<?php
// xu ly duong dan den database.php
$f = __DIR__ . '/Database.php';
if (file_exists($f)) {
    require_once $f;
} else {
    require_once '../../element/mod/Database.php';
}

class hanghoa extends Database
{
    public function HanghoaGetAll()
    {
        $sql = 'select * from hanghoa';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function HanghoaAdd($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang)
    {   
        $sql = "INSERT INTO hanghoa (tenhanghoa, mota, ghichu, hinhanh, idloaihang) VALUES (?,?,?,?,?)";
        $data = array($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang);
        $add = $this->connect->prepare($sql);
        $add->execute($data);
        return $add->rowCount();
    }
    public function HanghoaDelete($idhanghoa)
    {
        $sql = "DELETE from hanghoa where idhanghoa = ?";
        $data = array($idhanghoa);

        $del = $this->connect->prepare($sql);
        $del->execute($data);
        return $del->rowCount();
    }
    public function HanghoaUpdate($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang, $idhanghoa)
    {
        $sql = "UPDATE hanghoa set tenhanghoa=?, mota=?, ghichu=?, hinhanh=?, idloaihang=? WHERE idhanghoa =?";
        $data = array($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang, $idhanghoa);

        $update = $this->connect->prepare($sql);
        $update->execute($data);
        return $update->rowCount();
    }
    public function HanghoaGetbyId($idhanghoa)
    {
        $sql = 'select * from hanghoa where idhanghoa=?';
        $data = array($idhanghoa);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetch();
    }

    public function HanghoaGetbyIdloaihang($idloaihang)
    {
        $sql = 'select * from hanghoa where idloaihang=?';
        $data = array($idloaihang);


        $getOne = $this->connect->prepare($sql);
        $getOne->setFetchMode(PDO::FETCH_OBJ);
        $getOne->execute($data);

        return $getOne->fetchAll();
    }
    public function HanghoaSearch($keyword) {
        $sql = "SELECT * FROM hanghoa WHERE tenhanghoa LIKE ? OR mota LIKE ? OR ghichu LIKE ?";
        $data = array("%$keyword%", "%$keyword%", "%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }
    public function HanghoaView(){
        $sql = 'SELECT * FROM view_hanghoa_loaihang;';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }

}

