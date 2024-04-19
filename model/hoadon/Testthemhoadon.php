<?php
// Kết nối đến CSDL ở đây
$server = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sql_car";

// Khởi tạo kết nối
$conn = new mysqli($server, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt encoding UTF-8 để tránh lỗi hiển thị tiếng Việt
mysqli_query($conn, "SET NAMES 'UTF8'");
// Test case cho trường hợp thành công khi thêm hóa đơn
$_POST['maNhanVien'] = 'NV123';
$_POST['maKhachHang'] = 'KH456';
$_POST['maLichHen'] = 'LH789';
$_POST['maXe'] = 'X123';
$_POST['maDichVu'] = 'DV456';
$_POST['soLuongPhuTung'] = 5;
$_POST['giaPhuTung'] = 100000;

// Gọi lại mã để thêm hóa đơn
require_once("./themhoadon.php");
$output = ' ';

// Kiểm tra xem thông báo "Hóa đơn đã được thêm thành công!" được hiển thị hay không
if (strpos($output, "Hóa đơn đã được thêm thành công!") !== false) {
    echo "Successful Add Test Passed!\n";
} else {
    echo "Successful Add Test Failed!\n";
}

// Test case cho trường hợp không tìm thấy mã nhân viên
$_POST['maNhanVien'] = 'Nhan Vien Khong Ton Tai';
$_POST['maKhachHang'] = 'KH456';
$_POST['maLichHen'] = 'LH789';
$_POST['maXe'] = 'X123';
$_POST['maDichVu'] = 'DV456';
$_POST['soLuongPhuTung'] = 5;
$_POST['giaPhuTung'] = 100000;

// Gọi lại mã để thêm hóa đơn
require_once("./themhoadon.php");

// Kiểm tra xem thông báo "Lỗi: ..." có xuất hiện hay không (do lỗi trong quá trình thêm hóa đơn)
if (strpos($output, "Lỗi:") !== false) {
    echo "Employee Not Found Test Passed!\n";
} else {
    echo "Employee Not Found Test Failed!\n";
}
