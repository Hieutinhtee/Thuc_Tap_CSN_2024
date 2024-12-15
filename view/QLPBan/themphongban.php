<?php
session_start();
require_once '../connect.php';
$tenphongban = $_POST['tenphongban'];
$motaphongban = $_POST['motaphongban'];
$matph = $_POST['manv'];
$tentruongphong = $_POST['tennv'];



$sql = "INSERT INTO PHONGBAN (TENPHONGBAN, MOTAPHONGBAN,MATRUONGPHONG, TENTRUONGPHONG)
       VALUES ('$tenphongban', '$motaphongban','$matph','$tentruongphong')";
$conn->exec($sql);

$sql2 = "SELECT MAX(MAPHONGBAN) FROM PHONGBAN";
$stmt = $conn->prepare($sql2);
$stmt->execute();
$idpbz = $stmt->fetch(PDO::FETCH_ASSOC);
$idpb = $idpbz["MAX(MAPHONGBAN)"];


$sql1 = "UPDATE NHANVIEN SET MAPHONGBAN='$idpb', CHUCVU='Trưởng phòng' WHERE MANV=$matph";
$conn->exec($sql1);

$_SESSION["toast"] = "oke";
header("Location: qlphongban.php");