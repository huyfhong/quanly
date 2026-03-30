<?php
require './element/mod/loaihangCls.php';
require './element/mod/hanghoaCls.php';

$lh = new loaihang();
$list_lh = $lh->LoaihangGetAll();

$hh = new hanghoa();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_hh = $hh->HanghoaSearch($keyword);
} else {
    $list_hh = $hh->HanghoaGetAll();
}

$l = count($list_hh);

// Handle list_view for the bottom table
$list_view = $hh->HanghoaView(); 
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i>Quản lý hàng hóa</h5>
    </div>
    <div class="card-body">
        <form name="newhanghoa" id="formreg" method="post" enctype="multipart/form-data" action='./element/mhanghoa/hanghoaAct.php?reqact=addnew'>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên Hàng Hóa</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên hàng hóa" name="tenhanghoa" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mô tả</label>
                    <div class="input-group">
                         <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập mô tả" name="mota">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ghi chú</label>
                    <div class="input-group">
                         <span class="input-group-text"><i class="bi bi-journal-text"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh">
                </div>
                
                <div class="col-12">
                    <label class="form-label d-block">Loại hàng</label>
                    <div class="d-flex flex-wrap gap-3 p-2 border rounded bg-light">
                        <?php foreach ($list_lh as $p): ?>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="idloaihang" value="<?php echo $p->idloaihang;?>" id="lh_<?php echo $p->idloaihang;?>" required>
                            <label class="form-check-label d-flex align-items-center cursor-pointer" for="lh_<?php echo $p->idloaihang;?>">
                                <?php if($p->hinhanh): ?>
                                    <img class="iconimg me-1" src='data:image/png;base64,<?php echo $p->hinhanh;?>' alt=""/>
                                <?php endif; ?>
                                <span><?php echo ($p->tenloaihang);?></span>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="col-12 mt-4 text-center">
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-plus-circle me-2"></i>Tạo mới</button>
                    <button type="reset" class="btn btn-secondary px-4"><i class="bi bi-arrow-counterclockwise me-2"></i>Làm lại</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap g-2">
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách hàng hóa</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="hanghoaView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm hàng hóa..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=hanghoaView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> sản phẩm</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if($l > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 50px;">ID</th>
                        <th scope="col">Tên hàng hóa</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" class="text-center">Hình ảnh</th>
                        <th scope="col" class="text-center" style="width: 100px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_hh as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idhanghoa;?></td>
                        <td><?php echo $v->tenhanghoa;?></td>
                        <td><?php echo $v->mota;?></td>
                        <td><?php echo $v->ghichu;?></td>
                        <td class="text-center">
                            <?php if($v->hinhanh): ?>
                            <img class="imgtable shadow-sm" src='data:image/png;base64,<?php echo ($v->hinhanh);?>' alt="img"/>
                            <?php else: ?>
                            <span class="text-muted small">No image</span>
                            <?php endif; ?>
                        </td> 
                        <td class="text-center">
                            <div class="btn-action-group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mhanghoa/hanghoaAct.php?reqact=deletehanghoa&idhanghoa=<?php echo $v->idhanghoa;?>')" class="btn btn-outline-danger btn-action" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=hanghoaUpdate&idhanghoa=<?php echo $v->idhanghoa;?>" class="btn btn-outline-primary btn-action" title="Cập nhật">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu hàng hóa.</div>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-primary">Hàng hóa theo loại hàng</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 50px;">ID</th>
                        <th scope="col">Tên hàng hóa</th>
                        <th scope="col">Danh sách loại hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_view as $v): ?>
                        <tr>
                            <td><?php echo $v->idhanghoa; ?></td>
                            <td><?php echo $v->tenhanghoa; ?></td>
                            <td><span class="badge bg-info text-dark"><?php echo $v->tenloaihang; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
