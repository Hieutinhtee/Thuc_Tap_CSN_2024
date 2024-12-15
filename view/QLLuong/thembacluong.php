<?php
session_start();
require_once '../connect.php';
$luongcb = $_POST['lcb'];
$tenbacluong = $_POST['tenbacluong'];
$luongtc = $_POST['ltc'];
$hotro = $_POST['hotro'];
$phucap = $_POST['phucap'];
$sql = "INSERT INTO BACLUONG (TENBACLUONG, LUONGCOBAN,LUONGTANGCA, HOTRO, PHUCAP)
       VALUES ('$tenbacluong', '$luongcb','$luongtc','$hotro','$phucap')";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: bacluong.php");