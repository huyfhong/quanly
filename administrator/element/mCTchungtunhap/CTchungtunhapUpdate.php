<div class="text-center text-primary">Cập nhật chi tiết chứng từ nhập</div>
<?php
require './element/mod/CTchungtunhapCls.php';
$idCTchungtunhap = $_GET['idCTchungtunhap'];
$CTnhap = new ctchungtunhap();
$getCTnhap = $CTnhap->CTchungtunhapGetbyId($idCTchungtunhap);

require './element/mod/ChungtunhapCls.php';
$nhap = new chungtunhap();
$list_nhap = $nhap->ChungtunhapGetAll();
?>
<section class="CTchungtunhapupdate">
    <div class="container">
    <form name="updatectchungtunhap" id="formadd_update" method="post" enctype="multipart/form-data" action="./element/mCTchungtunhap/CTchungtunhapAct.php?reqact=updatectchungtunhap">
    <input type="hidden" name="idCTchungtunhap" value="<?php echo $idCTchungtunhap;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên hàng nhập</span>
    <input type="text" class="form-control" placeholder="Nhập tên hàng nhập" name="tenhangnhap" value="<?php echo $getCTnhap->tenhangnhap;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Số lượng</span>
    <input type="number" class="form-control" name="soluong" value="<?php echo $getCTnhap->soluong;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getCTnhap->ghichu;?>"/>
    </div>
    </tr>
    <!-- hien thi chung tu nhap-->
    <tr>
    <div>    
    <?php
    foreach ($list_nhap as $p) {
    ?>    
    <div class="form-check form-check-inline">
    <label for="form-check-input" class="form-label">Chứng từ nhập</label>
    <input class="form-check-input" type="radio" name="idchungtunhap" <?php if($p->idchungtunhap==$getCTnhap->idchungtunhap) echo'checked';?> value="<?php echo $p->idchungtunhap;?>"/>
    <?php echo ($p->tenchungtunhap);?><br>
    </div>
    <?php
    }
    ?>
    </div>
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