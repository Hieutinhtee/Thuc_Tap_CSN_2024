<?php
    $tennv = $_POST['tennv'];
    $gioitinh = $_POST['gioitinh'];
    $ngaysinh = $_POST['ngaysinh'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $ngayvaolam = $_POST['ngayvaolam'];
    $chucvu = $_POST['chucvu'];
    // $maphongban = $_POST['maphongban'];
    $cmnd = $_POST['cmnd'];
    $bangcap = $_POST['bangcap'];
    require_once '../connect.php';
    $sql = "INSERT INTO NHANVIEN (TENNV,GIOITINH,NGAYSINH,DIACHI ,SDT,EMAIL,NGAYVAOLAM,CMND,BANGCAP,CHUCVU)
    VALUES ('$tennv', '$gioitinh', '$ngaysinh','$diachi','$sdt','$email','$ngayvaolam','$cmnd','$bangcap','$chucvu')";
    $conn->exec($sql);
    header("Location: dsnhanvien.php");