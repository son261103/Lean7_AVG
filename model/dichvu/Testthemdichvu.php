<?php
// Test case cho tình huống thành công
$_POST['tenKhachHang'] = 'Tên khách hàng hợp lệ';
$_POST['tenNhanVien'] = 'Tên nhân viên hợp lệ';
$_POST['tenDichVu'] = 'Tên dịch vụ hợp lệ';
$_POST['moTa'] = 'Mô tả dịch vụ hợp lệ';
$_POST['gia'] = 100;

ob_start();
require_once './themdichvu.php'; // Đường dẫn đến file chứa đoạn mã xử lý

$output = ob_get_clean();

// Kiểm tra xem dữ liệu đã được thêm vào cơ sở dữ liệu thành công hay không
$sql_check = "SELECT * FROM DichVu WHERE tenDichVu = 'Tên dịch vụ hợp lệ'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "Test case for successful registration passed!\n";
} else {
    echo "Test case for successful registration failed!\n";
}

// Kiểm tra xem thông báo "Thêm dịch vụ thành công!" đã được xuất ra hay không
if (strpos($output, "Thêm dịch vụ thành công!") !== false) {
    echo "Output message test passed!\n";
} else {
    echo "Output message test failed!\n";
}

// Test case cho tình huống không tìm thấy mã khách hàng
$_POST['tenKhachHang'] = 'Tên khách hàng không tồn tại';

ob_start();
require_once './themdichvu.php'; // Đường dẫn đến file chứa đoạn mã xử lý

$output = ob_get_clean();

// Kiểm tra xem thông báo "Không tìm thấy mã khách hàng." đã được xuất ra hay không
if (strpos($output, "Không tìm thấy mã khách hàng.") !== false) {
    echo "Test case for customer ID not found passed!\n";
} else {
    echo "Test case for customer ID not found failed!\n";
}

// Test case cho tình huống không tìm thấy mã nhân viên
$_POST['tenNhanVien'] = 'Tên nhân viên không tồn tại';

ob_start();
require_once './themdichvu.php';  // Đường dẫn đến file chứa đoạn mã xử lý

$output = ob_get_clean();

// Kiểm tra xem thông báo "Không tìm thấy mã nhân viên." đã được xuất ra hay không
if (strpos($output, "Không tìm thấy mã nhân viên.") !== false) {
    echo "Test case for employee ID not found passed!\n";
} else {
    echo "Test case for employee ID not found failed!\n";
}

// Đóng kết nối
$conn->close();
