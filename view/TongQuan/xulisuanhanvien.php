<?php
$id = $_GET['xid'];
$tennv = $_POST['tennv'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$ngayvaolam = $_POST['ngayvaolam'];
$chucvu = $_POST['chucvu'];
// $maphongban = $_POST['maphongban'];
$cmnd = $_POST['cmnd'];
$bangcap = $_POST['bangcap'];
require_once '../connect.php';
$sql = "UPDATE NHANVIEN SET TENNV='$tennv',GIOITINH='$gioitinh',NGAYSINH='$ngaysinh',DIACHI='$diachi' ,SDT='$sdt',EMAIL='$email',NGAYVAOLAM='$ngayvaolam',CMND='$cmnd',BANGCAP='$bangcap',CHUCVU='$chucvu' WHERE MANV = $id";
$conn->exec($sql);
var_dump($sql);
header("Location: dsnhanvien.php");