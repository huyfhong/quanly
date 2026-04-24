<div class="text-center text-primary">Cập nhật dữ liệu chi tiết đơn hàng</div>
<?php
require './element/mod/CTdonhangCls.php';
$idctdonhang = $_GET['idctdonhang'];
$CTdonhangObj = new CTdonhang();
$getCTdonhang = $CTdonhangObj->CTdonhangGetbyId($idctdonhang);
?>
<section class="CTdonhangView-update">
<div class="container">
<form name="updateCTdonhang" id="formreg" method="post" action="./element/mCTdonhang/CTdonhangAct.php?reqact=updateCTdonhang">
    <input type="hidden" name="idctdonhang" value="<?php echo $idctdonhang;?>"/>
    <input type="hidden" name="iddonhang" value="<?php echo $getCTdonhang->iddonhang;?>"/>
    <input type="hidden" name="idhanghoa" value="<?php echo $getCTdonhang->idhanghoa;?>"/>
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Số lượng</span>
    <input type="number" class="form-control" placeholder="Nhập Số lượng " name="soluong" value="<?php echo $getCTdonhang->soluong;?>"/>
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

