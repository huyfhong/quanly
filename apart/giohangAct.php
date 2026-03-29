<?php
session_start();
if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
    case 'addnew':
        
          $idhanghoa = $_POST['idhanghoa'];
          $tenhanghoa = $_POST['tenhanghoa'];
          $dongia = $_POST['dongia'];
          $soluong = $_POST['soluong'];
        $hinhanh = $_POST['hinhanh'] ?? ''; 

    // Kiểm tra nếu giỏ hàng chưa tồn tại thì tạo mới
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = [];
    }

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $found = false;
    foreach ($_SESSION['giohang'] as &$item) {
        if ($item['idhanghoa'] == $idhanghoa) {
            $item['soluong'] += $soluong; // Cộng dồn số lượng
            $found = true;
            break;
        }
    }
    
    // Nếu sản phẩm chưa có trong giỏ, thêm mới
    if (!$found) {
        $_SESSION['giohang'][] = [
            'idhanghoa' => $idhanghoa,
            'tenhanghoa' => $tenhanghoa,
            'dongia' => $dongia,
            'soluong' => $soluong,
            'hinhanh' => $hinhanh
        ];
    }

    // Chuyển hướng về trang giỏ hàng
    header("Location: viewGiohang.php");
    break;

    //xoa hang hoa gio hang 
    case 'delete':          
        $index = $_GET['index'];
        unset($_SESSION['giohang'][$index]);
        $_SESSION['giohang'] = array_values($_SESSION['giohang']); // Cập nhật lại chỉ mục mảng

        header("Location: Viewgiohang.php");

    break;
    case 'update':
        if (isset($_POST['soluong'])) {
            foreach ($_POST['soluong'] as $index => $soluong) {
                if ($soluong > 0) {
                    $_SESSION['giohang'][$index]['soluong'] = (int)$soluong;
                } else {
                    unset($_SESSION['giohang'][$index]); // Xóa nếu số lượng <= 0
                }
            }
        }
        header("Location: ./viewGiohang.php"); // Chuyển hướng về trang giỏ hàng
    break;
    

    
    }


}
?>
