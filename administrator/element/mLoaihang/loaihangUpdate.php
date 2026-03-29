<div class="text-center text-primary"> Cập nhật loại hàng</div>
<?php
require './element/mod/loaihangCls.php';
$idloaihang = $_GET['idloaihang'];
$lh = new loaihang();
$getloaihang = $lh->LoaihangGetbyId($idloaihang);
?>
<section class="loaihangupdate">
<div class="container">
<form name="updateloaihang" id="formreg" method="post" enctype="multipart/form-data" action="./element/mLoaihang/loaihangAct.php?reqact=updateloaihang">
<input type="hidden" name="idloaihang" value="<?php echo $idloaihang;?>"/>
<input type="hidden" name="hinhanh" value="<?php echo ($getloaihang->hinhanh);?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên Loại Hàng</span>
    <input type="text" class="form-control" placeholder="Nhập tên loại hàng" name="tenloaihang" value="<?php echo $getloaihang->tenloaihang;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span>
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getloaihang->ghichu;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <input type="file" class="form-control" name="hinhanh">
    <img class="imgtable" src='data:image/png;base64,<?php echo ($getloaihang->hinhanh);?>'/>
    </div>
    </tr>
    <tr>
        <td><button type="submit" class="btn btn-primary" value="cập nhật">Submit</button></td>
        <td><button type="reset" class="btn btn-primary" value="làm lại"><b id="noteForm"></b>Reset</button></td>
    </tr>
</table>
</form>
</div>
</section>