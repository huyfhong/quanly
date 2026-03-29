<?php
session_start();
require '../../element/mod/UserCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            // xu ly them
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $userObj = new user();
            $kq= $userObj->UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);
            if($kq) {
                header('location:../../index.php?req=userView&result=ok');

            }else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=userView');
            break;
        case 'deleteuser':
            $iduser = $_GET['iduser'];
            $userObj = new user();
            $kq = $userObj->UserDelete($iduser);
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'setlock':
            $iduser = $_GET['iduser'];
            $setlock = $_GET['setlock'];
            $userObj = new user();
            if($setlock == 0){
                $kq = $userObj->UserSetActive($iduser,1);
            }else{
                $kq = $userObj->UserSetActive($iduser,0);
            }
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'updateuser':
            $iduser = $_POST['iduser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $userObj = new user();
            $kq= $userObj->UserUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$iduser);
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;
        case 'userchecklogin':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userObj = new user();
            if ($userObj->UserCheckLogin($username, $password)) {
                $_SESSION['USER'] = $username;
                header('Location: ../../index.php');
            } else {
                header('Location: ../../AdminLogin.php?error=1');
            }
            break;
        case 'userregister':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            
            $userObj = new user();
            if ($userObj->CheckUsername($username)) {
                header('location:../../AdminLogin.php?register_result=exists');
            } else {
                $kq = $userObj->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
                if ($kq) {
                    header('location:../../AdminLogin.php?register_result=ok');
                } else {
                    header('location:../../AdminLogin.php?register_result=notok');
                }
            }
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/y');
            if (isset($_SESSION['User'])) {
                $namelogin = $_SESSION['USER'];
            }
            if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
            }
            setcookie($namelogin,$timelogin,time()+(86400*30),'/');

            session_destroy();
            header('location:../../index.php');
            break;
        
    }

    }else{
        header('http://localhost/TNC/');
    } 
  

?>

    
