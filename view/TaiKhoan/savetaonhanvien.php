<?php
session_start();
$manv = $_POST['tentaikhoan'];
$matkhau0 = $_POST['matkhau'];
$matkhau = password_hash($matkhau0, PASSWORD_DEFAULT);
$quyenhan = $_POST['quyenhan'];
var_dump($quyenhan);
require_once '../connect.php';
$sql = "UPDATE NHANVIEN SET  MATKHAU='$matkhau', TENTAIKHOAN='$manv',QUYENHAN='$quyenhan' WHERE MANV=$manv";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: taotaikhoan.php");