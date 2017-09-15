<?php 

/**
 * LAB1 - tạo cơ sở dữ liệu lab1 gồm bảng 
 * products
 * id - int - pk -ai
 * name - varchar
 * price - decimal(10, 2)
 * detail - text
 *
 * thêm ít nhất 10 bản ghi vào bảng produts
 *
 * 
 * Sử dụng lớp BaseModel để tạo ra 1 biến chứa kết nối đến csdl
 * sau đó thực hiện tương tác với csql để lấy ra danh sách sản phẩm và hiển thị dưới dạng bảng tại file index.php
 */
require_once 'models/BaseModel.php';

$db = new BaseModel();

$sql = "select * from products";
$statement = $db->connect->prepare($sql);
$statement->execute();
$rs = $statement->fetchAll();
var_dump($rs);




 ?>