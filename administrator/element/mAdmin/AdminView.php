<?php
require './element/mod/AdminCls.php';
$obj_Admin = new admin();

// Lấy từ khóa tìm kiếm
$keyword = isset($_GET['search']) ? $_GET['search'] : '';

if ($keyword != '') {
    $list_Admin = $obj_Admin->AdminSearch($keyword);
} else {
    $list_Admin = $obj_Admin->AdminGetAll();
}

$l = count($list_Admin);
?>

<div class="card shadow-sm mb-4">
    <div class="card-header-custom">
        <h5 class="mb-0"><i class="bi bi-person-badge me-2"></i>Quản lý Admin</h5>
    </div>
    <div class="card-body">
        <form name="newadmin" id="formreg" method="post" action='./element/mAdmin/AdminAct.php?reqact=addnew'>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Tên Đăng Nhập</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="adminname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Mật Khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Nhập password" name="password" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Họ Và Tên</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập họ và tên" name="hoten" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Ngày Sinh</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                        <input type="date" class="form-control" name="ngaysinh" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Địa Chỉ</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="diachi">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Số Điện Thoại</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input type="tel" class="form-control" placeholder="Nhập SDT" name="dienthoai">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Nhập email" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-block">Giới Tính</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="1" id="gender_male" checked>
                        <label class="form-check-label" for="gender_male">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioitinh" value="0" id="gender_female">
                        <label class="form-check-label" for="gender_female">Nữ</label>
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
            <h5 class="mb-0 text-primary"><i class="bi bi-list-ul me-2"></i>Danh sách Admin</h5>
            <div class="d-flex align-items-center">
                <form class="d-flex me-3" role="search" method="get" action="./index.php">
                    <input type="hidden" name="req" value="AdminView">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Tìm kiếm admin..." aria-label="Search" name="search" value="<?php echo htmlspecialchars($keyword); ?>">
                        <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        <?php if ($keyword != ''): ?>
                            <a href="./index.php?req=AdminView" class="btn btn-outline-secondary" title="Xóa tìm kiếm"><i class="bi bi-x"></i></a>
                        <?php endif; ?>
                    </div>
                </form>
                <span class="badge bg-secondary rounded-pill"><?php echo $l; ?> Admin</span>
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
                        <th scope="col">AdminName</th>
                        <th scope="col">Họ và Tên</th>
                        <th scope="col">Giới Tính</th>
                        <th scope="col">Ngày Sinh</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ngày ĐK</th>
                        <th scope="col">Khóa</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_Admin as $v): ?>
                    <tr>
                        <td class="text-center fw-bold"><?php echo $v->idadmin;?></td>
                        <td><?php echo $v->adminname;?></td>
                        <td><?php echo $v->hoten;?></td>
                        <td class="text-center">
                            <?php if ($v->gioitinh == 0): ?>
                                <i class="bi bi-gender-female text-danger fs-5"></i>
                            <?php else: ?>
                                <i class="bi bi-gender-male text-primary fs-5"></i>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $v->ngaysinh;?></td>
                        <td><?php echo $v->diachi;?></td>
                        <td><?php echo $v->dienthoai;?></td>
                        <td><?php echo $v->email;?></td>
                        <td><?php echo date("d/m/Y", strtotime($v->ngaydangky));?></td>
                        <td class="text-center">
                            <a href="./element/mAdmin/AdminAct.php?reqact=setlock&idadmin=<?php echo $v->idadmin; ?>&setlock=<?php echo $v->setlock;?>" 
                               class="btn btn-action <?php echo $v->setlock == 0 ? 'btn-outline-success' : 'btn-outline-warning'; ?>">
                                <?php if($v->setlock == 0): ?>
                                    <i class="bi bi-unlock-fill"></i>
                                <?php else: ?>
                                    <i class="bi bi-lock-fill"></i>
                                <?php endif; ?>
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="btn-action-group">
                                <a href="javascript:void(0);" onclick="confirmDelete('./element/mAdmin/AdminAct.php?reqact=deleteadmin&idadmin=<?php echo $v->idadmin;?>')" 
                                   class="btn btn-outline-danger btn-action" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="./index.php?req=updateadmin&idadmin=<?php echo $v->idadmin;?>" 
                                   class="btn btn-outline-primary btn-action" title="Cập nhật">
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
            <div class="alert alert-info m-3 text-center">Chưa có dữ liệu admin.</div>
        <?php endif; ?>
    </div>
</div>
