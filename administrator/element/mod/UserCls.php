<?php
// xu ly duong dan den datbase.php
$s = '../../element/mod/Database.php';
if (file_exists($s)){
    $f = $s;
}else{
    $f= './element/mod/Database.php';
}
require_once $f;

// cac lop trong user
class user extends Database{
    public function UserCheckLogin($username,$password){
        $sql ='select * from user where username = ? and password = ? and setlock=1';
        $data = array($username,$password);

        $select =$this->connect->prepare($sql);        
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);
        
        $get_obj = count($select->fetchAll());
        
        if($get_obj == 1){
            return true;
        }else{
            return false;
        }
    }
    public function CheckUsername($username){
        $sql ='select * from user where username = ?';
        $data = array($username);

        $select =$this->connect->prepare($sql);        
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);
        
        $get_obj = count($select->fetchAll());
        
        if($get_obj == 1){
            return true;
        }else{
            return false;
        }
    }

    public function UserGetAll(){
        $sql ='select * from user ';
        
        $getAll =$this->connect->prepare($sql);        
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
            return $getAll->fetchAll();
    }
    
    public function UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email){
        $sql ="INSERT INTO user (username, password, hoten , gioitinh , ngaysinh ,diachi, dienthoai, email) VAlUES (?,?,?,?,?,?,?,?)";
        $data = array($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email);

        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
                                       
    
    public function UserDelete($iduser){
        $sql ="DELETE from user where iduser=?";
        $data = array($iduser);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function UserUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email,$iduser){
        $sql ="UPDATE user set username= ?,password=?,hoten=?,gioitinh=?,ngaysinh=?,diachi=?,dienthoai=?,email=? WHERE iduser=?";
        $data = array($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email,$iduser);

        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function UserGetbyId($iduser){
        $sql ='select * from user where iduser=?';
        $data = array($iduser);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function UserSetPassword($iduser,$password){
        $sql ="UPDATE user set password=? WHERE iduser=?";
        $data = array($password,$iduser);

        $update_pass =$this->connect->prepare($sql);        
        $update_pass->execute($data);
        
        return $update_pass->rowCount();

    }
    public function UserSetActive($iduser,$setlock){
        $sql ="UPDATE user set setlock=? WHERE iduser=?";
        $data = array($setlock, $iduser);

        $update_lock =$this->connect->prepare($sql);        
        $update_lock->execute($data);
        
        return $update_lock->rowCount();
    }
    public function UserChangePassword($iduser,$passwordold,$passwordnew){
        $sql ='select * from user where iduser= ? and password = ?';
        $data = array($iduser,$passwordold);

        $select =$this->connect->prepare($sql);        
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);
        
        $get_obj = count($select->fetchAll());
        
        if($get_obj == 1){
            $sql ="UPDATE user set password=? WHERE iduser=?";
            $data = array($passwordnew,$iduser);

            $update_pass =$this->connect->prepare($sql);        
            $update_pass->execute($data);
        
            return $update_pass->rowCount();
            
        }else{
            return false;
        }
    }
    public function UserSearch($keyword){
        $sql = "SELECT * FROM user WHERE username LIKE ? OR hoten LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }
}
    
?>