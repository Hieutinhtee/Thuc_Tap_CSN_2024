<?php
    session_start();
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $batdau = $_POST['batdau'];
    $ketthuc = $_POST['ketthuc'];
    $mucdich = $_POST['mucdich'];
    $diadiem = $_POST['diadiem'];

    require_once '../connect.php';
    $sql = "INSERT INTO CONGTAC (MANV,TENNV,NGAYBATDAU,NGAYKETTHUC,DIADIEM,MUCDICH)
    VALUES ('$manv', '$tennv','$batdau','$ketthuc','$diadiem','$mucdich')";
    var_dump($sql);
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    header("Location: qlct.php");  