<?php
require './element/mod/ChungtuxuatCls.php';
$xuat = new chungtuxuat();
$list_xuat = $xuat->ChungtuxuatGetAll();

require_once './element/mod/CTchungtuxuatCls.php';
$CTxuat = new ctchungtuxuat();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_CTxuat = $CTxuat->CTchungtuxuatSearch($keyword);
} else {
    $list_CTxuat = $CTxuat->CTchungtuxuatGetAll();
}

$l = count($list_CTxuat);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-file-earmark-medical me-2"></i>Quản lý chi tiết chứng từ xuất</h5>
    </div>
    <div class="card-body">
        <form name="newCTchungtuxuat" id="formadd_CTchungtuxuat" method="post" enctype="multipart/form-data" action="./element/mCTchungtuxuat/CTchungtuxuatAct.php?reqact=addnew">    
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Tên hàng xuất</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên hàng xuất" name="tenhangxuat" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Số lượng</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hash"></i></span>
                        <input type="number" class="form-control" name="soluong" required min="1">
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Ghi chú</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-chat-dots"></i></span> 
                        <input type="text" class="form-control" placeholder="Nhập ghi chú" name="ghichu">
                    </div>
                </div>
                
                <div class="col-12">
                    <label class="form-label d-block">Chọn chứng từ xuất</label>
                    <div class="d-flex flex-wrap gap-3 p-2 border rounded bg-light">
                        <?php foreach ($list_xuat as $p): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="idchungtuxuat" value="<?php echo $p->idchungtuxuat;?>" id="ctx_<?php echo $p->idchungtuxuat;?>" required>
                            <label class="form-check-label" for="ctx_<?php echo $p->idchungtuxuat;?>">
                                <?php echo ($p->tenchungtuxuat);?>
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
            <h5 class="mb-0 text-primary">Danh sách chi tiết chứng từ xuất</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="CTchungtuxuatView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm SP..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=CTchungtuxuatView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> bản ghi</span>
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
                        <th scope="col">Tên hàng xuất</th>
                        <th scope="col" class="text-center">Số lượng</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col" class="text-center" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_CTxuat as $v): ?>
                    <tr>    
                        <td class="text-center fw-bold"><?php echo $v->idCTchungtuxuat;?></td>
                        <td><?php echo $v->tenhangxuat;?></td>
                        <td class="text-center"><?php echo $v->soluong;?></td>
                        <td><?php echo $v->ghichu;?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mCTchungtuxuat/CTchungtuxuatAct.php?reqact=deletectchungtuxuat&idCTchungtuxuat=<?php echo $v->idCTchungtuxuat;?>')" class="btn btn-outline-danger btn-sm" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=CTchungtuxuatUpdate&idCTchungtuxuat=<?php echo $v->idCTchungtuxuat;?>" class="btn btn-outline-primary btn-sm" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu chi tiết chứng từ xuất.</div>
        <?php endif; ?>
    </div>
</div>
