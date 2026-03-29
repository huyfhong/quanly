<form name="newdonhang" id="formreg" method="post" enctype="multipart/form-data" action='./element/mdonhang/donhangAct.php?reqact=addnew'>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Họ tên</span>
    <input type="text" class="form-control" placeholder="Nhập họ tên" name="hoten">
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Địa chỉ</span>
    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="diachi">
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Điện thoại</span>
    <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="sdt">
    </div>
    <div class="input-group mb-3">
    <span class="input-group-text">Email</span>
    <input type="text" class="form-control" placeholder="Nhập email" name="email">
    </div>
     <div class="mb-3">
  <label class="form-label fw-bold text-primary">Phương thức thanh toán</label>

  <div class="form-check border rounded p-2 mb-2">
    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="atm" value="Thanh toán ATM">
    <label class="form-check-label" for="atm">
      <i class="fas fa-credit-card text-primary pe-2 "></i> Chuyển khoản ngân hàng (ATM)
    </label>
  </div>
  <div class="form-check border rounded p-2">
    <input class="form-check-input" type="radio" name="phuongthucthanhtoan" id="cod" value="Thanh toán khi nhận hàng (COD)">
    <label class="form-check-label" for="cod">
      <i class="fas fa-truck pe-2 text-primary"></i> Thanh toán khi nhận hàng (COD)
    </label>
  </div>
</div>
</tr>
    <!---->
    <tr>
        <td><button type="submit" class="btn btn-primary" value="Tạo mới">Submit</button></td>
        <td><button type="reset" class="btn btn-primary" value="làm lại"><b id="noteForm"></b>Reset</button></td>
    </tr>
</table>
</form>