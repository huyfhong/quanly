
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3b96751dc8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="administrator/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="administrator/js/jsTNC.js"></script>
    <link type="text/css" rel="stylesheet" href="TNCcss.css"/>
    <title>TNC</title>
<div class="container py-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <img src="https://www.tncstore.vn/media/product/250-11834-pc-do-hoa-ai-ryzen-9-9950x-rtx-5090--1-.jpg" class="card-img-top" alt="Product Image">

            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="h2 mb-3">echo tenhanghoa</h1>
            <div class="mb-3">
                <span class="h4 me-2">echo gia 121313</span>
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
                    <span class="text-muted">(128 reviews)</span>
                </div>
            </div>

            <p class="mb-4">echo mota</p>

           

            <!-- Quantity -->
            <div class="mb-4">
                <div class="d-flex align-items-center">
                    <label class="me-2">so luong:</label>
                    <select class="form-select w-auto">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button">Add to Cart</button>
            </div>

            <!-- Additional Info -->
            <div class="mt-4">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-truck text-primary me-2"></i>
                    <span>Free shipping on orders over $50</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-undo text-primary me-2"></i>
                    <span>30-day return policy</span>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-shield-alt text-primary me-2"></i>
                    <span>2-year warranty</span>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container">
<div class="product-details">
    <center>
        <!-- Hiển thị hình ảnh sản phẩm -->
        <img class="product-image" style="width:450px"   src="data:image/png;base64,<?php echo ($l->hinhanh); ?>" alt="Hình ảnh sản phẩm">
        
        <!-- Hiển thị tên và mô tả sản phẩm -->
        <h1><?php echo ($l->tenhanghoa); ?></h1>
          <!-- Hiển thị đơn giá -->
        <h4><p><strong>Đơn giá:</strong> 
        <?php 
        if ($dongia !== null) {
            $dongia = (int)$dongia;

            echo number_format($dongia,0,',', '.');
        } else {
            echo "Không có thông tin giá.";
        }
        ?> đ
        </p></h4>
        <p><strong>Mô tả:</strong> <?php echo ($l->mota); ?></p>
        <!-- Hiển thị thuộc tính và giá trị thuộc tính -->
        <p><b>Thuộc tính:</b></p>
        <ul>
            <?php foreach ($listtt_hh as $p) : ?>
                <?php if ($p->idhanghoa == $idhanghoa) : ?>
                    
                        <p><strong><?php echo ($tt->thuoctinhGetById($p->idthuoctinh)->tenthuoctinh); ?>:</strong>
                        <?php echo ($p->giatri); ?></p>
                
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <form name="giohangaddnew" id="addnewgiohang" action='./apart/giohangAct.php?reqact=addnew' method="POST">
    <input type="hidden" name="idhanghoa" value="<?php echo $idhanghoa; ?>">
    <input type="hidden" name="tenhanghoa" value="<?php echo $l->tenhanghoa; ?>">
    <input type="hidden" name="dongia" value="<?php echo $dongia; ?>">
    <input type="hidden" name="hinhanh" value="<?php echo $l->hinhanh; ?>"> <!-- Lưu hình ảnh -->
    <label for="soluong">Số lượng:</label>
    <input type="number" min="1" name="soluong" value="1" required>
    <button type="submit" class="btn btn-primary btn-sm">Thêm vào giỏ hàng</button>
</form>

        

        <!-- Nút quay lại -->
        <button class="btn btn-primary" onclick="goback()">Quay lại</button>
  
    </center>
</div>
</div>
