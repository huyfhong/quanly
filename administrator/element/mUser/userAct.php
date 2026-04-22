<?php
session_start();
require '../../element/mod/UserCls.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Đường dẫn đến PHPMailer (nằm ở thư mục gốc /vendor)
require '../../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/phpmailer/src/SMTP.php';

if(isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            // xu ly thêm từ trang quản trị
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $email = $_POST['email'] ?? ''; // Nhận email nếu có
            $userObj = new user();
            $kq= $userObj->UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email);
            if($kq) {
                header('location:../../index.php?req=userView&result=ok');
            }else {
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'userregister':
            // Xử lý đăng ký từ form ngoài
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $email = $_POST['email'];
            
            $userObj = new user();
            if ($userObj->CheckUsername($username)) {
                header('location:../../AdminLogin.php?register_result=exists');
            } else {
                $kq = $userObj->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $email);
                if ($kq) {
                    // Gửi email chào mừng bằng PHPMailer
                    // File config.ini nằm ở administrator/element/mod/config.ini
                    // File này nằm ở administrator/element/mUser/userAct.php -> ../mod/config.ini
                    $config = parse_ini_file('../mod/config.ini');
                    $mail = new PHPMailer(true);

                    try {
                        // Cấu hình Server
                        $mail->isSMTP();
                        $mail->Host       = $config['mail_host'];
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $config['mail_username'];
                        $mail->Password   = $config['mail_password'];
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = $config['mail_port'];
                        $mail->CharSet    = 'UTF-8';

                        // Người gửi & Người nhận
                        $mail->setFrom($config['mail_from_address'], $config['mail_from_name']);
                        $mail->addAddress($email, $hoten);

                        // Nội dung Email
                        $mail->isHTML(true);
                        $mail->Subject = 'Chào mừng bạn đến với hệ thống của chúng tôi!';
                        $mail->Body    = "
                            <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                                <h2 style='color: #0d6efd;'>Xin chào $hoten!</h2>
                                <p>Cảm ơn bạn đã tin tưởng và đăng ký tài khoản tại hệ thống của chúng tôi.</p>
                                <div style='background: #f8f9fa; padding: 15px; border-radius: 5px; border: 1px solid #ddd;'>
                                    <p style='margin: 0;'><b>Thông tin tài khoản:</b></p>
                                    <ul style='margin-top: 10px;'>
                                        <li><b>Tên đăng nhập:</b> $username</li>
                                        <li><b>Email:</b> $email</li>
                                    </ul>
                                </div>
                                <p>Bạn có thể sử dụng thông tin trên để đăng nhập và mua sắm ngay bây giờ.</p>
                                <p>Chúc bạn có những trải nghiệm tuyệt vời nhất!</p>
                                <hr style='border: 0; border-top: 1px solid #eee;'>
                                <p style='font-size: 0.8rem; color: #777;'>Đây là email tự động, vui lòng không trả lời email này.</p>
                                <p style='font-weight: bold;'>Trân trọng,<br>Ban quản trị hệ thống.</p>
                            </div>
                        ";

                        $mail->send();
                    } catch (Exception $e) {
                        // Bỏ qua lỗi gửi mail để không làm gián đoạn việc đăng ký
                    }
                    header('location:../../AdminLogin.php?register_result=ok');
                } else {
                    header('location:../../AdminLogin.php?register_result=notok');
                }
            }
            break;

        case 'deleteuser':
            $iduser = $_GET['iduser'];
            $userObj = new user();
            $kq = $userObj->UserDelete($iduser);
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'setlock':
            $iduser = $_GET['iduser'];
            $setlock = $_GET['setlock'];
            $userObj = new user();
            if($setlock == 0){
                $kq = $userObj->UserSetActive($iduser,1);
            }else{
                $kq = $userObj->UserSetActive($iduser,0);
            }
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'updateuser':
            $iduser = $_POST['iduser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $email = $_POST['email'];
            $userObj = new user();
            $kq= $userObj->UserUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$dienthoai,$email,$iduser);
            if($kq){
                header('location:../../index.php?req=userView&result=ok');
            }else{
                header('location:../../index.php?req=userView&result=notok');
            }
            break;

        case 'userchecklogin':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userObj = new user();
            if ($userObj->UserCheckLogin($username, $password)) {
                $_SESSION['USER'] = $username;
                header('Location: ../../index.php');
            } else {
                header('Location: ../../AdminLogin.php?error=1');
            }
            break;

        case 'userlogout':
            $timelogin = date('h:i - d/m/y');
            if (isset($_SESSION['USER'])) {
                $namelogin = $_SESSION['USER'];
            } else if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
            }
            
            if(isset($namelogin)) {
                setcookie($namelogin,$timelogin,time()+(86400*30),'/');
            }

            session_destroy();
            header('location:../../index.php');
            break;
            
        case 'userupdate_frontend':
            $iduser = $_POST['iduser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_old = $_POST['password_old'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $email = $_POST['email'];

            if (empty($password)) {
                $password = $password_old;
            }

            $userObj = new user();
            $kq = $userObj->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $email, $iduser);
            if ($kq) {
                header('location:../../../user_profile.php?result=ok');
            } else {
                header('location:../../../user_profile.php?result=notok');
            }
            break;

        default :
            header('location:../../index.php?req=userView');
            break;
    }
} else {
    header('location:../../index.php');
} 
?>