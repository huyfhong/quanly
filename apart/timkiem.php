<?php
require './administrator/element/mod/hanghoaCls.php';
$hanghoa = new hanghoa();


if (isset($_GET['search'])) {
    $searchhanghoa = $_GET['search'];
    $list_hanghoa = $hanghoa->HanghoaSearch($searchhanghoa);
    $count = count($list_hanghoa);
} else {
    $list_hanghoa = $hanghoa->HanghoaGetAll();
    $count = count($list_hanghoa);
}
?>
<div class="container mt-4">
    <?php
    if ($count > 0) {
        foreach ($list_hanghoa as $item) {
            ?>
            <div class="card mb-10 itemsHanghoa">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="imgHanghoa card-img" src="data:image/png;base64,<?php echo $item->hinhanh; ?>" alt="<?php echo $item->tenhanghoa; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item->tenhanghoa; ?></h5>

                            <p class="card-text"></p>
                            <a href="./index.php?reqHanghoa=<?php echo $item->idhanghoa; ?>" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center'>Không tìm thấy sản phẩm nào.</p>";
    }
    ?>
</div>
