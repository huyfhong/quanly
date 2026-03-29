
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
    <title>Giỏ hàng</title>
</head>
<style>
  body {background-color: #364269};
</style>
<section class="h-100 h-custom" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0">Giỏ hàng</h1>
                  </div>
                  <hr class="my-4">
                  <form action="giohangAct.php?reqact=update" method="post">
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                 
                  <?php
                    $tonghanghoa = 0;
                    if (isset($_SESSION['giohang'])) {
                    foreach ($_SESSION['giohang'] as $item) {
                    $tonghanghoa += $item['soluong'];
                    }
                  }
                  ?>
                  <?php
                    $tongtien = 0;
                    if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    foreach ($_SESSION['giohang'] as $index => $item) {
                    $thanhtien = (float)$item['dongia'] *(int)$item['soluong'];
                    $tongtien += $thanhtien;
                  ?>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                     <?php echo "<img src='data:image/png;base64,{$item['hinhanh']}' width='80'>"?>
                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6 class="mb-0">
                     <?php echo $item['tenhanghoa']?>
                    </h6>
                    </div> 

                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <input class="form-control form-control-sm" type="number" min="1" max="10"   
                    <?php echo "name='soluong[$index]' value='{$item['soluong']}'"?>>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?php echo number_format($thanhtien,0,',','.')?> đ</h6>
                    </div>

                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a class="text-muted"
                      <?php echo "href='./giohangAct.php?reqact=delete&index={$index}'"?>>
                      <i class="fas fa-times"></i></a>
                    </div>
                    <?php
                    }
                  } else {
                    echo "<tr><td colspan='6'>Giỏ hàng trống</td></tr>";
                  }
                  ?>
                  </div>
                  <hr class="my-4">
                  

                  <div class="pt-5 ">
                        <h6 class="mb-0"><a href="../index.php" class="text-body"><i  
                          class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua hàng</a>
                          <button type="submit" class=" btn text-dark text-decoration-underline">Cập nhật giỏ hàng</button></h6>
                </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-body-tertiary">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Thông tin giỏ hàng</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Tổng sản phẩm: <?php echo $tonghanghoa ?></h5>
                  </div>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Tổng thanh toán:</h5>
                    <h5><?php echo number_format($tongtien,0,',','.')?> đ</h5>
                  </div>

                 <a href="./thanhtoan.php"> <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Thanh toán</button></a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
