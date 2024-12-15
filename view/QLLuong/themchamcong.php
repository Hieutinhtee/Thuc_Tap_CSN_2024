<?php
session_start();
$manv = $_POST['manv'];
$tennv = $_POST['tennv'];
$sogiolam = $_POST['sogiolam'];
$sogiotangca = $_POST['sogiotangca'];
$tienvipham = $_POST['tienvipham'];
$thuong = $_POST['thuong'];
$bacluong = $_POST['bacluong'];
$thang = $_POST['thang'];


require_once '../connect.php';
$sql = "SELECT * FROM BACLUONG WHERE TENBACLUONG='" . $bacluong . "' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$thuclinh = $sogiolam*$row['LUONGCOBAN'] + $sogiotangca*$row['LUONGTANGCA'] + $row['HOTRO'] + $row['PHUCAP'] -$tienvipham +$thuong;
$phucaphotro = $row['HOTRO'] + $row['PHUCAP'];

$sql1 = "INSERT INTO CHAMCONG (TENNV, MANV, THOIGIAN, SOGIOLAM, SOGIOTANGCA, TIENVIPHAM, PHUCAPHOTRO, THUONG, THUCLINH)
    VALUES ('$tennv', '$manv', '$thang','$sogiolam','$sogiotangca','$tienvipham','$phucaphotro','$thuong','$thuclinh')";
$conn->exec($sql1);



$_SESSION["toast"] = "oke";
header("Location: bangchamcong.php");