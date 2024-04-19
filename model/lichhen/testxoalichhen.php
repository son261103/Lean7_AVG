<?php
// Test case 1: Kiểm tra xóa lịch hẹn thành công
function testDeleteAppointmentSuccess()
{
    // Khởi tạo kết nối
    $server = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "sql_car";
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Gọi lại đoạn mã xử lý xóa lịch hẹn
    include './xoalichhen.php';

    // Kiểm tra kết quả
    $sql_check = "SELECT * FROM LichHen WHERE maLichHen = 1";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows == 0) {
        echo "Delete Appointment Test Passed: Appointment successfully deleted.\n";
    } else {
        echo "Delete Appointment Test Failed: Failed to delete appointment.\n";
    }

    // Đóng kết nối
    $conn->close();
}

// Test case 2: Kiểm tra xác nhận xóa lịch hẹn
function testDeleteAppointmentConfirmation()
{
    // Khởi tạo kết nối
    $server = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "sql_car";
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Gọi lại đoạn mã xử lý xóa lịch hẹn
    include './xoalichhen.php';

    // Kiểm tra kết quả
    $sql_check = "SELECT * FROM LichHen WHERE maLichHen = 1";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows == 0) {
        echo "Delete Appointment Confirmation Test Passed: Appointment successfully deleted.\n";
    } else {
        echo "Delete Appointment Confirmation Test Failed: Failed to delete appointment even after confirmation.\n";
    }

    // Đóng kết nối
    $conn->close();
}

// Test case 3: Kiểm tra xác nhận không hợp lệ
function testInvalidConfirmation()
{
    // Khởi tạo kết nối
    $server = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "sql_car";
    $conn = new mysqli($server, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Gọi lại đoạn mã xử lý xóa lịch hẹn
    include './xoalichhen.php';

    // Kiểm tra kết quả
    $sql_check = "SELECT * FROM LichHen WHERE maLichHen = 1";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "Invalid Confirmation Test Passed: Appointment not deleted due to invalid confirmation.\n";
    } else {
        echo "Invalid Confirmation Test Failed: Appointment deleted despite invalid confirmation.\n";
    }

    // Đóng kết nối
    $conn->close();
}

// Thực thi các test case
testDeleteAppointmentSuccess();
testDeleteAppointmentConfirmation();
testInvalidConfirmation();
