<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');  
require_once __DIR__ . '/Database.php';

class donhang extends Database
{
    public function DonhangGetAll(){
        $sql='select * from donhang';
        $getAll =$this->connect->prepare($sql);        
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
    }
    public function DonhangAdd($hoten, $diachi, $sdt, $email ,$phuongthucthanhtoan){
        $sql ="INSERT INTO donhang(hoten, diachi, sdt, email, ngaydat, phuongthucthanhtoan) VAlUES (?,?,?,?,now(),?)";
        $data = array($hoten, $diachi, $sdt, $email ,$phuongthucthanhtoan);

        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $this->connect->lastInsertId();
    }
    public function DonhangDelete($iddonhang){
        $sql ="DELETE from donhang where iddonhang=?";
        $data = array($iddonhang);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    }
    public function DonhangGetbyId($iddonhang){
        $sql ='select * from donhang where iddonhang=?';
        $data = array($iddonhang);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function DonhangUpdate($hoten,$diachi,$sdt,$email,$phuongthucthanhtoan,$trangthai,$iddonhang){
        $sql = "UPDATE donhang set hoten=?, diachi=?, sdt=?, email=?, phuongthucthanhtoan=?, trangthai=? where iddonhang=?";
        $data = array($hoten, $diachi, $sdt, $email, $phuongthucthanhtoan, $trangthai, $iddonhang);
        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        return $update->rowCount();
    }
    public function DonhangView(){
        $sql = 'SELECT * FROM view_donhang_soluong;';
        $getAll = $this->connect->prepare($sql);
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();

        return $getAll->fetchAll();
    }
    public function DonhangSearch($keyword) {
        $sql = "SELECT * FROM donhang WHERE hoten LIKE ? OR sdt LIKE ? OR email LIKE ? OR diachi LIKE ? OR phuongthucthanhtoan LIKE ?";
        $data = array("%$keyword%", "%$keyword%", "%$keyword%", "%$keyword%", "%$keyword%");
        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);
        return $search->fetchAll();
    }
}
