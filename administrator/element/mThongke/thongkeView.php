<?php
require_once './element/mod/hanghoaCls.php';
require_once './element/mod/UserCls.php';
require_once './element/mod/loaihangCls.php';
require_once './element/mod/DonhangCls.php';
require_once './element/mod/CTdonhangCls.php';

$hh = new hanghoa();
$us = new user();
$lh = new loaihang();
$dh = new donhang();
$ctdh = new ctdonhang();

$list_hh = $hh->HanghoaGetAll();
$list_us = $us->UserGetAll();
$list_lh = $lh->LoaihangGetAll();
$list_dh = $dh->DonhangGetAll();
$list_ctdh = $ctdh->CTdonhangGetAll();

// Tính toán doanh thu
$total_revenue = 0;
foreach ($list_ctdh as $item) {
    $total_revenue += $item->thanhtien;
}

// Thống kê theo loại hàng
$stats_lh = [];
foreach ($list_lh as $l) {
    $count = count($hh->HanghoaGetbyIdloaihang($l->idloaihang));
    $stats_lh[] = [
        'name' => $l->tenloaihang,
        'count' => $count
    ];
}

?>

<div class="row page-header">
    <div class="col-12">
        <h3 class="text-primary"><i class="bi bi-graph-up me-2"></i>Thống kê & Báo cáo</h3>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-1">Tổng sản phẩm</h6>
                        <h2 class="card-title mb-0"><?php echo count($list_hh); ?></h2>
                    </div>
                    <i class="bi bi-box-seam fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-1">Tổng doanh thu</h6>
                        <h2 class="card-title mb-0"><?php echo number_format($total_revenue); ?> <small>đ</small></h2>
                    </div>
                    <i class="bi bi-currency-dollar fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-warning text-dark">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-1">Đơn hàng</h6>
                        <h2 class="card-title mb-0"><?php echo count($list_dh); ?></h2>
                    </div>
                    <i class="bi bi-cart-check fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-subtitle mb-1">Người dùng</h6>
                        <h2 class="card-title mb-0"><?php echo count($list_us); ?></h2>
                    </div>
                    <i class="bi bi-people fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0 text-primary">Phân bổ sản phẩm theo loại</h5>
            </div>
            <div class="card-body">
                <canvas id="chartLoaiHang" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h5 class="mb-0 text-primary">Đơn hàng gần đây</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Mã ĐH</th>
                                <th>Khách hàng</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $recent_dh = array_slice(array_reverse($list_dh), 0, 5);
                            foreach ($recent_dh as $d): ?>
                            <tr>
                                <td>#<?php echo $d->iddonhang; ?></td>
                                <td><?php echo $d->hoten; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($d->ngaydat)); ?></td>
                                <td>
                                    <?php 
                                    $status = $d->trangthai;
                                    if($status == "Chuẩn bị đơn hàng"): ?>
                                        <span class="badge bg-warning text-dark">Đang xử lý</span>
                                    <?php elseif($status == "Đơn hàng đang được vận chuyển"): ?>
                                        <span class="badge bg-info text-dark">Đang giao</span>
                                    <?php elseif($status == "Đơn hàng đã được giao"): ?>
                                        <span class="badge bg-success">Đã giao</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?php echo $status ? $status : 'Mới'; ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white text-center">
                <a href="index.php?req=donhangView" class="btn btn-sm btn-link">Xem tất cả đơn hàng</a>
            </div>
        </div>
    </div>
</div>

<!-- Thêm Chart.js từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartLoaiHang').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_column($stats_lh, 'name')); ?>,
            datasets: [{
                label: 'Số lượng sản phẩm',
                data: <?php echo json_encode(array_column($stats_lh, 'count')); ?>,
                backgroundColor: [
                    '#0d6efd', '#198754', '#ffc107', '#0dcaf0', '#6610f2', '#fd7e14', '#20c997'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>
