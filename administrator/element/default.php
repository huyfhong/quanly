<?php
if (isset($_SESSION['USER'])) {
    $namelogin = $_SESSION['USER'];
}
if (isset($_SESSION['ADMIN'])) {
    $namelogin = $_SESSION['ADMIN'];
}
?>
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h2 class="display-6 mb-3">Chào mừng trở lại!</h2>
                <p class="lead text-muted">Hệ thống quản lý cửa hàng máy tính.</p>
                <hr class="my-4">
                <?php
                if (isset($_COOKIE[$namelogin])) {
                    echo "<p class='mb-0'>Xin chào <strong>" .$namelogin . "</strong></p>"; 
                    echo "<p class='text-muted small'>Lần đăng nhập gần nhất: " . $_COOKIE[$namelogin] . "</p>";
                } else {
                     echo "<p class='mb-0'>Xin chào <strong>" . (isset($namelogin) ? $namelogin : 'Quản trị viên') . "</strong></p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3 shadow-sm h-100">
            <div class="card-header border-0 bg-transparent">Hàng hóa</div>
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-box-seam fs-1"></i></h5>
                <p class="card-text">Quản lý kho hàng và sản phẩm.</p>
                <a href="index.php?req=hanghoaView" class="btn btn-light btn-sm stretched-link">Truy cập</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3 shadow-sm h-100">
            <div class="card-header border-0 bg-transparent">Đơn hàng</div>
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-cart-check fs-1"></i></h5>
                <p class="card-text">Xem và xử lý đơn hàng.</p>
                <a href="index.php?req=donhangView" class="btn btn-light btn-sm stretched-link">Truy cập</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3 shadow-sm h-100">
            <div class="card-header border-0 bg-transparent text-dark">Nhập kho</div>
            <div class="card-body text-dark">
                <h5 class="card-title"><i class="bi bi-arrow-down-square fs-1"></i></h5>
                <p class="card-text">Quản lý phiếu nhập kho.</p>
                <a href="index.php?req=chungtunhapView" class="btn btn-light btn-sm stretched-link">Truy cập</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3 shadow-sm h-100">
            <div class="card-header border-0 bg-transparent text-dark">Thống kê</div>
            <div class="card-body text-dark">
                <h5 class="card-title"><i class="bi bi-graph-up fs-1"></i></h5>
                <p class="card-text">Báo cáo doanh thu.</p>
                <a href="index.php?req=thongkeView" class="btn btn-light btn-sm stretched-link">Truy cập</a>
            </div>
        </div>
    </div>
</div>
