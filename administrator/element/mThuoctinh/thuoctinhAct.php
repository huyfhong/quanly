<?php
require_once '../../element/mod/thuoctinhCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenthuoctinh = $_POST['tenthuoctinh'];
            $ghichu = $_POST['ghichu'];
            $tt = new thuoctinh();
            $kq= $tt->thuoctinhAdd($tenthuoctinh, $ghichu);
            if($kq) {
                header('location:../../index.php?req=thuoctinhView&result=ok');

            }else {
                header('location:../../index.php?req=thuoctinhView&result=notok');
            }
            break;
        case 'deletethuoctinh':
            $idthuoctinh = $_GET['idthuoctinh'];
            $tt = new thuoctinh();
            $kq = $tt->thuoctinhDetele($idthuoctinh);
            if($kq){
                header('location:../../index.php?req=thuoctinhView&result=ok');
            }else {
                header('location:../../index.php?req=thuoctinhView&result=notok');
            }
            break;
        case 'updatethuoctinh':
            $idthuoctinh = $_POST['idthuoctinh'];
            $tenthuoctinh = $_POST['tenthuoctinh'];
            $ghichu = $_POST['ghichu'];
            $tt = new thuoctinh();
            $kq = $tt->thuoctinhUpdate($tenthuoctinh, $ghichu, $idthuoctinh);
            if($kq){
                header('location:../../index.php?req=thuoctinhView&result=ok');
            }else {
                header('location:../../index.php?req=thuoctinhView&result=notok');
            }
            break;
        default:
            header('location:../../index.php?req=thuoctinhView');
            break;
        }
    } else{
        header('location:../../index.php?req=thuoctinhView');
    }
    

       
