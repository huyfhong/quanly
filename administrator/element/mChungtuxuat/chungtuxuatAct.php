<?php
require_once '../../element/mod/ChungtuxuatCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenchungtuxuat = $_POST['tenchungtuxuat'];
            $ngayxuat = $_POST['ngayxuat'];
            $ghichu = $_POST['ghichu'];
            $xuat = new chungtuxuat();
            $kq= $xuat->ChungtuxuatAdd($tenchungtuxuat, $ngayxuat, $ghichu);
            if($kq) {
                header('location:../../index.php?req=chungtuxuatView&result=ok');

            }else {
                header('location:../../index.php?req=chungtuxuatView&result=notok');
            }
            break;
        case 'deletechungtuxuat':
            $idchungtuxuat = $_GET['idchungtuxuat'];
            $xuat = new chungtuxuat();
            $kq = $xuat->ChungtuxuatDetele($idchungtuxuat);
            if($kq){
                header('location:../../index.php?req=chungtuxuatView&result=ok');
            }else {
                header('location:../../index.php?req=chungtuxuatView&result=notok');
            }
            break;
        case 'updatechungtuxuat':
            $idchungtuxuat = $_POST['idchungtuxuat'];
            $tenchungtuxuat = $_POST['tenchungtuxuat'];
            $ngayxuat = $_POST['ngayxuat'];
            $ghichu = $_POST['ghichu'];
            $xuat = new chungtuxuat();
            $kq = $xuat->ChungtuxuatUpdate($tenchungtuxuat, $ngayxuat, $ghichu, $idchungtuxuat);
            if($kq){
                header('location:../../index.php?req=chungtuxuatView&result=ok');
            }else {
                header('location:../../index.php?req=chungtuxuatView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=chungtuxuatView');
            break;
    }
} else {
    header('location:../../index.php?req=chungtuxuatView');
}
    

       
