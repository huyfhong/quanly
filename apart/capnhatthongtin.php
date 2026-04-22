<?php
if (!isset($_SESSION['USER'])) {
    echo "<script>window.location.href='administrator/AdminLogin.php';</script>";
    exit();
}

require_once 'administrator/element/mod/UserCls.php';
$userObj = new user();
$u = $userObj->UserGetByUsername($_SESSION['USER']);

if (!$u) {
    echo "<div class='container my-5 text-center'><div class='alert alert-danger'>Không tìm thấy thông tin người dùng.</div></div>";
    exit();
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0"><i class="fa-solid fa-user-gear me-2"></i>Cập nhật thông tin cá nhân</h5>
                </div>
                <div class="card-body p-4">
                    <form action="administrator/element/mUser/userAct.php?reqact=userupdate_frontend" method="post">
                        <input type="hidden" name="iduser" value="<?php echo $u->iduser; ?>">
                        <input type="hidden" name="username" value="<?php echo $u->username; ?>">
                        <input type="hidden" name="password_old" value="<?php echo $u->password; ?>">
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tên đăng nhập</label>
                                <input type="text" class="form-control bg-light" value="<?php echo $u->username; ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Họ và tên</label>
                                <input type="text" class="form-control" name="hoten" value="<?php echo htmlspecialchars($u->hoten); ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mật khẩu mới (để trống nếu không đổi)</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Giới tính</label>
                                <div class="mt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="male" value="1" <?php echo ($u->gioitinh == 1) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gioitinh" id="female" value="0" <?php echo ($u->gioitinh == 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Ngày sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" value="<?php echo $u->ngaysinh; ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Số điện thoại</label>
                                <input type="tel" class="form-control" name="dienthoai" value="<?php echo htmlspecialchars($u->dienthoai); ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($u->email); ?>" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Địa chỉ</label>
                            <textarea class="form-control" name="diachi" rows="3"><?php echo htmlspecialchars($u->diachi); ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="index.php" class="btn btn-outline-secondary px-4 me-md-2">Hủy bỏ</a>
                            <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (isset($_GET['result'])) {
    if ($_GET['result'] == 'ok') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: 'Thông tin cá nhân đã được cập nhật!',
                confirmButtonColor: '#0d6efd'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'user_profile.php';
                }
            });
        </script>";
    } else if ($_GET['result'] == 'notok') {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Thất bại',
                text: 'Có lỗi xảy ra trong quá trình cập nhật!',
                confirmButtonColor: '#0d6efd'
            });
        </script>";
    }
}
?>