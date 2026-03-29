<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Trị Kho</title>
    
    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="admin.css"/>
</head>
<body>
    <?php
    if (!isset($_SESSION['ADMIN'])) {
       header('location:AdminLogin.php');
       exit();
    }
    ?>
    
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <div class="col-auto col-md-3 col-xl-2 px-0 sidebar">
                <?php require './element/sidebar.php';?>
            </div>
            
            <!-- Main Content Area -->
            <div class="col py-3 px-md-4">
                <div class="main-content-wrapper">
                    <div class="main-content">
                        <?php require './element/center.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    
    <script>
        // Hàm xác nhận xóa toàn cục sử dụng SweetAlert2
        function confirmDelete(url) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Hành động này không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Vâng, xóa nó!',
                cancelButtonText: 'Hủy bỏ',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }

        // Tự động thêm active class cho sidebar dựa trên URL
        document.addEventListener("DOMContentLoaded", function() {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll(".sidebar .nav-link");
            
            navLinks.forEach(link => {
                if (currentUrl.includes(link.getAttribute("href"))) {
                    link.classList.add("active");
                    // Mở menu cha nếu là menu con
                    const parentCollapse = link.closest(".collapse");
                    if (parentCollapse) {
                        parentCollapse.classList.add("show");
                        const toggleBtn = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
                        if (toggleBtn) toggleBtn.classList.remove("collapsed");
                    }
                }
            });
        });
    </script>
</body>
</html>
