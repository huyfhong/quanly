<div class="text-center text-primary">Cập nhật chứng từ nhập</div>
<?php
require './element/mod/ChungtunhapCls.php';
$idchungtunhap = $_GET['idchungtunhap'];
$nhap = new chungtunhap();
$getnhap = $nhap->ChungtunhapGetbyId($idchungtunhap);
?>
<section class="chungtunhapupdate">
    <div class="container">
    <form name="updatechungtunhap" id="formadd_thuoctinh" method="post" enctype="multipart/form-data" action="./element/mChungtunhap/chungtunhapAct.php?reqact=updatechungtunhap">
    <input type="hidden" name="idchungtunhap" value="<?php echo $idchungtunhap;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên chứng từ nhập</span>
    <input type="text" class="form-control" placeholder="Nhập tên chứng từ nhập" name="tenchungtunhap" value="<?php echo $getnhap->tenchungtunhap;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ngày nhập</span>
    <input type="date" class="form-control" name="ngaynhap" value="<?php echo $getnhap->ngaynhap;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getnhap->ghichu;?>"/>
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