<div class="text-center text-primary">Cập nhật đơn giá</div>
<?php
require './element/mod/GiaCls.php';
$iddongia = $_GET['iddongia'];
$g = new gia();
$getgia= $g->GiaGetbyId($iddongia);

require './element/mod/hanghoaCls.php';
$hh = new hanghoa();
$list_hh = $hh->HanghoaGetAll();
?>
<section class="thuoctinhupdate">
    <div class="container">
    <form name="updatethuoctinh" id="formadd_thuoctinh" method="post" enctype="multipart/form-data" action="./element/mGia/GiaAct.php?reqact=updategia">
    <input type="hidden" name="iddongia" value="<?php echo $iddongia;?>"/>    
    <table>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Đơn giá</span>
    <input type="text" class="form-control" placeholder="Nhập tên thuộc tính" name="dongia" value="<?php echo number_format($getgia->dongia, 0, ',', '.');?>"/>
    </div>
    </tr>
    <tr>
    <div class="input-group mb-3">
    <span class="input-group-text">Ghi chú</span> 
    <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu" value="<?php echo $getgia->ghichu;?>"/>
    </div>
    </tr>
     <!-- hien thi hang hoa-->
     <tr>
    <?php
    foreach ($list_hh as $p) {
    ?>    
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="idhanghoa"<?php if($p->idhanghoa==$getgia->idhanghoa) echo "checked";?> value="<?php echo $p->idhanghoa;?>"/>
    <img class="iconimg" src='data:image/png;base64,<?php echo ($p->hinhanh);?>'/>
    <?php echo ($p->tenhanghoa);?><br>
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