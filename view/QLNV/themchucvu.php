<?php
session_start();
$tencv = $_POST['tenchucvu'];
$hsl = $_POST['hsl'];
$mota = $_POST['motachucvu'];
$ngaytaochucvu = $_POST['ngaytaochucvu'];
$phucap = $_POST['phucap'];
require_once '../connect.php';
$sql = "INSERT INTO CHUCVU (TENCHUCVU,MOTACHUCVU,NGAYTAOCHUCVU,PHUCAP,HESOLUONG)
    VALUES ('$tencv', '$mota','$ngaytaochucvu','$phucap','$hsl')";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: chucvu.php");