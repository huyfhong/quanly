<?php
require '../../element/mod/loaihangCls.php';
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $tenloaihang = $_POST['tenloaihang'];
            $ghichu = $_POST['ghichu'];
            
            // Kiểm tra có chọn hình ảnh không
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0 && !empty($_FILES['hinhanh']['tmp_name'])) {
                $hinhanh = $_FILES['hinhanh']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            } else {
                $hinhanh = "";
            }
           
            $lh = new loaihang();
            $kq= $lh->LoaihangAdd($tenloaihang, $ghichu, $hinhanh);
            if($kq) {
                header('location:../../index.php?req=loaihangView&result=ok');

            }else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
            default:
            header('location:../../index.php?req=loaihangView');
            break;
             
        case 'deleteloaihang': 
            $idloaihang=$_GET['idloaihang'];
            $lh = new loaihang();
            $kq= $lh->LoaihangDelete($idloaihang);
           if($kq) {
               header('location:../../index.php?req=loaihangView&result=ok');

           }else {
               header('location:../../index.php?req=loaihangView&result=notok');
           }
           break;
       case 'updateloaihang':
           $idloaihang = $_POST['idloaihang'];
           $tenloaihang = $_POST['tenloaihang'];
           $ghichu = $_POST['ghichu'];
       
           // Kiểm tra có đổi hình ảnh không
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0 && !empty($_FILES['hinhanh']['tmp_name'])) {
                $hinhanh = $_FILES['hinhanh']['tmp_name'];
                $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            } else {
                $hinhanh = isset($_POST['hinhanh']) ? $_POST['hinhanh'] : "";
            }
               
           $lh = new loaihang();
           $kq = $lh->LoaihangUpdate($tenloaihang, $ghichu, $hinhanh, $idloaihang);
           if ($kq) {
               header('location: ../../index.php?req=loaihangView&result=ok');
           } else {
               header('location: ../../index.php?req=loaihangView&result=notok');
               }
           break;
        }
    }else{
        header('location:../../index.php?req=loaihangView&result=ok');
    }    
?>