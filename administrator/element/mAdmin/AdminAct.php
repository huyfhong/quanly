<?php
session_start();
require '../../element/mod/AdminCls.php';
require '../../element/mod/UserCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            // xu ly them
            $adminname = $_POST['adminname'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $adminObj = new admin();
            $kq= $adminObj->AdminAdd($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai);
            if($kq) {
                header('location:../../index.php?req=AdminView&result=ok');

            }else {
                header('location:../../index.php?req=AdminView&result=notok');
            }
            break;
        case 'deleteadmin':
            $idadmin = $_GET['idadmin'];
            $adminObj = new admin();
            $kq = $adminObj->AdminDelete($idadmin);
            if($kq){
                header('location:../../index.php?req=AdminView&result=ok');
            }else{
                header('location:../../index.php?req=AdminView&result=notok');
            }
            break;
        case 'setlock':
            $idadmin = $_GET['idadmin'];
            $setlock = $_GET['setlock'];
            $adminObj = new admin();
            if($setlock == 0){
                $kq = $adminObj->AdminSetActive($idadmin,1);
            }else{
                $kq = $adminObj->AdminSetActive($idadmin,0);
            }
            if($kq){
                header('location:../../index.php?req=AdminView&result=ok');
            }else{
                header('location:../../index.php?req=AdminView&result=notok');
            }
            break;
        case 'updateadmin':
            $idadmin = $_POST['idadmin'];
            $adminname = $_POST['adminname'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $adminObj = new admin();
            $kq= $adminObj->AdminUpdate($adminname,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$idadmin);
            if($kq){
                header('location:../../index.php?req=AdminView&result=ok');
            }else{
                header('location:../../index.php?req=AdminView&result=notok');
            }
            break;
        case 'checklogin':
            $adminname = $_POST['adminname'];
            $password = $_POST['password'];
            
            // Thử đăng nhập quyền Admin
            $adminObj = new admin();
            $kqAdmin = $adminObj->AdminCheckLogin($adminname, $password);
            
            if($kqAdmin){
                // Thiết lập session Admin và xóa session User (nếu muốn tách biệt hoàn toàn tại thời điểm đó)
                // Tuy nhiên theo yêu cầu "vẫn đăng nhập được user vào", ta chỉ cần set session Admin
                $_SESSION['ADMIN'] = $adminname;
                header('location:../../index.php'); // Về dashboard admin
                exit();
            } else {
                // Thử đăng nhập quyền User
                $userObj = new user();
                $kqUser = $userObj->UserCheckLogin($adminname, $password);
                if($kqUser){
                    $_SESSION['USER'] = $adminname;
                    header('location:../../../index.php'); // Về trang chủ website
                    exit();
                } else {
                    header('location:../../AdminLogin.php?error=1');
                    exit();
                }
            }    
            break;
        case 'adminlogout':
            $timelogin = date('h:i - d/m/y');
            if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
                setcookie($namelogin, $timelogin, time() + (86400 * 30), '/');
                unset($_SESSION['ADMIN']); // Chỉ xóa session của Admin
            }
            if (isset($_SESSION['giohang'])) {
                unset($_SESSION['giohang']); // Xóa giỏ hàng khi đăng xuất
            }
            header('location:../../AdminLogin.php');
            exit();
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/y');
            if (isset($_SESSION['USER'])) {
                $namelogin = $_SESSION['USER'];
                setcookie($namelogin, $timelogin, time() + (86400 * 30), '/');
                unset($_SESSION['USER']); // Chỉ xóa session của User
            }
            if (isset($_SESSION['giohang'])) {
                unset($_SESSION['giohang']); // Xóa giỏ hàng khi đăng xuất
            }
            header('location:../../../index.php'); // Quay lại trang chủ website
            exit();
            break;
        default :
            header('location:../../index.php?req=AdminView');
            break;
    }

    }else{
        header('location:../../index.php?req=AdminView');
    } 
?>