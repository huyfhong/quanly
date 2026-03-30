<?php
require_once './element/mod/ChungtunhapCls.php';
$nhap = new chungtunhap();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_nhap = $nhap->ChungtunhapSearch($keyword);
} else {
    $list_nhap = $nhap->ChungtunhapGetAll();
}

$l = count($list_nhap);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-file-earmark-arrow-down me-2"></i>Quản lý chứng từ nhập</h5>
    </div>
    <div class="card-body">
        <form name="newchungtunhap" id="formadd_chungtunhap" method="post" action="./element/mChungtunhap/chungtunhapAct.php?reqact=addnew">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Tên chứng từ nhập</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên chứng từ" name="tenchungtunhap" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ngày nhập</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                        <input type="date" class="form-control" name="ngaynhap" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ghi chú</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu">
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
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách chứng từ nhập</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="chungtunhapView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm chứng từ..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=chungtunhapView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> chứng từ</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if($l > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col" style="width: 80px;">ID</th>
                        <th scope="col">Tên chứng từ nhập</th>
                        <th scope="col">Ngày nhập</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_nhap as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idchungtunhap;?></td>
                        <td><?php echo $v->tenchungtunhap;?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($v->ngaynhap));?></td>
                        <td><?php echo $v->ghichu;?></td>
                        <td class="text-center">
                            <div class="btn-action-group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mChungtunhap/chungtunhapAct.php?reqact=deletechungtunhap&idchungtunhap=<?php echo $v->idchungtunhap;?>')" class="btn btn-outline-danger btn-action" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=chungtunhapUpdate&idchungtunhap=<?php echo $v->idchungtunhap;?>" class="btn btn-outline-primary btn-action" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu chứng từ nhập.</div>
        <?php endif; ?>
    </div>
</div>
