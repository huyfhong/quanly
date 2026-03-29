<?php
require '../../element/mod/thuoctinh_hanghoaCls.php';
    if(isset($_GET['reqact'])){
        $requestAcion = $_GET['reqact'];
        switch($requestAcion){
           case 'addnew':
                $giatri = $_POST['giatri'];
                $ghichu = $_POST['ghichu'];
                $idhanghoa = $_POST['idhanghoa'];
                $idthuoctinh = $_POST['idthuoctinh'];
                $tt_hh = new thuoctinh_hanghoa();
                $kq= $tt_hh->Thuoctinh_hanghoaAdd($giatri, $ghichu, $idhanghoa, $idthuoctinh);
                if ($kq) {
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=notok');
                }
                break;
            case 'deletethuoctinh_hanghoa':
                $idthuoctinh_hanghoa = $_GET['idthuoctinh_hanghoa'];
                $tt_hh = new thuoctinh_hanghoa();
                $kq = $tt_hh->Thuoctinh_hanghoaDelete($idthuoctinh_hanghoa);
                if ($kq) {
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=notok');
                }
                break;
            case 'updatethuoctinh_hanghoa':
                $idthuoctinh_hanghoa = $_POST['idthuoctinh_hanghoa'];
                $giatri = $_POST['giatri'];
                $ghichu = $_POST['ghichu'];
                $idhanghoa = $_POST['idhanghoa'];
                $idthuoctinh = $_POST['idthuoctinh'];
                $tt_hh = new thuoctinh_hanghoa();
                $kq = $tt_hh->Thuoctinh_hanghoaUpdate($giatri, $ghichu, $idhanghoa, $idthuoctinh, $idthuoctinh_hanghoa);
                if ($kq) {
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=thuoctinh_hanghoaView&result=notok');
                }
                break;
                

            }
        }