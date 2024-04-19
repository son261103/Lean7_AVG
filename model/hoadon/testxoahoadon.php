<?php
// Test case cho trường hợp thành công khi xóa hóa đơn
$_POST['maHoaDon'] = '1';

// Gọi lại mã để xóa hóa đơn
require_once("./xoahoadon.php");
$output = ' ';

// Kiểm tra xem thông báo "Xóa hóa đơn thành công!" được hiển thị hay không
if (strpos($output, "Xóa hóa đơn thành công!") !== false) {
    echo "Successful Delete Test Passed!\n";
} else {
    echo "Successful Delete Test Failed!\n";
}

// Test case cho trường hợp không tìm thấy mã hóa đơn
$_POST['maHoaDon'] = 'HDKhongTonTai';

// Gọi lại mã để xóa hóa đơn
require_once("./xoahoadon.php");

// Kiểm tra xem thông báo "Không tìm thấy mã hóa đơn." được hiển thị hay không
if (strpos($output, "Không tìm thấy mã hóa đơn.") !== false) {
    echo "Invoice Not Found Test Passed!\n";
} else {
    echo "Invoice Not Found Test Failed!\n";
}
