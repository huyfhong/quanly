<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <a href="index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none sidebar-brand">
        <img src="img/logotnc.png" alt="Logo" width="180" height="67">
        
    </a>
    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
        <li class="nav-item w-100">
            <a href="index.php" class="nav-link align-middle px-0">
                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Trang chủ</span>
            </a>
        </li>
        <li class="w-100">
            <a href="index.php?req=loaihangView" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Loại hàng</span></a>
        </li>
        <li class="w-100">
            <a href="index.php?req=hanghoaView" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Hàng hóa</span> </a>
        </li>
        <li class="w-100">
            <a href="index.php?req=giaView" class="nav-link px-0 align-middle">
                <i class=" fs-4 fa-solid fa-money-bill"> </i><span class="ms-1 d-none d-sm-inline">Giá hàng</span> </a>
        </li>
        <li class="w-100">
            <a href="#submenuAccount" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                    <i class=" fs-4 fa-solid fa-user"></i> <span class="ms-1 d-none d-sm-inline">Tài khoản</span></a>
            <ul class="collapse nav flex-column ms-1" id="submenuAccount" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="index.php?req=AdminView" class="nav-link px-0"> <span class="d-none d-sm-inline">Admin</span></a>
                </li>
                <li>
                    <a href="index.php?req=userView" class="nav-link px-0"> <span class="d-none d-sm-inline">User</span></a>
                </li>
            </ul>
        </li>
        <li class="w-100">
            <a href="index.php?req=thuoctinhView" class="nav-link px-0 align-middle">
                <i class=" fs-4 fa-brands fa-shopify"></i> <span class="ms-1 d-none d-sm-inline">Thuộc tính</span> </a>
        </li>
        <li class="w-100">
            <a href="index.php?req=thuoctinh_hanghoaView" class="nav-link px-0 align-middle">
                <i class=" fs-4 fa-brands fa-shopify"></i> <span class="ms-1 d-none d-sm-inline">Thuộc tính hàng hóa</span> </a>
        </li>
        <li class="w-100">
            <a href="#submenuImport" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                <i class=" fs-4 fa-solid fa-clipboard-list"></i> <span class="ms-1 d-none d-sm-inline">Nhập hàng</span></a>
            <ul class="collapse nav flex-column ms-1" id="submenuImport" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="index.php?req=chungtunhapView" class="nav-link px-0"> <span class="d-none d-sm-inline">Chứng từ nhập</span></a>
                </li>
                <li>
                    <a href="index.php?req=CTchungtunhapView" class="nav-link px-0"> <span class="d-none d-sm-inline">Chi tiết chứng từ nhập</span></a>
                </li>
            </ul>
        </li>
        <li class="w-100">
            <a href="#submenuExport" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                <i class=" fs-4 fa-solid fa-clipboard-list"></i> <span class="ms-1 d-none d-sm-inline">Xuất Hàng</span></a>
            <ul class="collapse nav flex-column ms-1" id="submenuExport" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="index.php?req=chungtuxuatView" class="nav-link px-0"> <span class="d-none d-sm-inline">Chứng từ xuất</span></a>
                </li>
                <li>
                    <a href="index.php?req=CTchungtuxuatView" class="nav-link px-0"> <span class="d-none d-sm-inline">Chi tiết chứng từ xuất</span></a>
                </li>
            </ul>
        </li>
        <li class="w-100">
            <a href="#submenuOrder" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                <i class="fa-solid fa-box"></i><span class="ms-1 d-none d-sm-inline">Quản lý đơn hàng</span></a>
            <ul class="collapse nav flex-column ms-1" id="submenuOrder" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="index.php?req=donhangView" class="nav-link px-0"> <span class="d-none d-sm-inline">Đơn hàng</span></a>
                </li>
                <li>
                    <a href="index.php?req=CTdonhangView" class="nav-link px-0"> <span class="d-none d-sm-inline">Chi tiết đơn hàng</span></a>
                </li>
            </ul>
        </li>
        <li class="w-100">
            <a href="index.php?req=thongkeView" class="nav-link px-0 align-middle">
                <i class=" fs-4 bi bi-graph-up"></i> <span class="ms-1 d-none d-sm-inline">Thống kê báo cáo</span> </a>
        </li>
        <li class="w-100">
            <a href="element/mAdmin/AdminAct.php?reqact=adminlogout" class="nav-link px-0 align-middle">
                <i class=" fs-4 bi-box-arrow-right"></i><span class="ms-1 d-none d-sm-inline">Đăng xuất</span> </a>
        </li>
    </ul>
</div>
