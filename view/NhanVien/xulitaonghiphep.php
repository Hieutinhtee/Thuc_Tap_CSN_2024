<?php
    session_start();
    $manv = $_SESSION['manv'];
    $tennv = $_SESSION['tennv'];
    $batdau = $_POST['batdau'];
    $ketthuc = $_POST['ketthuc'];
    $lydonghi = $_POST['lydonghi'];

    require_once '../connect.php';
    $sql = "INSERT INTO NGHIPHEP (MANHANVIEN,TENNV,NGAYBATDAUNGHI,NGAYDILAMLAI,LYDO)
    VALUES ('$manv', '$tennv','$batdau','$ketthuc','$lydonghi')";
    var_dump($sql);
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    header("Location: dsnghiphep.php");  