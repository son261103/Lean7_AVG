<?php
// Test case cho trường hợp thành công khi sửa dịch vụ
$_POST['maDichVu'] = 1;
$_POST['tenKhachHang'] = 'Nguyen Van A';
$_POST['tenNhanVien'] = 'Nguyen Van B';
$_POST['moTa'] = 'Mô tả mới';
$_POST['gia'] = 100000;

// Gọi lại mã để sửa dịch vụ
require_once("./suadichvu.php");
$output = ' ';

// Kiểm tra xem thông báo "Sửa dịch vụ thành công!" được hiển thị hay không
if (strpos($output, "Sửa dịch vụ thành công!") !== false) {
    echo "Successful Update Test Passed!\n";
} else {
    echo "Successful Update Test Failed!\n";
}

// Test case cho trường hợp không tìm thấy mã khách hàng
$_POST['maDichVu'] = 1;
$_POST['tenKhachHang'] = 'Khach Hang Khong Ton Tai';
$_POST['tenNhanVien'] = 'Nguyen Van B';
$_POST['moTa'] = 'Mô tả mới';
$_POST['gia'] = 100000;

// Gọi lại mã để sửa dịch vụ
require_once("./suadichvu.php");

// Kiểm tra xem thông báo "Không tìm thấy mã khách hàng." được hiển thị hay không
if (strpos($output, "Không tìm thấy mã khách hàng.") !== false) {
    echo "Customer Not Found Test Passed!\n";
} else {
    echo "Customer Not Found Test Failed!\n";
}

// Test case cho trường hợp không tìm thấy mã nhân viên
$_POST['maDichVu'] = 1;
$_POST['tenKhachHang'] = 'Nguyen Van A';
$_POST['tenNhanVien'] = 'Nhan Vien Khong Ton Tai';
$_POST['moTa'] = 'Mô tả mới';
$_POST['gia'] = 100000;

// Gọi lại mã để sửa dịch vụ
require_once("./suadichvu.php");

// Kiểm tra xem thông báo "Không tìm thấy mã nhân viên." được hiển thị hay không
if (strpos($output, "Không tìm thấy mã nhân viên.") !== false) {
    echo "Employee Not Found Test Passed!\n";
} else {
    echo "Employee Not Found Test Failed!\n";
}
