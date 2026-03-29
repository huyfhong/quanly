<?php
require_once './element/mod/thuoctinhCls.php';
$tt = new thuoctinh();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_tt = $tt->ThuoctinhSearch($keyword);
} else {
    $list_tt = $tt->thuoctinhGetAll();
}

$l = count($list_tt);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-list-stars me-2"></i>Quản lý thuộc tính</h5>
    </div>
    <div class="card-body">
        <form name="newthuoctinh" id="formadd_thuoctinh" method="post" action="./element/mThuoctinh/thuoctinhAct.php?reqact=addnew">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên Thuộc Tính</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên thuộc tính" name="tenthuoctinh" required>
                    </div>
                </div>
                <div class="col-md-6">
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
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách thuộc tính</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="thuoctinhView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm thuộc tính..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=thuoctinhView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> thuộc tính</span>
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
                        <th scope="col">Tên thuộc tính</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_tt as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idthuoctinh;?></td>
                        <td><?php echo $v->tenthuoctinh;?></td>
                        <td><?php echo $v->ghichu;?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mThuoctinh/thuoctinhAct.php?reqact=deletethuoctinh&idthuoctinh=<?php echo $v->idthuoctinh;?>')" 
                                   class="btn btn-outline-danger btn-sm" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=thuoctinhUpdate&idthuoctinh=<?php echo $v->idthuoctinh;?>" 
                                   class="btn btn-outline-primary btn-sm" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu thuộc tính.</div>
        <?php endif; ?>
    </div>
</div>
