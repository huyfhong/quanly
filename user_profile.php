<?php
session_start();
if (!isset($_SESSION['USER'])) {
    header('Location: administrator/AdminLogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/3b96751dc8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="administrator/js/jquery-3.7.1.min.js"></script>
    <link type="text/css" rel="stylesheet" href="TNCcss.css"/>
    <title>Thông tin cá nhân - TNC</title>
</head>
<body>
    <section class="header-mid shadow-sm mb-4">
      <?php require './apart/header-mid.php'; ?>
    </section>

    <main class="container py-5">
        <?php require './apart/capnhatthongtin.php'; ?>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p class="mb-0">&copy; 2026 TNC Store. Tất cả các quyền được bảo lưu.</p>
        </div>
    </footer>
</body>
</html>