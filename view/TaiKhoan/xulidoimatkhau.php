<?php
session_start();
$id = $_SESSION['manv'];
$mk0 = $_POST["matkhaumoi"];
$mk = password_hash($mk0, PASSWORD_DEFAULT);
$user_input = $_POST["matkhaucu"];
$username = $_SESSION["username"];
require_once '../connect.php';
$sql = "SELECT * FROM NHANVIEN WHERE TENTAIKHOAN='" . $username . "' ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$row1 = $stmt->fetch(PDO::FETCH_ASSOC);
$stored_hash = $row1['MATKHAU'];
$row = password_verify($user_input, $stored_hash);
if ($row) {
    $sql1 = "UPDATE NHANVIEN SET MATKHAU='$mk' WHERE MANV=$id";
    $conn->exec($sql1);
    $_SESSION["toast"] = "oke";
    header("Location: doimatkhau.php");
} else {
    $_SESSION["toast"] = "saimk";
    header("Location: doimatkhau.php");
}
