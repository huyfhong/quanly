<?php
require '../../element/mod/GiaCls.php';
    if(isset($_GET['reqact'])){
        $requestAcion = $_GET['reqact'];
        switch($requestAcion){
           case 'addnew':
                $dongia = $_POST['dongia'];
                $ghichu = $_POST['ghichu'];
                $idhanghoa = $_POST['idhanghoa'];
                $g = new gia();
                $kq= $g->GiaAdd($dongia, $ghichu, $idhanghoa);
                if ($kq) {
                    header('location:../../index.php?req=giaView&result=ok');
                } else{
                    header('location:../../index.php?req=giaView&result=notok');
                }
                break;
            case 'deletegia':
                $iddongia = $_GET['iddongia'];
                $g = new gia();
                $kq = $g->GiaDelete($iddongia);
                if ($kq) {
                    header('location:../../index.php?req=giaView&result=ok');
                } else{
                    header('location:../../index.php?req=giaView&result=notok');
                }
                break;
            case 'updategia':
                $iddongia = $_POST['iddongia'];
                $dongia = $_POST['dongia'];
                $ghichu = $_POST['ghichu'];
                $idhanghoa = $_POST['idhanghoa'];
             
                $g = new gia();
                $kq = $g->GiaUpdate($dongia, $ghichu, $idhanghoa, $iddongia);
                if ($kq) {
                    header('location:../../index.php?req=giaView&result=ok');
                } else{
                    header('location:../../index.php?req=giaView&result=notok');
                }
                break;
                

            }
        }