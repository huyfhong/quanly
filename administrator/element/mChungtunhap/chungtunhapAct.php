<?php
require_once '../../element/mod/ChungtunhapCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenchungtunhap = $_POST['tenchungtunhap'];
            $ngaynhap = $_POST['ngaynhap'];
            $ghichu = $_POST['ghichu'];
            $nhap = new chungtunhap();
            $kq= $nhap->ChungtunhapAdd($tenchungtunhap, $ngaynhap, $ghichu);
            if($kq) {
                header('location:../../index.php?req=chungtunhapView&result=ok');

            }else {
                header('location:../../index.php?req=chungtunhapView&result=notok');
            }
            break;
        case 'deletechungtunhap':
            $idchungtunhap = $_GET['idchungtunhap'];
            $nhap = new chungtunhap();
            $kq = $nhap->ChungtunhapDetele($idchungtunhap);
            if($kq){
                header('location:../../index.php?req=chungtunhapView&result=ok');
            }else {
                header('location:../../index.php?req=chungtunhapView&result=notok');
            }
            break;
        case 'updatechungtunhap':
            $idchungtunhap = $_POST['idchungtunhap'];
            $tenchungtunhap = $_POST['tenchungtunhap'];
            $ngaynhap = $_POST['ngaynhap'];
            $ghichu = $_POST['ghichu'];
            $nhap = new chungtunhap();
            $kq = $nhap->ChungtunhapUpdate($tenchungtunhap, $ngaynhap, $ghichu, $idchungtunhap);
            if($kq){
                header('location:../../index.php?req=chungtunhapView&result=ok');
            }else {
                header('location:../../index.php?req=chungtunhapView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=chungtunhapView');
            break;
    }
} else {
    header('location:../../index.php?req=chungtunhapView');
}
    

       
