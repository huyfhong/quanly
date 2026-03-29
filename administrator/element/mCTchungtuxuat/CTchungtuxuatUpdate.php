<div class="text-center text-primary">Cập nhật chi tiết chứng từ xuất</div>
<?php
require './element/mod/CTchungtuxuatCls.php';
$idCTchungtuxuat = $_GET['idCTchungtuxuat'];
$CTxuat = new ctchungtuxuat();
$getCTxuat = $CTxuat->CTchungtuxuatGetbyId($idCTchungtuxuat);

require './element/mod/ChungtuxuatCls.php';
$xuat = new chungtuxuat();
$list_xuat = $xuat->ChungtuxuatGetAll();
?>
<section class="CTchungtuxuatupdate">
    <div class="container">
    <form name="updatectchungtuxuat" id="formadd_update" method="post" enctype="multipart/form-data" action="./element/mCTchungtuxuat/CTchungtuxuatAct.php?reqact=updatectchungtuxuat">
    <input type="hidden" name="idCTchungtuxuat" value="<?php echo $idCTchungtuxuat;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Tên hàng xuất</span>
    <input type="text" class="form-control" placeholder="Nhập tên hàng xuất" name="tenhangxuat" value="<?php echo $getCTxuat->tenhangxuat;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Số lượng</span>
    <input type="number" class="form-control" name="soluong" value="<?php echo $getCTxuat->soluong;?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getCTxuat->ghichu;?>"/>
    </div>
    </tr>
    <!-- hien thi chung tu xuat-->
    <tr>
    <div>    
    <?php
    foreach ($list_xuat as $p) {
    ?>    
     <div class="form-check form-check-inline">
     <label for="form-check-input" class="form-label">Chứng từ xuất</label>
    <input class="form-check-input" type="radio" name="idchungtuxuat" <?php if($p->idchungtuxuat==$getCTxuat->idchungtuxuat) echo'checked';?> value="<?php echo $p->idchungtuxuat;?>"/>
    <?php echo ($p->tenchungtuxuat);?><br>
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