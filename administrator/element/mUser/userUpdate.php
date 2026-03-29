<div class="text-center text-primary">Cập nhật dữ liệu User</div>
<?php
require './element/mod/UserCls.php';
$iduser = $_GET['iduser'];
$userObj = new user();
$getuser = $userObj->UserGetbyId($iduser);
?>
<section class="UserView-update">
<div class="container">
<form name="updateuser" id="formreg" method="post" action="./element/mUser/userAct.php?reqact=updateuser">
    <input type="hidden" name="iduser" value="<?php echo $iduser;?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên Đăng Nhập</span>
    <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username" value="<?php echo $getuser->username;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Mật Khẩu</span>
    <input type="password" class="form-control" placeholder=" Nhập password" name="password" value="<?php echo $getuser->password;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Họ Và Tên</span>
    <input type="name" class="form-control" placeholder=" Nhập họ và tên" name="hoten" value="<?php echo $getuser->hoten;?>"/>
    </div>
    </tr>
    <tr>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gioitinh" value="1" <?php if( $getuser->gioitinh==1) echo 'checked'; ?>/>
    <label class="form-check-label">Nam</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gioitinh" value="0" <?php if( $getuser->gioitinh==0) echo 'checked'; ?>/>
    <label class="form-check-label">Nữ</label>
    </div>
    </tr>    
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ngày Sinh</span>
    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $getuser->ngaysinh;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Địa Chỉ </span>
    <input type="text" class="form-control" placeholder=" Nhập địa chỉ" name="diachi" value="<?php echo $getuser->diachi;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Số Điện THoại</span>
    <input type="tel" class="form-control" placeholder=" Nhập SDT" name="dienthoai" value="<?php echo $getuser->dienthoai;?>"/>
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

