<?php
// Import đoạn mã xử lý xóa dịch vụ
require_once("./xoadichvu.php");

// Test case cho trường hợp dịch vụ tồn tại và được xóa thành công
$_POST['confirmDelete'] = true;
$_POST['maDichVu'] = 1; // Giả sử mã dịch vụ tồn tại trong cơ sở dữ liệu

ob_start(); // Bắt đầu bắt output
require_once("./xoadichvu.php");
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo hiển thị khi dịch vụ được xóa thành công
if (strpos($output, "Dịch vụ có mã 1 đã được xóa thành công.") !== false) {
    echo "Test case: Delete existing service - PASSED\n";
} else {
    echo "Test case: Delete existing service - FAILED\n";
}

// Test case cho trường hợp dịch vụ không tồn tại
$_POST['confirmDelete'] = true;
$_POST['maDichVu'] = 999; // Giả sử mã dịch vụ không tồn tại trong cơ sở dữ liệu

ob_start(); // Bắt đầu bắt output
require_once("./xoadichvu.php");
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo hiển thị khi không tìm thấy dịch vụ để xóa
if (strpos($output, "Không tìm thấy dịch vụ có mã 999 để xóa.") !== false) {
    echo "Test case: Delete non-existing service - PASSED\n";
} else {
    echo "Test case: Delete non-existing service - FAILED\n";
}

// Test case cho trường hợp không gửi mã dịch vụ
$_POST['confirmDelete'] = true;

ob_start(); // Bắt đầu bắt output
require_once("./xoadichvu.php");
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo hiển thị khi không gửi mã dịch vụ
if (strpos($output, "Không tìm thấy mã dịch vụ để xóa.") !== false) {
    echo "Test case: Missing service ID - PASSED\n";
} else {
    echo "Test case: Missing service ID - FAILED\n";
}
