<script>
    function goback() {
        window.history.back();
    }
</script>

<?php
// Import các lớp cần thiết
require './administrator/element/mod/hanghoaCls.php';
require './administrator/element/mod/ThuoctinhCls.php';
require './administrator/element/mod/Thuoctinh_hanghoaCls.php';
require './administrator/element/mod/GiaCls.php';

// Khởi tạo các đối tượng
$g = new gia();
$hh = new hanghoa();
$tt = new thuoctinh();
$tt_hh = new thuoctinh_hanghoa();

// Kiểm tra và lấy thông tin sản phẩm
if (isset($_GET['reqHanghoa'])) {
    $idhanghoa = $_GET['reqHanghoa'];
    $l = $hh->HanghoaGetbyId($idhanghoa); // Lấy thông tin sản phẩm

    if (!$l) {
        echo "<p>Không tìm thấy sản phẩm.</p>";
        exit;
    }
    // Lấy thông tin thuộc tính và thuộc tính hàng hóa
    $list_tt = $tt->thuoctinhGetAll();
    $listtt_hh = $tt_hh->Thuoctinh_hanghoaGetAll();
} else {
    echo "<p>Không có sản phẩm được chọn.</p>";
    exit;
}
// Lấy thông tin đơn giá liên quan đến sản phẩm từ bảng giá
$dongia = null; // Khởi tạo biến để lưu giá
$list_g = $g->GiaGetAll();
foreach ($list_g as $gia) {
    if ($gia->idhanghoa == $idhanghoa) { // Kiểm tra giá thuộc về sản phẩm hiện tại
        $dongia = $gia->dongia;
        break;
    }
}
?>
<div class="container py-5">
    <div class="row">
        <!-- anh hang hoa -->
        <div class="col-md-6 mb-4">  
            <div class="card">
            <img class="product-image" src="data:image/png;base64,<?php echo ($l->hinhanh); ?>" alt="Hình ảnh sản phẩm">

            </div>
        </div>

        <!-- chi tiet hang hoa -->
        <div class="col-md-6">
        
            <h1 class="h2 mb-3"><?php echo ($l->tenhanghoa); ?></h1>
            <div class="mb-3">
        <span class="h4 me-2"> <?php 
        if ($dongia !== null) {
            $dongia = (int)$dongia;

            echo number_format($dongia,0,',', '.');
        } else {
            echo "Không có thông tin giá.";
        }
        ?> đ
        </span>
            </div>
            <div class="mb-3">
                <div class="d-flex align-items-center">
                    <div class="text-warning me-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="text-muted">(128 đánh giá)</span>
                </div>
            </div>
            <p class="mb-4"> <?php echo ($l->mota); ?></p>
            <!-- so luong -->
            <div class="mb-4">
                <div class="d-flex align-items-center">
                <form name="giohangaddnew" id="addnewgiohang" action='./apart/giohangAct.php?reqact=addnew' method="POST" onsubmit="return checkLoginBeforeAddToCart()">
                    <input type="hidden" name="idhanghoa" value="<?php echo $idhanghoa; ?>">
                    <input type="hidden" name="tenhanghoa" value="<?php echo $l->tenhanghoa; ?>">
                    <input type="hidden" name="dongia" value="<?php echo $dongia; ?>">
                    <input type="hidden" name="hinhanh" value="<?php echo $l->hinhanh; ?>"> <!-- Lưu hình ảnh -->
                    <label for="soluong" class="me-2">Số lượng:</label>
                    <input type="number" class="form-control" name="soluong" value="1" min="1" max="10"  style="width: 80px;" required>
                </div>
            </div>

            <!-- them vao gio hang -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit">Thêm vào giỏ hàng</button>
            </div>
            </form>

            <script>
            function checkLoginBeforeAddToCart() {
                <?php if(!isset($_SESSION['USER'])): ?>
                    alert("Vui lòng đăng nhập để thực hiện thao tác thêm vào giỏ hàng!");
                    window.location.href = "administrator/AdminLogin.php";
                    return false;
                <?php else: ?>
                    return true;
                <?php endif; ?>
            }
            </script>

            <!-- thuoc tinh -->
            <div class="mt-4">
            <?php foreach ($listtt_hh as $p) : ?>
                <?php if ($p->idhanghoa == $idhanghoa) : ?>
                    
                        <p><strong><?php echo ($tt->thuoctinhGetById($p->idthuoctinh)->tenthuoctinh); ?>:</strong>
                        <?php echo ($p->giatri); ?></p>
                
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
        </div>
        <a class=" link-dark text-center link-underline-opacity-0 link-underline-opacity-100-hover  " onclick="goback()">Quay lại</a>
    </div>
    
</div>