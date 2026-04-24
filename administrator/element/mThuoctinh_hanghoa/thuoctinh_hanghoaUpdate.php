<div class="text-center text-primary">Cập nhật thuộc tính hàng hóa</div>
<?php
require './element/mod/thuoctinh_hanghoaCls.php';
$idthuoctinh_hanghoa = $_GET['idthuoctinh_hanghoa'];
$tt_hh = new thuoctinh_hanghoa();
$getthuoctinh_hanghoa = $tt_hh->Thuoctinh_hanghoaGetbyId($idthuoctinh_hanghoa);

require './element/mod/hanghoaCls.php';
$hh = new hanghoa();
$list_hh = $hh->HanghoaGetAll();

require './element/mod/thuoctinhCls.php';
$tt = new thuoctinh();
$list_tt = $tt->thuoctinhGetAll();
?>
<hr>
<section class="thuoctinh_HanghoaUpdate">
<div class="container">
<form name="thuoctinh_hanghoaupdate" id="formreg" method="post" enctype="multipart/form-data" action='./element/mThuoctinh_hanghoa/thuoctinh_hanghoaAct.php?reqact=updatethuoctinh_hanghoa'>
<input type="hidden" name="idthuoctinh_hanghoa" value="<?php echo $idthuoctinh_hanghoa;?>"/>
<table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Giá trị</span>
    <input type="text" class="form-control" placeholder="Nhập giá trị" name="giatri" value="<?php echo $getthuoctinh_hanghoa->giatri;?>"/>
    </div>
    </tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span>
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getthuoctinh_hanghoa->ghichu;?>"/>
    </div>
    <!-- hien thi hang hoa-->
    <tr>
    <div>    
    <?php
    foreach ($list_hh as $p) {
    ?>    
    <div class="form-check form-check-inline">
    <label for="form-check-input" class="form-label"></label>
    <input class="form-check-input" type="radio" name="idhanghoa" <?php if($p->idhanghoa==$getthuoctinh_hanghoa->idhanghoa) echo "checked";?> value="<?php echo $p->idhanghoa;?>"/>
    <img class="iconimg" src='data:image/png;base64,<?php echo $p->hinhanh;?>'/>
    <?php echo ($p->tenhanghoa);?><br>
    </div>
    <?php
    }
    ?>
    </div>
    </tr>
    <!---->
    <!-- hien thi thuoc tinh-->
    <tr>
    <div>
    <?php
    foreach ($list_tt as $l) {
    ?>    
    <div class="form-check form-check-inline">
    <label for="form-check-input" class="form-label">thuộc tính</label>
    <input class="form-check-input" type="radio" name="idthuoctinh" <?php if($l->idthuoctinh==$getthuoctinh_hanghoa->idthuoctinh) echo "checked";?> value="<?php echo $l->idthuoctinh;?>"/>
    <?php echo ($l->tenthuoctinh);?><br>
    </div>
    <?php
    }
    ?>
    </div>
    </tr>
    <tr>
        <td><button type="submit" class="btn btn-primary" value="Tạo mới">Submit</button></td>
        <td><button type="reset" class="btn btn-primary" value="làm lại"><b id="noteForm"></b>Reset</button></td>
    </tr>
</table>
</form>
</div>
</section>
<hr/>