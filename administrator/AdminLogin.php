<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    <style>
        /* ... existing styles ... */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        .login-wrapper {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .login-card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            background-color: #fff;
            max-width: 420px;
            width: 100%;
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-card-header {
            padding: 2.5rem 2rem 1.5rem;
            text-align: center;
        }

        .login-card-header i {
            font-size: 3.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
            display: block;
        }

        .login-card-header h3 {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .login-card-body {
            padding: 0 2.5rem 2.5rem;
        }

        .btn-login {
            background: #0d6efd;
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }

        .form-floating > .form-control:focus ~ label {
            color: #0d6efd;
        }

        /* Modal Customization */
        .modal-content {
            border: none;
            border-radius: 1rem;
        }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
            border-radius: 1rem 1rem 0 0;
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-card-header">
                <i class="fa-solid fa-circle-user"></i>
                <h3>Đăng Nhập</h3>
            </div>
            <div class="login-card-body">
                <form name="login" method="post" action="./element/mAdmin/AdminAct.php?reqact=checklogin">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="adminname" id="Adminname" placeholder="Tên đăng nhập" required autofocus>
                        <label for="Adminname"><i class="fa-solid fa-user me-2"></i>Tên đăng nhập</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu" required>
                        <label for="password"><i class="fa-solid fa-lock me-2"></i>Mật khẩu</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                        ĐĂNG NHẬP NGAY
                    </button>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#registerModal" class="text-primary small text-decoration-none">
                            <i class="fa-solid fa-user-plus me-1"></i>Đăng ký tài khoản
                        </a>
                        <a href="../index.php" class="text-muted small text-decoration-none">
                            <i class="fa-solid fa-arrow-left me-1"></i>Quay lại trang chủ
                        </a>
                    </div>
                </form>
            </div>
            <div class="bg-light py-3 text-center border-top">
                <span class="text-muted smaller" style="font-size: 0.75rem;">&copy; 2025 Bản quyền thuộc về Huy Phong</span>
            </div>
        </div>
    </div>

    <!-- Modal Đăng ký -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header py-3">
                    <h5 class="modal-title fw-bold" id="registerModalLabel">
                        <i class="fa-solid fa-user-plus text-primary me-2"></i>Đăng ký tài khoản mới
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="./element/mUser/userAct.php?reqact=userregister" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">Tên Đăng Nhập</label>
                                <input type="text" class="form-control" name="username" placeholder="Ví dụ: user123" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">Mật Khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">Họ Và Tên</label>
                                <input type="text" class="form-control" name="hoten" placeholder="Nhập họ và tên đầy đủ" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">Địa Chỉ Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Ví dụ: name@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">Ngày Sinh</label>
                                <input type="date" class="form-control" name="ngaysinh" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted">Giới Tính</label>
                                <select class="form-select" name="gioitinh">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">Số Điện Thoại</label>
                                <input type="tel" class="form-control" name="dienthoai" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted">Địa Chỉ</label>
                                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ của bạn">
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-light px-4 me-2" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary px-4">ĐĂNG KÝ NGAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Hiển thị thông báo dựa trên tham số URL
        const urlParams = new URLSearchParams(window.location.search);
        
        if (urlParams.has('register_result')) {
            const result = urlParams.get('register_result');
            if (result === 'ok') {
                Swal.fire({
                    title: 'Đăng ký thành công!',
                    text: 'Bạn có thể dùng tài khoản vừa tạo để đăng nhập.',
                    icon: 'success',
                    confirmButtonText: 'Tuyệt vời'
                });
            } else if (result === 'exists') {
                Swal.fire({
                    title: 'Lỗi đăng ký!',
                    text: 'Tên đăng nhập này đã tồn tại trên hệ thống.',
                    icon: 'warning',
                    confirmButtonText: 'Thử tên khác'
                });
            } else {
                Swal.fire({
                    title: 'Lỗi đăng ký!',
                    text: 'Có lỗi xảy ra trong quá trình xử lý, vui lòng thử lại.',
                    icon: 'error',
                    confirmButtonText: 'Đã hiểu'
                });
            }
        }

        if (urlParams.has('error')) {
            Swal.fire({
                title: 'Đăng nhập thất bại!',
                text: 'Tài khoản hoặc mật khẩu không chính xác.',
                icon: 'error',
                confirmButtonText: 'Thử lại'
            });
        }
    </script>
</body>
</html>
