<?php
// Kết nối đến cơ sở dữ liệu
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

// Hàm kiểm tra sửa lịch hẹn thành công
function testEditAppointmentSuccess()
{
    // Các dữ liệu giả định
    $_POST['edit_appointment_id'] = 1;
    $_POST['edit_customer_id'] = 1;
    $_POST['edit_car_id'] = 1;
    $_POST['edit_employee_id'] = 1;
    $_POST['edit_appointment_date'] = '2024-04-15';
    $_POST['edit_purpose'] = 'Kiểm tra động cơ';
    $_POST['service_id'] = 1;

    // Gọi lại kết nối
    global $conn;

    // Xử lý form sửa
    include './sualichhen.php';

    // Kiểm tra kết quả
    $sql_check = "SELECT * FROM LichHen WHERE maLichHen = 1 AND ngayHen = '2024-04-15'";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "Edit Appointment Test Passed: Appointment successfully updated.\n";
    } else {
        echo "Edit Appointment Test Failed: Failed to update appointment.\n";
    }
}

// Hàm kiểm tra sửa lịch hẹn - không có dữ liệu để sửa
function testEditAppointmentNoData()
{
    // Các dữ liệu giả định
    $_POST['edit_appointment_id'] = 1000; // Giả định mã lịch hẹn không tồn tại

    // Gọi lại kết nối
    global $conn;

    // Xử lý form sửa
    include './sualichhen.php';

    // Kiểm tra kết quả
    $sql_check = "SELECT * FROM LichHen WHERE maLichHen = 1000";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows == 0) {
        echo "Edit Appointment No Data Test Passed: No appointment data to edit.\n";
    } else {
        echo "Edit Appointment No Data Test Failed: Appointment data found when it should not exist.\n";
    }
}

// Thực thi các test case
testEditAppointmentSuccess();
testEditAppointmentNoData();

// Đóng kết nối
$conn->close();
