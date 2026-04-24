<?php
require '../../element/mod/CTchungtuxuatCls.php';
    if(isset($_GET['reqact'])){
        $requestAcion = $_GET['reqact'];
        switch($requestAcion){
           case 'addnew':
                $tenhangxuat = $_POST['tenhangxuat'];
                $soluong = $_POST['soluong'];
                $ghichu = $_POST['ghichu'];
                $idchungtuxuat = $_POST['idchungtuxuat'];
                $CTxuat = new ctchungtuxuat();
                $kq= $CTxuat->CTchungtuxuatAdd($tenhangxuat, $soluong, $ghichu, $idchungtuxuat);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtuxuatView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtuxuatView&result=notok');
                }
                break;
            case 'deletectchungtuxuat':
                $idCTchungtuxuat = $_GET['idCTchungtuxuat'];
                $CTxuat = new ctchungtuxuat();
                $kq = $CTxuat->CTchungtuxuatDelete($idCTchungtuxuat);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtuxuatView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtuxuatView&result=notok');
                }
                break;
            case 'updatectchungtuxuat':
                $idCTchungtuxuat = $_POST['idCTchungtuxuat'];
                $tenhangxuat = $_POST['tenhangxuat'];
                $soluong = $_POST['soluong'];
                $ghichu = $_POST['ghichu'];
                $idchungtuxuat = $_POST['idchungtuxuat'];
                $CTxuat = new ctchungtuxuat();
                $kq = $CTxuat->CTchungtuxuatUpdate($tenhangxuat, $soluong, $ghichu, $idchungtuxuat, $idCTchungtuxuat);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtuxuatView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtuxuatView&result=notok');
                }
                break;
            default:
                header('location:../../index.php?req=CTchungtuxuatView');
                break;
            }
        } else {
            header('location:../../index.php?req=CTchungtuxuatView');
        }