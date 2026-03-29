<?php
require_once './element/mod/CTdonhangCls.php';
$CTdonhang = new ctdonhang();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_CTdonhang = $CTdonhang->CTdonhangSearch($keyword);
} else {
    $list_CTdonhang = $CTdonhang->CTdonhangGetAll();
}

$l = count($list_CTdonhang);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap g-2">
            <h5 class="mb-0 text-primary"><i class="bi bi-list-check me-2"></i>Danh sách chi tiết đơn hàng</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="CTdonhangView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm SP..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=CTdonhangView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> mục</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if($l > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID Đơn hàng</th>
                        <th scope="col">ID Hàng hóa</th>
                        <th scope="col">Tên hàng hóa</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col" style="width: 120px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_CTdonhang as $v): 
                        $thanhtien = $v->dongia * $v->soluong;
                    ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idctdonhang;?></td>
                        <td class="text-center"><?php echo $v->iddonhang;?></td>
                        <td class="text-center"><?php echo $v->idhanghoa;?></td>
                        <td><?php echo $v->tenhanghoa;?></td>
                        <td class="text-end text-danger fw-bold"><?php echo number_format($v->dongia, 0, ',', '.');?>đ</td>
                        <td class="text-center"><?php echo $v->soluong;?></td>
                        <td class="text-end text-success fw-bold"><?php echo number_format($thanhtien, 0, ',', '.');?>đ</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mCTdonhang/CTdonhangAct.php?reqact=deleteCTdonhang&idctdonhang=<?php echo $v->idctdonhang;?>')" 
                                   class="btn btn-outline-danger btn-sm" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=CTdonhangUpdate&idctdonhang=<?php echo $v->idctdonhang;?>" 
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu chi tiết đơn hàng.</div>
        <?php endif; ?>
    </div>
</div>
