<?php
if(isset($_GET['req'])){
    $request = $_GET['req'];
    switch ($request) {
        case 'AdminView':
            require './element/mAdmin/AdminView.php';
            break;    
        case 'updateadmin':
            require './element/mAdmin/AdminUpdate.php';
            break;
        case 'userView':
            require './element/mUser/userView.php';
            break;
        case 'updateuser':
            require './element/mUser/userUpdate.php';
            break;
        case 'loaihangView':
            require './element/mLoaihang/loaihangview.php';
            break;
        case 'updateloaihang':
            require './element/mLoaihang/loaihangUpdate.php';
            break;
        case 'hanghoaView':
            require './element/mhanghoa/hanghoaview.php';
            break; 
        case 'hanghoaUpdate' :
            require './element/mhanghoa/hanghoaUpdate.php';
            break;
        case 'thuoctinhView':
            require './element/mThuoctinh/thuoctinhView.php';
            break;
        case 'thuoctinhUpdate':
            require './element/mThuoctinh/thuoctinhUpdate.php';
            break;
        case 'thuoctinh_hanghoaView':
            require './element/mThuoctinh_hanghoa/thuoctinh_hanghoaView.php';
            break;
        case 'thuoctinh_hanghoaUpdate':
            require './element/mThuoctinh_hanghoa/thuoctinh_hanghoaUpdate.php';
            break;
        case 'giaView':
            require './element/mGia/Giaview.php';
            break;
        case 'giaUpdate':
            require './element/mGia/GiaUpdate.php';
            break;
        case 'chungtunhapView':
            require './element/mChungtunhap/chungtunhapView.php';
            break;   
        case 'chungtunhapUpdate':
            require './element/mChungtunhap/chungtunhapUpdate.php';
            break;
        case 'CTchungtunhapView';
            require './element/mCTchungtunhap/CTchungtunhapView.php';
            break;
        case 'CTchungtunhapUpdate';
            require './element/mCTchungtunhap/CTchungtunhapUpdate.php';
            break;    
        case 'chungtuxuatView':
            require './element/mChungtuxuat/chungtuxuatView.php';
            break;   
        case 'chungtuxuatUpdate':
            require './element/mChungtuxuat/chungtuxuatUpdate.php';
            break;
            case 'CTchungtuxuatView';
            require './element/mCTchungtuxuat/CTchungtuxuatView.php';
            break;
        case 'CTchungtuxuatUpdate';
            require './element/mCTchungtuxuat/CTchungtuxuatUpdate.php';
            break; 
        case 'donhangView';
            require './element/mdonhang/donhangView.php';
            break;
        case 'donhangUpdate';
            require './element/mdonhang/donhangUpdate.php';
            break;
        case 'CTdonhangView';
            require './element/mCTdonhang/CTdonhangView.php';
            break;
        case 'CTdonhangUpdate';
            require './element/mCTdonhang/CTdonhangUpdate.php';
            break;  
        case 'thongkeView':
            require './element/mThongke/thongkeView.php';
            break;
        default:
            require './element/default.php';
            break;
    }
} else {
    require './element/default.php';
}
?>