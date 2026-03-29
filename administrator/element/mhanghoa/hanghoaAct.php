<?php
require '../../element/mod/hanghoaCls.php';
    if(isset($_GET['reqact'])){
        $requestAcion = $_GET['reqact'];
        switch($requestAcion){
           case 'addnew':
                $tenhanghoa = $_POST['tenhanghoa'];
                $mota = $_POST['mota'];
                $ghichu = $_POST['ghichu'];
                
                // Kiểm tra có chọn hình ảnh không
                if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0 && !empty($_FILES['hinhanh']['tmp_name'])) {
                    $hinhanh = $_FILES['hinhanh']['tmp_name'];
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                } else {
                    $hinhanh = ""; // Hoặc giá trị mặc định nếu cần
                }
                
                $idloaihang = $_POST['idloaihang'];
                $hh = new hanghoa();
                $kq= $hh->HanghoaAdd($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang);
                if ($kq) {
                    header('location:../../index.php?req=hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=hanghoaView&result=notok');
                }
                break;
            case 'deletehanghoa':
                $idhanghoa = $_GET['idhanghoa'];
                $hh = new hanghoa();
                $kq = $hh->HanghoaDelete($idhanghoa);
                if ($kq) {
                    header('location:../../index.php?req=hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=hanghoaView&result=notok');
                }
                break;
            case 'updatehanghoa':
                $idhanghoa = $_POST['idhanghoa'];
                $tenhanghoa = $_POST['tenhanghoa'];
                $mota = $_POST['mota'];
                $ghichu = $_POST['ghichu'];
                $idloaihang = $_POST['idloaihang'];
                
                // Kiểm tra có đổi hình ảnh không
                if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0 && !empty($_FILES['hinhanh']['tmp_name'])) {
                    $hinhanh = $_FILES['hinhanh']['tmp_name'];
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                } else {
                    $hinhanh = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : "";
                }
                
                $hh = new hanghoa();
                $kq = $hh->HanghoaUpdate($tenhanghoa, $mota, $ghichu, $hinhanh, $idloaihang, $idhanghoa);
                if ($kq) {
                    header('location:../../index.php?req=hanghoaView&result=ok');
                } else{
                    header('location:../../index.php?req=hanghoaView&result=notok');
                }
                break;
            }
        }
?>