<div class="text-center text-primary">Cập nhật dữ liệu Admin</div>
<?php
require './element/mod/AdminCls.php';
$idadmin = $_GET['idadmin'];
$adminObj = new admin();
$getadmin = $adminObj->AdminGetbyId($idadmin);
?>
<section class="AdminView-update">
<div class="container">
<form name="updateadmin" id="formreg" method="post" action="./element/mAdmin/AdminAct.php?reqact=updateadmin">
    <input type="hidden" name="idadmin" value="<?php echo $idadmin;?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên Đăng Nhập</span>
    <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="adminname" value="<?php echo $getadmin->adminname;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Mật Khẩu</span>
    <input type="password" class="form-control" placeholder=" Nhập password" name="password" value="<?php echo $getadmin->password;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Họ Và Tên</span>
    <input type="name" class="form-control" placeholder=" Nhập họ và tên" name="hoten" value="<?php echo $getadmin->hoten;?>"/>
    </div>
    </tr>
    <tr>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gioitinh" value="1" <?php if( $getadmin->gioitinh==1) echo 'checked'; ?>/>
    <label class="form-check-label">Nam</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gioitinh" value="0" <?php if( $getadmin->gioitinh==0) echo 'checked'; ?>/>
    <label class="form-check-label">Nữ</label>
    </div>
    </tr>    
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ngày Sinh</span>
    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $getadmin->ngaysinh;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Địa Chỉ </span>
    <input type="text" class="form-control" placeholder=" Nhập địa chỉ" name="diachi" value="<?php echo $getadmin->diachi;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Số Điện THoại</span>
    <input type="tel" class="form-control" placeholder=" Nhập SDT" name="dienthoai" value="<?php echo $getadmin->dienthoai;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Email</span>
    <input type="email" class="form-control" placeholder=" Nhập email" name="email" value="<?php echo $getadmin->email;?>"/>
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

