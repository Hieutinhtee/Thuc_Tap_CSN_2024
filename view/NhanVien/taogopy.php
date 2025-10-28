<?php
session_start();
$manv = $_SESSION['manv'];
$tennv = $_SESSION['tennv'];
$tieude = $_POST['tieude'];
$noidung = $_POST['noidung'];
$ngaytao = $_POST['ngaytao'];
require_once '../connect.php';
$sql = "INSERT INTO KIENNGHI (MANV,TENNV,TIEUDE,NOIDUNG,NGAYTAO)
    VALUES ('$manv', '$tennv','$tieude','$noidung','$ngaytao')";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: gopy.php");