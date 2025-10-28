<?php
session_start();
$macv = $_POST['machucvu'];
$tencv = $_POST['tenchucvu'];
$mota = $_POST['motachucvu'];
$ngaytaochucvu = $_POST['ngaytaochucvu'];
$hsl = $_POST['hsl'];
$phucap = $_POST['phucap'];
require_once '../connect.php';
$sql = "UPDATE CHUCVU SET TENCHUCVU='$tencv', MOTACHUCVU='$mota', NGAYTAOCHUCVU='$ngaytaochucvu',HESOLUONG=$hsl,PHUCAP=$phucap WHERE MACHUCVU=$macv";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: chucvu.php");