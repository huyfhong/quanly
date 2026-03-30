<?php
require './element/mod/loaihangCls.php';
$lh = new loaihang();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_lh = $lh->LoaihangSearch($keyword);
} else {
    $list_lh = $lh->LoaihangGetAll();
}

$l = count($list_lh);
$list_view = $lh->Loaihangview();
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-tags me-2"></i>Quản lý loại hàng</h5>
    </div>
    <div class="card-body">
        <form name="newloaihang" id="formreg" method="post" enctype="multipart/form-data" action='./element/mLoaihang/loaihangAct.php?reqact=addnew'>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên loại hàng</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên loại hàng" name="tenloaihang" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ghi chú</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hình ảnh minh họa</label>
                    <input type="file" class="form-control" name="hinhanh">
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
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách loại hàng</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="loaihangView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm loại hàng..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=loaihangView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> loại hàng</span>
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
                        <th scope="col">Tên loại hàng</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" class="text-center">Hình ảnh</th>
                        <th scope="col" class="text-center" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_lh as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idloaihang;?></td>
                        <td><?php echo $v->tenloaihang;?></td>
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
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $v->idloaihang;?>')" class="btn btn-outline-danger btn-action" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=updateloaihang&idloaihang=<?php echo $v->idloaihang;?>" class="btn btn-outline-primary btn-action" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu loại hàng.</div>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-primary">Phân loại theo hàng hóa</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 50px;">ID</th>
                        <th scope="col">Tên loại hàng</th>
                        <th scope="col">Hàng hóa thuộc loại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_view as $v): ?>
                        <tr>
                            <td><?php echo $v->idloaihang; ?></td>
                            <td><?php echo $v->tenloaihang; ?></td>
                            <td><span class="badge bg-info text-dark"><?php echo $v->tenhanghoa; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
