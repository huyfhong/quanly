<?php
require './administrator/element/mod/hanghoaCls.php';
$hh = new hanghoa();
if (isset($_GET['reqView'])) {
  $idloaihang = $_GET['reqView'];
  $list_hh = $hh->HanghoaGetbyIdloaihang($idloaihang);
  $l = count($list_hh);
}else{
  $list_hh = $hh->HanghoaGetAll();
  $l = count($list_hh);
}

require './administrator/element/mod/GiaCls.php';
$g = new gia();
$list_g = $g->GiaGetAll();
?>
<div class="container">
<div class="row">
  <?php foreach ($list_hh as $v) { ?>
    <div class="col-3 py-2">
      <div class="card" style="width: auto;">
        <a href="./index.php?reqHanghoa=<?php echo $v->idhanghoa;?>">
          <img src='data:image/png;base64,<?php echo ($v->hinhanh); ?>' class="card-img-top" alt="..."></a>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h4 class="card-title"><?php echo ($v->tenhanghoa); ?></h4>
              <p class="card-text">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
                128 đánh giá
              </p>
            </div>
          </div>
          <div class="row">
            <?php foreach ($list_g as $p) {
              if ($p->idhanghoa === $v->idhanghoa) { ?>
                <div class="col">
                  <div class="gia">
                    <h5><?php echo number_format($p->dongia,0,',','.');?> đ</h5>
                  </div>
                </div>
              <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>
  <?php 
  } 
  ?>
</div>
</div>

