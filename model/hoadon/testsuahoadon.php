<?php
// Test case cho trường hợp thành công khi sửa hóa đơn
$_POST['maHoaDon'] = 'HD123';
$_POST['maNhanVien'] = 'NV123';
$_POST['maKhachHang'] = 'KH456';
$_POST['maLichHen'] = 'LH789';
$_POST['maXe'] = 'X123';
$_POST['maDichVu'] = 'DV456';
$_POST['soLuongPhuTung'] = 5;
$_POST['giaPhuTung'] = 100000;

// Gọi lại mã để sửa hóa đơn
require_once("./suahoadon.php");
$output = ' ';

// Kiểm tra xem thông báo "Sửa hóa đơn thành công!" được hiển thị hay không
if (strpos($output, "Sửa hóa đơn thành công!") !== false) {
    echo "Successful Update Test Passed!\n";
} else {
    echo "Successful Update Test Failed!\n";
}

// Test case cho trường hợp không tìm thấy mã hóa đơn
$_POST['maHoaDon'] = 'HDKhongTonTai';
$_POST['maNhanVien'] = 'NV123';
$_POST['maKhachHang'] = 'KH456';
$_POST['maLichHen'] = 'LH789';
$_POST['maXe'] = 'X123';
$_POST['maDichVu'] = 'DV456';
$_POST['soLuongPhuTung'] = 5;
$_POST['giaPhuTung'] = 100000;

// Gọi lại mã để sửa hóa đơn
require_once("./suahoadon.php");

// Kiểm tra xem thông báo "Không tìm thấy mã hóa đơn." được hiển thị hay không
if (strpos($output, "Không tìm thấy mã hóa đơn.") !== false) {
    echo "Invoice Not Found Test Passed!\n";
} else {
    echo "Invoice Not Found Test Failed!\n";
}
