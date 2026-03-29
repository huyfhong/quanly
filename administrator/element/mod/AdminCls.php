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
class admin extends Database{
    public function AdminCheckLogin($adminname,$password){
        $sql ='select * from admin where adminname = ? and password = ? and setlock=1 ';
        $data = array($adminname,$password);

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
    public function CheckAdminname($adminname){
        $sql ='select * from admin where adminname = ?';
        $data = array($adminname);

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

    public function AdminGetAll(){
        $sql ='select * from admin ';
        
        $getAll =$this->connect->prepare($sql);        
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
            return $getAll->fetchAll();
    }
    
    public function AdminAdd($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai){
        $sql ="INSERT INTO admin (adminname, password, hoten , gioitinh , ngaysinh ,diachi, dienthoai) VAlUES (?,?,?,?,?,?,?)";
        $data = array($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);

        $add =$this->connect->prepare($sql);        
        $add->execute($data);
        
        return $add->rowCount();
    }
                                       
    
    public function AdminDelete($idadmin){
        $sql ="DELETE from admin where idadmin=?";
        $data = array($idadmin);

        $del =$this->connect->prepare($sql);        
        $del->execute($data);
        
        return $del->rowCount();
    
    }
    public function AdminUpdate($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$idadmin){
        $sql ="UPDATE admin set adminname= ?,password=?,hoten=?,gioitinh=?,ngaysinh=?,diachi=?,dienthoai=? WHERE idadmin=?";
        $data = array($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$idadmin);

        $update =$this->connect->prepare($sql);        
        $update->execute($data);
        
        return $update->rowCount();
    }
    public function AdminGetbyId($idadmin){
        $sql ='select * from admin where idadmin=?';
        $data = array($idadmin);

        $getOne =$this->connect->prepare($sql); 
        $getOne->setFetchMode(PDO::FETCH_OBJ);      
        $getOne->execute($data);
        
        return $getOne->fetch();
    }
    public function AdminSetPassword($idadmin,$password){
        $sql ="UPDATE admin set password=? WHERE idadmin=?";
        $data = array($password,$idadmin);

        $update_pass =$this->connect->prepare($sql);        
        $update_pass->execute($data);
        
        return $update_pass->rowCount();

    }
    public function AdminSetActive($idadmin,$setlock){
        $sql ="UPDATE admin set setlock=? WHERE idadmin=?";
        $data = array($setlock, $idadmin);

        $update_lock =$this->connect->prepare($sql);        
        $update_lock->execute($data);
        
        return $update_lock->rowCount();
    }
    public function AdminSearch($keyword){
        $sql = "SELECT * FROM admin WHERE adminname LIKE ? OR hoten LIKE ?";
        $data = array("%$keyword%", "%$keyword%");

        $search = $this->connect->prepare($sql);
        $search->setFetchMode(PDO::FETCH_OBJ);
        $search->execute($data);

        return $search->fetchAll();
    }
    public function AdminChangePassword($idadmin,$passwordold,$passwordnew){
        $sql ='select * from admin where idadmin= ? and password = ?';
        $data = array($idadmin,$passwordold);

        $select =$this->connect->prepare($sql);        
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute($data);
        
        $get_obj = count($select->fetchAll());
        
        if($get_obj == 1){
            $sql ="UPDATE admin set password=? WHERE idadmin=?";
            $data = array($passwordnew,$idadmin);

            $update_pass =$this->connect->prepare($sql);        
            $update_pass->execute($data);
        
            return $update_pass->rowCount();
            
        }else{
            return false;
        }
    }
}
    
?>