<?php
session_start();
require_once '../connect.php';
$lydo = $_POST['lydo'];
$manv = $_POST['manv'];
$tennv = $_POST['tennv'];
$sotien = $_POST['sotien'];
$loai = $_POST['loaidanhgia'];
$thoigian = $_POST['ngaytao'];

$sql = "INSERT INTO DANHGIA (LYDO, LOAIDANHGIA, MANV, TENNV, SOTIEN, THOIGIAN)
       VALUES ('$lydo', '$loai','$manv','$tennv','$sotien','$thoigian')";
var_dump($sql);
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: danhgia.php");