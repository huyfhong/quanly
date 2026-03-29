<?php
require_once './element/mod/DonhangCls.php';
$obj_donhang = new donhang();

$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_donhang = $obj_donhang->DonhangSearch($keyword);
} else {
    $list_donhang = $obj_donhang->DonhangGetAll();
}

$l = count($list_donhang);

$list_view = $obj_donhang->DonhangView();
?>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap g-2">
            <h5 class="mb-0 text-primary"><i class="bi bi-cart-check me-2"></i>Danh sách đơn hàng</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="donhangView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm đơn hàng..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=donhangView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> đơn hàng</span>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <?php if($l > 0): ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light text-center small">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngày đặt</th>
                        <th scope="col">Thanh toán</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col" style="width: 130px;">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_donhang as $v): ?>
                    <tr class="small">
                        <td class="text-center fw-bold"><?php echo $v->iddonhang;?></td>
                        <td><?php echo $v->hoten;?></td>
                        <td><?php echo $v->diachi;?></td>
                        <td><?php echo $v->sdt;?></td>
                        <td><?php echo $v->email;?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($v->ngaydat));?></td>
                        <td><?php echo $v->phuongthucthanhtoan;?></td>
                        <td class="text-center">
                            <span class="badge bg-info text-dark"><?php echo $v->trangthai;?></span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mdonhang/donhangAct.php?reqact=deletedonhang&iddonhang=<?php echo $v->iddonhang;?>')" 
                                   class="btn btn-outline-danger btn-sm" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=donhangUpdate&iddonhang=<?php echo $v->iddonhang;?>" 
                                   class="btn btn-outline-primary btn-sm" title="Cập nhật">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="./element/mdonhang/in.php?iddonhang=<?php echo $v->iddonhang; ?>" target="_blank" 
                                   class="btn btn-outline-secondary btn-sm" title="In đơn hàng">
                                    <i class="bi bi-printer"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu đơn hàng.</div>
        <?php endif; ?>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-primary"><i class="bi bi-box-seam me-2"></i>Số lượng hàng hóa theo đơn hàng</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" style="width: 80px;" class="text-center">ID</th>
                        <th scope="col">Họ tên khách hàng</th>
                        <th scope="col" class="text-center">Số lượng hàng hóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_view as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->iddonhang; ?></td>
                        <td><?php echo $v->hoten; ?></td>
                        <td class="text-center">
                            <span class="badge bg-primary rounded-pill"><?php echo $v->soluong; ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
