<?php
session_start();
require __DIR__ . '/../administrator/element/mod/DonhangCls.php';
require __DIR__. '/../administrator/element/mod/CTdonhangCls.php';
if(isset($_GET['reqact'])) {
    $requsetAction = $_GET['reqact'];
    switch($requsetAction){
        case 'addnew':

        if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
            echo "<p>Không có sản phẩm để thanh toán.</p>";
        exit();
        }

        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $phuongthucthanhtoan = $_POST['phuongthucthanhtoan'];
        $donhang = new donhang();
        $iddonhang= $donhang->DonhangAdd($hoten, $diachi, $sdt, $email, $phuongthucthanhtoan);
        if (!$iddonhang) {
            echo "<p>Lỗi khi tạo đơn hàng!</p>";
            exit();
        }
        
        foreach ($_SESSION['giohang'] as $item) {
            $idhanghoa = $item['idhanghoa'];
            $tenhanghoa = $item['tenhanghoa'];
            $dongia = $item['dongia'];
            $soluong = $item['soluong'];
            $thanhtien = $dongia * $soluong;
            $ctdonhang = new ctdonhang();
            $ctdonhang->CtdonhangAdd($iddonhang, $idhanghoa, $tenhanghoa, $dongia, $soluong, $thanhtien);

        }

        break;
    
    }

   

    // Xóa giỏ hàng sau khi thanh toán thành công
    unset($_SESSION['giohang']);

    echo "
<!DOCTYPE html>
<html lang='vi'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Thanh Toán Thành Công</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
   
</head>
<body>
    <div class='container'>
        
        <div class='text-center'>
            <h2>Thanh toán thành công!</h2>
            <p>Mã đơn hàng: <strong>{$iddonhang}</strong></p>
            <p>Ngày đặt hàng: <strong>" . date("d/m/Y H:i") . "</strong></p>
            <p>Cảm ơn bạn đã mua hàng. Đơn hàng của bạn sẽ sớm được xử lý.</p>
            <a href='http://localhost/TNC/' class='btn btn-primary btn-back'>Tiếp tục mua hàng</a>
        </div>
        
    </div>
</body>
</html>
";

}
?>
