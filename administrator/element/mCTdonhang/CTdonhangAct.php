<?php
session_start();
require '../../element/mod/CTdonhangCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'deleteCTdonhang':
        $idctdonhang = $_GET['idctdonhang'];
        $CTdonhangObj = new CTdonhang();
        $kq = $CTdonhangObj->CTdonhangDelete($idctdonhang);
            if($kq){
                header('location:../../index.php?req=CTdonhangView&result=ok');
            }else{
                header('location:../../index.php?req=CTdonhangView&result=notok');
            }
            break;
        case 'updateCTdonhang':
        $idctdonhang = $_POST['idctdonhang'];
        $soluong = $_POST['soluong'];
        $CTdonhangObj = new CTdonhang();
        $kq= $CTdonhangObj->CTdonhangUpdate($soluong,$idctdonhang);
            if($kq){
                header('location:../../index.php?req=CTdonhangView&result=ok');
            }else{
                header('location:../../index.php?req=CTdonhangView&result=notok');
            }
            break;
    }
}else{
    header('location:../../index.php?req=CTdonhangView');
} 

    ?>