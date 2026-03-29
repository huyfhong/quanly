<?php
require '../../element/mod/CTchungtunhapCls.php';
    if(isset($_GET['reqact'])){
        $requestAcion = $_GET['reqact'];
        switch($requestAcion){
           case 'addnew':
                $tenhangnhap = $_POST['tenhangnhap'];
                $soluong = $_POST['soluong'];
                $ghichu = $_POST['ghichu'];
                $idchungtunhap = $_POST['idchungtunhap'];
                $CTnhap = new ctchungtunhap();
                $kq= $CTnhap->CTchungtunhapAdd($tenhangnhap, $soluong, $ghichu, $idchungtunhap);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtunhapView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtunhapView&result=notok');
                }
                break;
            case 'deletectchungtunhap':
                $idCTchungtunhap = $_GET['idCTchungtunhap'];
                $CTnhap = new ctchungtunhap();
                $kq = $CTnhap->CTchungtunhapDelete($idCTchungtunhap);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtunhapView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtunhapView&result=notok');
                }
                break;
            case 'updatectchungtunhap':
                $idCTchungtunhap = $_POST['idCTchungtunhap'];
                $tenhangnhap = $_POST['tenhangnhap'];
                $soluong = $_POST['soluong'];
                $ghichu = $_POST['ghichu'];
                $idchungtunhap = $_POST['idchungtunhap'];
                
                $CTnhap = new ctchungtunhap();
                $kq = $CTnhap->CTchungtunhapUpdate($tenhangnhap, $soluong, $ghichu, $idchungtunhap, $idCTchungtunhap);
                if ($kq) {
                    header('location:../../index.php?req=CTchungtunhapView&result=ok');
                } else{
                    header('location:../../index.php?req=CTchungtunhapView&result=notok');
                }
                break;
                

            }
        }