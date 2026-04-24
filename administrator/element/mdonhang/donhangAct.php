<?php
session_start();
require '../../element/mod/DonhangCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'deletedonhang':
        $iddonhang = $_GET['iddonhang'];
        $donhangObj = new donhang();
        $kq = $donhangObj->DonhangDelete($iddonhang);
            if($kq){
                header('location:../../index.php?req=donhangView&result=ok');
            }else{
                header('location:../../index.php?req=donhangView&result=notok');
            }
            break;
            case 'addnew':
                $hoten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
                $donhangObj = new donhang();
                $kq= $donhangObj->DonhangAdd($hoten, $diachi, $sdt, $email ,$phuongthucthanhtoan);
                if ($kq) {
                    header('location:../../index.php?req=donhangView&result=ok');
                } else{
                    header('location:../../index.php?req=donhangView&result=notok');
                }
                break;
        case 'updatedonhang':
        $iddonhang = $_POST['iddonhang'];
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email =$_POST['email'];
        $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
        $trangthai= $_POST['trangthai'];
        $donhangObj = new donhang();
        $kq= $donhangObj->DonhangUpdate($hoten,$diachi,$sdt,$email,$phuongthucthanhtoan,$trangthai,$iddonhang);
            if($kq){
                header('location:../../index.php?req=donhangView&result=ok');
            }else{
                header('location:../../index.php?req=donhangView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=donhangView');
            break;
    }
}else{
    header('location:../../index.php?req=donhangView');
} 

    ?>