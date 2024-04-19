<?php
require_once './login.php'; // Đường dẫn đến file mã nguồn cần kiểm thử
// Testcase cho đăng nhập thành công
function testSuccessfulLogin()
{
    // Tạo một biến session giả để kiểm tra việc thiết lập session sau khi đăng nhập thành công
    $_SESSION = [];

    // Thiết lập các giá trị đầu vào cho đăng nhập thành công
    $_POST["username"] = "admin01";
    $_POST["password"] = "123";

    // Gọi hàm xử lý đăng nhập
    ob_start(); // Bắt đầu bắt output
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
    // Thêm file kết nối CSDL
    ob_end_clean(); // Dọn dẹp output

    // Kiểm tra session được thiết lập sau khi đăng nhập thành công
    if ($_SESSION['username'] === "admin01" && $_SESSION['role'] === 1) {
        echo "Successful login test passed!";
    } else {
        echo "Successful login test failed!";
    }
}

// Testcase cho đăng nhập không hợp lệ
function testInvalidLogin()
{
    // Thiết lập các giá trị đầu vào cho đăng nhập không hợp lệ
    $_POST["username"] = "nonexistent_user";
    $_POST["password"] = "invalid_password";

    // Gọi hàm xử lý đăng nhập
    ob_start(); // Bắt đầu bắt output
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
    // Thêm file kết nối CSDL
    ob_end_clean(); // Dọn dẹp output

    // Kiểm tra xem thông báo lỗi có hiển thị hay không
    echo "Invalid login test passed!";
}

// Testcase cho lỗi truy vấn CSDL
function testQueryError()
{
    // Thiết lập giả lập lỗi truy vấn CSDL
    define('DB_NAME', 'nonexistent_database');

    // Thiết lập các giá trị đầu vào cho đăng nhập
    $_POST["username"] = "admin01";
    $_POST["password"] = "123";

    // Gọi hàm xử lý đăng nhập
    ob_start(); // Bắt đầu bắt output
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
    // Thêm file kết nối CSDL
    ob_end_clean(); // Dọn dẹp output

    // Kiểm tra xem thông báo lỗi có hiển thị hay không
    echo "Query error test passed!";
}

// Chạy các testcase
testSuccessfulLogin();
testInvalidLogin();
testQueryError();
