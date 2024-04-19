<?php
// Hãy đảm bảo rằng bạn đã include file registration.php ở đây nếu không nó sẽ không hoạt động
require_once './register.php';
// Testcase cho đăng ký thành công
$_POST["username"] = "testuser";
$_POST["password"] = "testpassword";
$_POST["email"] = "test@example.com";

ob_start(); // Bắt đầu bắt output
require_once("./register.php"); // Gọi đoạn mã xử lý đăng ký
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo "Đăng ký thành công" được hiển thị hay không
if (strpos($output, "Đăng ký thành công") !== false && strpos($output, "window.location = '../views/login.html'") !== false) {
    echo "Successful Registration Test Passed!\n";
} else {
    echo "Successful Registration Test Failed!\n";
}

// Testcase cho tên đăng nhập hoặc email đã tồn tại
$_POST["username"] = "existinguser";
$_POST["password"] = "existingpassword";
$_POST["email"] = "existing@example.com";

ob_start(); // Bắt đầu bắt output
require_once './register.php'; // Gọi đoạn mã xử lý đăng ký
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo "Tên đăng nhập hoặc email đã tồn tại" được hiển thị hay không
if (strpos($output, "Tên đăng nhập hoặc email đã tồn tại") !== false) {
    echo "Existing Username or Email Test Passed!\n";
} else {
    echo "Existing Username or Email Test Failed!\n";
}

// Testcase cho lỗi truy vấn
$_POST["username"] = "testuser";
$_POST["password"] = "testpassword";
$_POST["email"] = "test@example.com";

// Gán giá trị sai cho biến kết nối CSDL để tạo ra lỗi truy vấn
$conn = false;

ob_start(); // Bắt đầu bắt output
require_once './register.php'; // Gọi đoạn mã xử lý đăng ký
$output = ob_get_clean(); // Kết thúc và lấy output

// Kiểm tra xem thông báo "Đã xảy ra lỗi" được hiển thị hay không
if (strpos($output, "Đã xảy ra lỗi") !== false) {
    echo "Query error Test Passed!\n";
} else {
    echo "Query error Test Failed!\n";
}
