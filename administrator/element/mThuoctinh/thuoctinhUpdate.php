<div class="text-center text-primary">Cập nhật thuộc tính</div>
<?php
require './element/mod/thuoctinhCls.php';
$idthuoctinh = $_GET['idthuoctinh'];
$tt = new thuoctinh();
$getthuoctinh = $tt->thuoctinhGetbyId($idthuoctinh);
?>
<section class="thuoctinhupdate">
    <div class="container">
    <form name="updatethuoctinh" id="formadd_thuoctinh" method="post" enctype="multipart/form-data" action="./element/mThuoctinh/thuoctinhAct.php?reqact=updatethuoctinh">
    <input type="hidden" name="idthuoctinh" value="<?php echo $idthuoctinh;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên Thuộc Tính</span>
    <input type="text" class="form-control" placeholder="Nhập tên thuộc tính" name="tenthuoctinh" value="<?php echo $getthuoctinh->tenthuoctinh;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getthuoctinh->ghichu;?>"/>
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