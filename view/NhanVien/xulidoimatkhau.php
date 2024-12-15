<?php
session_start();
$id = $_SESSION['manv'];
$mk = $_POST["matkhaumoi"];
$password = $_POST["matkhaucu"];
require_once '../connect.php';
$sql = "SELECT * FROM NHANVIEN WHERE MATKHAU='$password' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $sql1 = "UPDATE NHANVIEN SET MATKHAU='$mk' WHERE MANV=$id";
    $conn->exec($sql1);
    $_SESSION["toast"] = "oke";
    header("Location: doimatkhau.php");
}
else{
    $_SESSION["toast"] = "saimk";
    header("Location: doimatkhau.php");
}
