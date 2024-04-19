<?php
// Giả lập dữ liệu được gửi từ form sửa thông tin phụ tùng và hình ảnh
$_SERVER["REQUEST_METHOD"] = "POST";
$_POST["partId"] = 1;
$_POST["tenPhuTung"] = "Phụ tùng A";
$_POST["soLuong"] = 20;
$_POST["gia"] = 75000;
$_POST["maKhachHang"] = 1;
$_POST["maNhanVien"] = 1;
$_POST["maLichHen"] = 1;

// Giả lập dữ liệu về hình ảnh
$_FILES["anhPhuTung"]["name"] = "phutung_updated.jpg";
$_FILES["anhPhuTung"]["type"] = "image/jpeg";
$_FILES["anhPhuTung"]["size"] = 200000;
$_FILES["anhPhuTung"]["tmp_name"] = "tmp/phutung_updated.jpg";
$_FILES["anhPhuTung"]["error"] = UPLOAD_ERR_OK;

// Gọi lại mã để xử lý form sửa thông tin phụ tùng và hình ảnh
require_once("./xulysuaphutung.php");

// Kiểm tra xem thông báo "Sửa thông tin phụ tùng và hình ảnh thành công!" được hiển thị hay không
if (strpos($output, "Sửa thông tin phụ tùng và hình ảnh thành công!") !== false) {
    echo "Testcase thành công: Đã sửa thông tin phụ tùng và hình ảnh thành công!\n";
} else {
    echo "Testcase thất bại: Không thể sửa thông tin phụ tùng và hình ảnh!\n";
}
