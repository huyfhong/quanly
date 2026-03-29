<?php
require __DIR__ . '/../mod/DonhangCls.php';
require __DIR__ . '/../mod/CTdonhangCls.php';

if (isset($_GET['iddonhang'])) {
    $iddonhang = $_GET['iddonhang'];

    // Lấy đơn hàng
    $donhangObj = new donhang();
    $donhang = $donhangObj->DonhangGetbyId($iddonhang);

    // Lấy chi tiết đơn hàng
    $ctdonhangObj = new ctdonhang();
    $ctdonhangList = $ctdonhangObj->CTdonhangGetByDonhang($iddonhang);
} else {
    echo "<p class='text-danger'>Không tìm thấy đơn hàng.</p>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Phiếu đơn hàng</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
    body {
      padding: 40px;
    }
  </style>
</head>
<body>
  <div class="container border rounded p-4 shadow">
    <h2 class="text-center mb-4">PHIẾU ĐƠN HÀNG</h2>
    <p><strong>Mã đơn hàng:</strong> <?php echo $donhang->iddonhang; ?></p>
    <p><strong>Họ tên:</strong> <?php echo $donhang->hoten; ?></p>
    <p><strong>Địa chỉ:</strong> <?php echo $donhang->diachi; ?></p>
    <p><strong>Số điện thoại:</strong> <?php echo $donhang->sdt; ?></p>
    <p><strong>Ngày đặt:</strong> <?php echo date('d/m/Y H:i', strtotime($donhang->ngaydat)); ?></p>
    <p><strong>Phương thức thanh toán:</strong> 
        <?php echo ($donhang->phuongthucthanhtoan == 'ATM') ? 'Chuyển khoản ngân hàng' : 'Thanh toán khi nhận hàng'; ?>
    </p>

    <table class="table table-bordered mt-4">
      <thead>
        <tr>
          <th>#</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Đơn giá</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $tongtien = 0;
        foreach ($ctdonhangList as $index => $ct) {
          $thanhtien = $ct->soluong * $ct->dongia;
          $tongtien += $thanhtien;
        ?>
        <tr>
          <td><?php echo $index + 1; ?></td>
          <td><?php echo $ct->tenhanghoa; ?></td>
          <td><?php echo $ct->soluong; ?></td>
          <td><?php echo number_format($ct->dongia, 0, ',', '.'); ?> đ</td>
          <td><?php echo number_format($thanhtien, 0, ',', '.'); ?> đ</td>
        </tr>
        <?php } ?>
        <tr>
          <th colspan="4" class="text-end">Tổng tiền</th>
          <th><?php echo number_format($tongtien, 0, ',', '.'); ?> đ</th>
        </tr>
      </tbody>
    </table>

    <div class="text-center no-print mt-4">
      <button onclick="window.print()" class="btn btn-primary">In phiếu</button>
    </div>
  </div>
</body>
</html>
