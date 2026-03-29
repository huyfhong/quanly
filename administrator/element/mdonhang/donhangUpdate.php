<div class="text-center text-primary">Cập nhật dữ liệu đơn hàng</div>
<?php
require './element/mod/DonhangCls.php';
$iddonhang = $_GET['iddonhang'];
$donhangObj = new donhang();
$getdonhang = $donhangObj->DonhangGetbyId($iddonhang);
?>
<section class="donhangView-update">
<div class="container">
<form name="updatedonhang" id="formreg" method="post" action="./element/mdonhang/donhangAct.php?reqact=updatedonhang">
    <input type="hidden" name="iddonhang" value="<?php echo $iddonhang;?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Họ tên</span>
    <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten" value="<?php echo $getdonhang->hoten;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Địa chỉ</span>
    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="diachi" value="<?php echo $getdonhang->diachi;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Điện thoại</span>
    <input type="tel" class="form-control" placeholder=" Nhập số điện thoại" name="sdt" value="<?php echo $getdonhang->sdt;?>"/>
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text">Email</span>
    <input type="email" class="form-control" placeholder=" Nhập Email" name="email" value="<?php echo $getdonhang->email;?>"/>
    </div>
    </tr>
    <div class="mb-3">
  <label class="form-label fw-bold text-primary">Phương thức thanh toán</label>

  <div class="form-check border rounded p-2 mb-2">
    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="atm" value="Thanh toán ATM"
      <?php if($getdonhang->phuongthucthanhtoan == "Thanh toán ATM") echo "checked"; ?>>
    <label class="form-check-label" for="atm">
      <i class="fas fa-credit-card text-primary pe-2 "></i> Chuyển khoản ngân hàng (ATM)
    </label>
  </div>

  <div class="form-check border rounded p-2">
    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="cod" value="Thanh toán khi nhận hàng (COD)"
      <?php if($getdonhang->phuongthucthanhtoan == "Thanh toán khi nhận hàng (COD)") echo "checked"; ?>>
    <label class="form-check-label" for="cod">
      <i class="fas fa-truck pe-2 text-primary"></i> Thanh toán khi nhận hàng (COD)
    </label>
  </div>
</div>
</tr>
<tr>
    <div class="mb-3">
  <label class="form-label fw-bold text-primary">Trạng thái đơn hàng</label>

  <div class="form-check border rounded p-2 mb-2">
    <input class="form-check-input" type="radio" name="trangthai" id="chuanbi" value="Chuẩn bị đơn hàng"
      <?php if($getdonhang->trangthai == "Chuẩn bị đơn hàng") echo "checked"; ?>>
    <label class="form-check-label" for="chuanbi">
      <i class="fas fa-credit-card text-primary pe-2 "></i> Chuẩn bị đơn hàng (Đang xử lý)
    </label>
  </div>

  <div class="form-check border rounded p-2">
    <input class="form-check-input" type="radio" name="trangthai" id="vanchuyen" value="Đơn hàng đang được vận chuyển"
      <?php if($getdonhang->trangthai == "Đơn hàng đang được vận chuyển") echo "checked"; ?>>
    <label class="form-check-label" for="vanchuyen">
      <i class="fas fa-truck pe-2 text-primary"></i> Đơn hàng đang được vận chuyển (Đang giao hàng)
    </label>
  </div>

  <div class="form-check border rounded p-2">
    <input class="form-check-input" type="radio" name="trangthai" id="giaothanhcong" value="Đơn hàng đã được giao"
      <?php if($getdonhang->trangthai == "Đơn hàng đã được giao") echo "checked"; ?>>
    <label class="form-check-label" for="giaothanhcong">
      <i class="fa-solid fa-box-open text-primary"></i> Đơn hàng đã được giao (Đã giao hàng)
    </label>
  </div>
</div>
</tr>


    <tr>
        <td><button type="submit" class="btn btn-primary" value="Cập nhật">Submit</button></td>
        <td><button type="reset" class="btn btn-primary" value="làm lại"><b id="noteForm"></b>Reset</button></td>
    </tr>
</table>
</form>
</div>
</section>

