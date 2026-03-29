<?php
session_start();
require './administrator/element/mod/loaihangCls.php';
?>
<?php
$tonghanghoa = 0;
if (isset($_SESSION['giohang'])) {
    foreach ($_SESSION['giohang'] as $item) {
        $tonghanghoa += $item['soluong'];
    }
}
?>

<style>
.mega-menu-wrapper {
    position: relative;
    display: inline-block;
}
.btn-danhmuc {
    background: transparent;
    border: none;
    color: #fff;
    font-weight: 600;
    font-size: 15px;
    padding: 6px 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: background 0.2s;
    border-radius: 4px;
    white-space: nowrap;
}
.btn-danhmuc:hover {
    background: rgba(255,255,255,0.12);
    color: #fff;
}
.mega-dropdown {
    display: none;
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    z-index: 9999;
    background: #1e2a3a;
    border-radius: 0 8px 8px 8px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.45);
    min-width: 260px;
}
.mega-menu-wrapper.open .mega-dropdown {
    display: flex;
}
.mega-left {
    width: 260px;
    flex-shrink: 0;
    border-right: 1px solid rgba(255,255,255,0.07);
    padding: 6px 0;
}
.mega-left-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 18px;
    color: #cdd5e0;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.15s, color 0.15s;
    text-decoration: none;
    white-space: nowrap;
}
.mega-left-item:hover {
    background: #243447;
    color: #fff;
}
.mega-left-item .arrow {
    font-size: 11px;
    color: #7a8fa6;
    margin-left: 8px;
}
</style>

<div class="container">

    <!-- logo + Search + Tài khoản -->
    <div class="row align-items-center">
        <div class="col-auto py-2">
            <a href="index.php"><img width="150px" src="img/logotnc.png" alt="Logo"></a>
        </div>
        <div class="col py-2">
            <form method="GET" action="./index.php" class="d-flex align-items-center">
                <div class="input-group">
                    <input type="text" class="form-control" name="search"
                        placeholder="Tìm kiếm sản phẩm"
                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                        aria-label="Tìm kiếm sản phẩm">
                    <button class="btn btn-primary" type="submit">
                        Tìm kiếm <i class="fa-solid fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-auto py-2 text-end">
            <div class="dropdown d-inline-block me-3">
                <button class="btn btn-light dropdown-toggle" type="button"
                        id="dropdownAccount" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php if (isset($_SESSION['USER'])): ?>
                        <i class="fa-solid fa-user-check text-success"></i> <?php echo $_SESSION['USER']; ?>
                    <?php else: ?>
                        <i class="fa-solid fa-user"></i> Tài khoản
                    <?php endif; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownAccount">
                    <?php if (isset($_SESSION['USER'])): ?>
                        <li><h6 class="dropdown-header">Xin chào, <?php echo $_SESSION['USER']; ?></h6></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger"
                               href="administrator/element/mAdmin/AdminAct.php?reqact=userlogout">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất
                        </a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="administrator/AdminLogin.php">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Đăng nhập
                        </a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <a class="btn btn-light position-relative" href="./apart/viewGiohang.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                    <?php echo $tonghanghoa; ?>
                </span>
            </a>
        </div>
    </div>

    <!-- danh muc -->
    <div class="row" style="margin-top: -4px;">
        <div class="col-auto pb-2">
            <div class="mega-menu-wrapper" id="megaMenuWrapper">
                <button class="btn-danhmuc" id="btnDanhmuc" type="button">
                    <i class="fa-solid fa-bars"></i> Danh Mục Sản Phẩm
                </button>
                <div class="mega-dropdown" id="megaDropdown">
                    <div class="mega-left">
                        <?php
                        $lh = new loaihang();
                        $list_lh = $lh->LoaihangGetAll();
                        foreach ($list_lh as $v):
                        ?>
                        <a class="mega-left-item"
                           href="./index.php?reqView=<?php echo $v->idloaihang; ?>">
                            <?php echo htmlspecialchars($v->tenloaihang); ?>
                            <i class="fa-solid fa-chevron-right arrow"></i>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
(function () {
    var wrapper = document.getElementById('megaMenuWrapper');
    var btn     = document.getElementById('btnDanhmuc');
    btn.addEventListener('click', function (e) {
        e.stopPropagation();
        wrapper.classList.toggle('open');
    });
    document.addEventListener('click', function (e) {
        if (!wrapper.contains(e.target)) {
            wrapper.classList.remove('open');
        }
    });
})();
</script>