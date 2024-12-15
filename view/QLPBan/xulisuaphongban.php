<?php
session_start();
require_once '../connect.php';
$id = $_POST['maphongban'];
$tenphongban = $_POST['tenphongban'];
$motaphongban = $_POST['motaphongban'];
$matph = $_POST['manv'];
$matph_old = $_POST['manv_old'];
$tentruongphong = $_POST['tennv'];
if($tentruongphong == ''){
    $tentruongphong = $_POST['tennv_old'];
}
$check = 0;
if($matp == ''){
    $matph = $_POST['manv_old'];
    $check = 1;
}

$sql = "UPDATE PHONGBAN SET TENPHONGBAN='$tenphongban', MOTAPHONGBAN='$motaphongban', MATRUONGPHONG=$matph, TENTRUONGPHONG='$tentruongphong' WHERE MAPHONGBAN=$id";
var_dump($sql);
$conn->exec($sql);

if ($matph != '' and $check == 0) {
    $sql1 = "UPDATE NHANVIEN SET MAPHONGBAN=$id, CHUCVU='Trưởng phòng' WHERE MANV=$matph";
    $conn->exec($sql1);

    $sql2 = "UPDATE NHANVIEN SET MAPHONGBAN=NULL, CHUCVU='Nhân viên' WHERE MANV=$matph_old";
    $conn->exec($sql2);
}

$_SESSION["toast"] = "oke";
header("Location: qlphongban.php");