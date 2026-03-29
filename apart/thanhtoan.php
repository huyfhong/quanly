<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3b96751dc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="administrator/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="administrator/js/jsTNC.js"></script>
    <title>Thanh toán</title>
</head>
<style>
  body {background-color: #364269};
</style>
<?php
if (!isset($_SESSION['giohang']) || count($_SESSION['giohang']) == 0) {
  echo "<div class='container'>
      
      <div class='text-center'>
          <h2>Giỏ hàng trống</h2>
          <a href='http://localhost/TNC/' class='btn btn-primary btn-back'>Tiếp tục mua hàng</a>
      </div>
      
  </div>";
  exit();
}
$tongtien = 0;
?>
<section class="h-100 h-custom" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-7">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="fw-bold mb-0">Thông tin thanh toán</h2>
                  </div>
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                  <form method="POST" action="thanhtoanAct.php?reqact=addnew">
                  <div class="row mb-3">
                    <label for="hoten" class="col-sm-2 col-form-label fs-5 ">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hoten" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="diachi" class="col-sm-2 col-form-label fs-5 ">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="diachi" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="sdt" class="col-sm-2 col-form-label fs-5 ">SĐT</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="sdt" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="sdt" class="col-sm-2 col-form-label fs-5 ">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                  <div class="d-flex flex-row mb-3">
                  <div class="d-flex align-items-center pe-2">
                    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="radioNoLabel1"
                      value="Thanh toán ATM"checked />
                  </div>
                  <div class="rounded border d-flex w-100 p-3 align-items-center">
                    <p class="mb-0">
                      <i class="fas fa-credit-card fa-lg text-primary pe-2"></i>Visa Debit
                      Card, MasterCard, Maestro, JCB, Napas
                    </p>
                  </div>
                </div>
                <div class="d-flex flex-row mb-3">
                  <div class="d-flex align-items-center pe-2">
                    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="radioNoLabel1"
                      value="Thanh toán khi nhận hàng"checked />
                  </div>
                  <div class="rounded border d-flex w-100 p-3 align-items-center">
                    <p class="mb-0">
                      <i class="fas fa-truck fa-lg text-primary pe-2"></i>Thanh toán khi nhận hàng (COD)
                    </p>
                  </div>
                </div>
                
                  </div>
                  <hr class="my-4">
                  <div class="pt-5">
                    <h6 class="mb-0"><a href="./viewGiohang.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Quay trở lại</a></h6>
                  </div>
                </div>
              </div>
            
              <div class="col-5 bg-body-tertiary">
              <div class="p-5">
              <h3 class="fw-bold mb-0">Thông tin giỏ hàng</h3>
              <div class="row">
                <?php 
                foreach ($_SESSION['giohang'] as $item) : 
                $thanhtien = (float)$item['dongia'] * (int)$item['soluong'];
                $tongtien += $thanhtien;
                ?>
              <hr class="my-4">
                <div class="col">
                     <?php echo "<img src='data:image/png;base64,{$item['hinhanh']}' width='80'>"?>
                    </div>

                    <div class="col-3">
                    <h6 class="mb-0">
                     <?php echo $item['tenhanghoa']?>
                    </h6>
                    </div> 

                    <div class="col">
                    <?php  echo $item['soluong'] ?>
                    </div>

                    <div class="col-4">
                      <h6 ><?php echo number_format($thanhtien,0,',','.')?> đ</h6>
                    </div>  
                <?php endforeach; ?>
                    </div>
              <hr class="my-4">
                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Tổng thanh toán:</h5>
                    <h5><?php echo number_format($tongtien,0,',','.')?> đ</h5>
                </div>
                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Đặt hàng</button>
                </from>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

