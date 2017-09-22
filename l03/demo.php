<?php 
class DongVat{
	var $ten;
	var $tuoi;
	var $gioiTinh;
	var $mauLong;
	var $canNang;

	function an($khoiLuong){
		echo "<br>toi dang an <br>";
		$this->canNang += $khoiLuong;
	}

}
// bt1 - tao lop may tinh
// bt2 - tao hanh dong setGiaTien - de thuc hien viec dinh gia cho 1 cai may tinh
// sau do in ra ngoai gia trc khi cap nhat va sau khi thuc hien hanh dong setGiaTien
class MayTinh{
	var $maMay;
	var $hangSx;
	var $dongMay;
	var $mauSac;
	var $trongLuong;
	var $giaTien;

	function __construct($maMay = null,  $trongLuong = null, $giaTien = 0){
		$this->maMay = $maMay;
		$this->trongLuong = $trongLuong;
		$this->giaTien = $giaTien;

	}

	function setGiaTien($giaTien){
		$this->giaTien = $giaTien;
	}

}

$lenovo = new MayTinh('Lenovo Thinkpad 123', 2);
echo "May $lenovo->maMay co gia tien cu: $lenovo->giaTien <br>";
$lenovo->setGiaTien(500);
echo "May $lenovo->maMay gia tien moi: $lenovo->giaTien <br>";

// $asus = new MayTinh();
// $asus->mauSac = 'gold';
// $asus->maMay = 'asus ROG 32';
// $asus->giaTien = 1200;
// echo "May $asus->maMay co gia tien cu: $asus->giaTien <br>";
// $asus->setGiaTien(700);
// echo "May $asus->maMay gia tien moi: $asus->giaTien <br>";






// $conCho = new DongVat();
// $conCho->ten = 'cau Vang';
// $conCho->canNang = 10; // tu do them nhung thuoc tinh phat sinh sau vao object
// $conCho->an(2);
// var_dump($conCho);

// $conMeo = new DongVat();
// $conMeo->ten = 'Miu Miu';
// $conMeo->canNang = 2;
// $conMeo->an(0.5);
// var_dump($conMeo);






 ?>