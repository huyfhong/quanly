<?php
require './element/mod/hanghoaCls.php';
$hh = new hanghoa();
$list_hh = $hh->HanghoaGetAll();

require './element/mod/GiaCls.php';
$g = new gia();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_g = $g->GiaSearch($keyword);
} else {
    $list_g = $g->GiaGetAll();
}

$l = count($list_g);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-currency-dollar me-2"></i>Quản lý đơn giá</h5>
    </div>
    <div class="card-body">
        <form name="newgia" id="formreg" method="post" enctype="multipart/form-data" action='./element/mGia/GiaAct.php?reqact=addnew'>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Đơn giá (VNĐ)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                        <input type="number" class="form-control" placeholder="Nhập đơn giá" name="dongia" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ghi chú</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu">
                    </div>
                </div>
                
                <div class="col-12">
                    <label class="form-label d-block">Chọn hàng hóa áp giá</label>
                    <div class="d-flex flex-wrap gap-3 p-2 border rounded bg-light">
                        <?php foreach ($list_hh as $p): ?>
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input me-2" type="radio" name="idhanghoa" value="<?php echo $p->idhanghoa;?>" id="hh_<?php echo $p->idhanghoa;?>" required>
                            <label class="form-check-label d-flex align-items-center cursor-pointer" for="hh_<?php echo $p->idhanghoa;?>">
                                <?php if($p->hinhanh): ?>
                                    <img class="iconimg me-1" src='data:image/png;base64,<?php echo $p->hinhanh;?>' alt=""/>
                                <?php endif; ?>
                                <span><?php echo ($p->tenhanghoa);?></span>
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

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap g-2">
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách bảng giá</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="giaView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm giá..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=giaView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> mức giá</span>
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
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" class="text-center" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_g as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->iddongia;?></td>
                        <td class="text-primary fw-bold"><?php echo number_format($v->dongia, 0, ',', '.');?> VNĐ</td>
                        <td><?php echo $v->ghichu;?></td>
                        <td class="text-center">
                            <div class="btn-action-group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mGia/GiaAct.php?reqact=deletegia&iddongia=<?php echo $v->iddongia;?>')" class="btn btn-outline-danger btn-action" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=GiaUpdate&iddongia=<?php echo $v->iddongia;?>" class="btn btn-outline-primary btn-action" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu giá hàng.</div>
        <?php endif; ?>
    </div>
</div>
