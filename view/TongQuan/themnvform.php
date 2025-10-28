<?php
session_start();
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
$img_name = $_FILES['pp']['name'];
$tmp_name = $_FILES['pp']['tmp_name'];
$error = $_FILES['pp']['error'];
$bacluong = $_POST['bacluong'];

require_once '../connect.php';


$sql2 = "SELECT MAX(MANV) FROM NHANVIEN";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$idnvz = $stmt2->fetch(PDO::FETCH_ASSOC);
$idnv = $idnvz["MAX(MANV)"] + 1;

if ($error === 0) {
    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_to_lc = strtolower($img_ex);

    $allowed_exs = array('jpg', 'jpeg', 'png');
    if (in_array($img_ex_to_lc, $allowed_exs)) {
        $new_img_name = uniqid($idnv, true) . '.' . $img_ex_to_lc;
        $img_upload_path = '../image/' . $new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

        $sql = "INSERT INTO NHANVIEN (TENNV,GIOITINH,NGAYSINH,DIACHI ,SDT,EMAIL,NGAYVAOLAM,CMND,BANGCAP,CHUCVU,BACLUONG,ANHNV)
        VALUES ('$tennv', '$gioitinh', '$ngaysinh','$diachi','$sdt','$email','$ngayvaolam','$cmnd','$bangcap','$chucvu','$bacluong','$new_img_name')";
        $conn->exec($sql);
        $_SESSION["toast"] = "oke";
        header("Location: dsnhanvien.php");
        exit;
    } else {
        header("Location: ../QLNV/themnv.php?error=1");
        exit;
    }
}

