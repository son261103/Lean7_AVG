<?php
// Test case cho trường hợp thành công khi thêm phụ tùng
$_POST["submit"] = true;
$_POST["tenPhuTung"] = "Phụ tùng A";
$_POST["soLuong"] = 10;
$_POST["gia"] = 50000;
$_POST["customer_id"] = 1;
$_POST["employee_id"] = 1;
$_POST["appointment_id"] = 1;

$_FILES["anhPhuTung"]["name"] = "phutung.jpg";
$_FILES["anhPhuTung"]["type"] = "image/jpeg";
$_FILES["anhPhuTung"]["size"] = 200000;
$_FILES["anhPhuTung"]["tmp_name"] = "tmp/phutung.jpg";
$_FILES["anhPhuTung"]["error"] = UPLOAD_ERR_OK;

// Gọi lại mã để thêm phụ tùng
require_once("../connection/connection.php");
require_once("./xulythemphutung.php");
$output = '';

// Kiểm tra xem thông báo "Thêm Phụ Tùng Thành Công" được hiển thị hay không
if (strpos($output, "Thêm Phụ Tùng Thành Công") !== false) {
    echo "Test Thêm Thành Công: Đã Thành Công!\n";
} else {
    echo "Test Thêm Thành Công: Thất Bại!\n";
}

// Test case cho trường hợp không chọn tệp ảnh
unset($_FILES["anhPhuTung"]);

// Gọi lại mã để thêm phụ tùng
require_once("../connection/connection.php");
require_once("./xulythemphutung.php");

// Kiểm tra xem thông báo "Vui lòng chọn một tệp ảnh." được hiển thị hay không
if (strpos($output, "Vui lòng chọn một tệp ảnh.") !== false) {
    echo "Test Không Chọn Tệp Ảnh: Đã Thành Công!\n";
} else {
    echo "Test Không Chọn Tệp Ảnh: Thất Bại!\n";
}

// Test case cho trường hợp tệp quá lớn
$_FILES["anhPhuTung"]["error"] = UPLOAD_ERR_INI_SIZE;

// Gọi lại mã để thêm phụ tùng
require_once("../connection/connection.php");
require_once("./xulythemphutung.php");

// Kiểm tra xem thông báo "Tệp quá lớn." được hiển thị hay không
if (strpos($output, "Tệp quá lớn.") !== false) {
    echo "Test Tệp Quá Lớn: Đã Thành Công!\n";
} else {
    echo "Test Tệp Quá Lớn: Thất Bại!\n";
}

// Test case cho trường hợp tệp không đúng định dạng
$_FILES["anhPhuTung"]["error"] = UPLOAD_ERR_OK;
$_FILES["anhPhuTung"]["name"] = "phutung.txt";

// Gọi lại mã để thêm phụ tùng
require_once("../connection/connection.php");
require_once("./xulythemphutung.php");

// Kiểm tra xem thông báo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG & GIF." được hiển thị hay không
if (strpos($output, "Chỉ chấp nhận các định dạng JPG, JPEG, PNG & GIF.") !== false) {
    echo "Test Định Dạng Tệp Không Hợp Lệ: Đã Thành Công!\n";
} else {
    echo "Test Định Dạng Tệp Không Hợp Lệ: Thất Bại!\n";
}

// Test case cho trường hợp không thể tải lên tệp
$_FILES["anhPhuTung"]["error"] = UPLOAD_ERR_NO_FILE;

// Gọi lại mã để thêm phụ tùng
require_once("../connection/connection.php");
require_once("./xulythemphutung.php");

// Kiểm tra xem thông báo "Vui lòng chọn một tệp ảnh." được hiển thị hay không
if (strpos($output, "Vui lòng chọn một tệp ảnh.") !== false) {
    echo "Test Tệp Không Tải Lên: Đã Thành Công!\n";
} else {
    echo "Test Tệp Không Tải Lên: Thất Bại!\n";
}
