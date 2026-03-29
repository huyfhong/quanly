<div class="text-center text-primary">Cập nhật chứng từ xuất</div>
<?php
require './element/mod/chungtuxuatCls.php';
$idchungtuxuat = $_GET['idchungtuxuat'];
$xuat = new chungtuxuat();
$getxuat = $xuat->ChungtuxuatGetbyId($idchungtuxuat);
?>
<section class="chungtuxuatupdate">
    <div class="container">
    <form name="updatechungtuxuat" id="formadd_update" method="post" enctype="multipart/form-data" action="./element/mChungtuxuat/chungtuxuatAct.php?reqact=updatechungtuxuat">
    <input type="hidden" name="idchungtuxuat" value="<?php echo $idchungtuxuat;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên chứng từ xuất</span>
    <input type="text" class="form-control" placeholder="Nhập tên chứng từ xuất" name="tenchungtuxuat" value="<?php echo $getxuat->tenchungtuxuat;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ngày xuất</span>
    <input type="date" class="form-control" name="ngayxuat" value="<?php echo $getxuat->ngayxuat;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getxuat->ghichu;?>"/>
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