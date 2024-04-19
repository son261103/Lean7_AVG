<?php
// Test case cho trường hợp thành công khi thêm khách hàng
$_POST['addCustomer'] = true;
$_POST['hoTen'] = 'Nguyen Van A';
$_POST['email'] = 'nguyenvana@example.com';
$_POST['soDienThoai'] = '0123456789';
$_POST['diaChi'] = '123 Đường ABC, Quận XYZ, Thành phố HCM';

// Gọi lại mã để thực hiện thêm khách hàng
require_once("../connection/connection.php");
require_once("./khachhangthemsuaxoa.php");
$output = ' ';

// Kiểm tra xem thông báo "Thêm khách hàng thành công" được hiển thị hay không
if (strpos($output, "Thêm khách hàng thành công") !== false) {
    echo "Successful Add Test Passed!\n";
} else {
    echo "Successful Add Test Failed!\n";
}

// Test case cho trường hợp thành công khi sửa thông tin khách hàng
$_POST['editCustomer'] = true;
$_POST['maKhachHang'] = '1'; // Điền mã khách hàng cần sửa ở đây
$_POST['hoTen'] = 'Nguyen Van B';
$_POST['email'] = 'nguyenvanb@example.com';
$_POST['soDienThoai'] = '0987654321';
$_POST['diaChi'] = '456 Đường XYZ, Quận ABC, Thành phố HCM';

// Gọi lại mã để thực hiện sửa thông tin khách hàng
require_once("../connection/connection.php");
require_once("./khachhangthemsuaxoa.php");

// Kiểm tra xem thông báo "Sửa thông tin khách hàng thành công" được hiển thị hay không
if (strpos($output, "Sửa thông tin khách hàng thành công") !== false) {
    echo "Successful Edit Test Passed!\n";
} else {
    echo "Successful Edit Test Failed!\n";
}

// Test case cho trường hợp thành công khi xóa khách hàng
$_POST['deleteCustomer'] = true;
$_POST['maKhachHang'] = '1'; // Điền mã khách hàng cần xóa ở đây

// Gọi lại mã để thực hiện xóa khách hàng
require_once("../connection/connection.php");
require_once("./khachhangthemsuaxoa.php");

// Kiểm tra xem thông báo "Xóa khách hàng thành công" được hiển thị hay không
if (strpos($output, "Xóa khách hàng thành công") !== false) {
    echo "Successful Delete Test Passed!\n";
} else {
    echo "Successful Delete Test Failed!\n";
}
