<div class="text-center text-primary">Cập nhật hàng hóa</div>
<?php
require './element/mod/hanghoaCls.php';
$idhanghoa = $_GET['idhanghoa'];
$hh = new hanghoa();
$gethanghoa = $hh->HanghoaGetbyId($idhanghoa);

require './element/mod/loaihangCls.php';
$lh = new loaihang();
$list_lh = $lh->LoaihangGetAll();
?>
<hr>
<section class="HanghoaUpdate">
<div class="container">
<form name="hanghoaupdate" id="formreg" method="post" enctype="multipart/form-data" action='./element/mhanghoa/hanghoaAct.php?reqact=updatehanghoa'>
<input type="hidden" name="idhanghoa" value="<?php echo $idhanghoa;?>"/>
<input type="hidden" name="hinhanh" value="<?php echo ($gethanghoa->hinhanh);?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên Hàng Hóa</span>
    <input type="text" class="form-control" placeholder="Nhập tên hàng hóa" name="tenhanghoa" value="<?php echo $gethanghoa->tenhanghoa;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Mô tả</span>
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="mota" value="<?php echo $gethanghoa->mota;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span>
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $gethanghoa->ghichu;?>"/>
    </div>
    </tr>
    <tr>    
    <div class="input-group mb-3">
    <input type="file" class="form-control" name="hinhanh">
    <img class="imgtable" src='data:image/png;base64,<?php echo ($gethanghoa->hinhanh);?>'/>
    </div>
    </tr>
    <!-- hien thi loai hang-->
    <tr>
    <?php
    foreach ($list_lh as $p) {
    ?>    
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="idloaihang"<?php if($gethanghoa->idloaihang) echo "checked";?>value="<?php echo $p->idloaihang;?>"/>
    <img class="iconimg" src='data:image/png;base64,<?php echo ($p->hinhanh);?>'/>
    <?php echo ($p->tenloaihang);?><br>
    </div>
    <?php
    }
    ?>
    </tr>
    <!---->
    <tr>
        <td><button type="submit" class="btn btn-primary" value="Tạo mới">Submit</button></td>
        <td><button type="reset" class="btn btn-primary" value="làm lại"><b id="noteForm"></b>Reset</button></td>
    </tr>
</table>
</form>
</div>
</section>
<hr/>