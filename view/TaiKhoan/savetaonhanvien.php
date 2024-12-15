<?php
    $manv = $_POST['tentaikhoan'];
    $matkhau = $_POST['matkhau'];
    $quyenhan = $_POST['quyenhan'];
    var_dump($quyenhan);
    require_once '../connect.php';
    $sql = "UPDATE NHANVIEN SET  MATKHAU='$matkhau', TENTAIKHOAN='$manv',QUYENHAN='$quyenhan' WHERE MANV=$manv";
    $conn->exec($sql);
    header("Location: taotaikhoan.php");