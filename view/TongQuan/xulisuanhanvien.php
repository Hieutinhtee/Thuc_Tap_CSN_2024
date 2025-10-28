<?php
session_start();
$id = $_GET['xid'];
$tennv = $_POST['tennv'];
$gioitinh = $_POST['gioitinh'];
$ngaysinh = $_POST['ngaysinh'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$ngayvaolam = $_POST['ngayvaolam'];
$chucvu = $_POST['chucvu'];
$bacluong = $_POST['bacluong'];
$cmnd = $_POST['cmnd'];
$bangcap = $_POST['bangcap'];
$old_pp = $_POST['old_pp'];//xử lý ảnh cũ
require_once '../connect.php';

if (isset($_FILES['pp']['name']) and !empty($_FILES['pp']['name'])) {


    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $new_img_name = uniqid($id, true) . '.' . $img_ex_to_lc;
            $img_upload_path = '../image/' . $new_img_name;
            // Delete old profile pic
            $old_pp_des = "../image/$old_pp";
            if (unlink($old_pp_des)) {
                // just deleted
                move_uploaded_file($tmp_name, $img_upload_path);
            } else {
                // error or already deleted
                move_uploaded_file($tmp_name, $img_upload_path);
            }


            // update the Database
            $sql = "UPDATE NHANVIEN SET ANHNV='$new_img_name',BACLUONG='$bacluong',TENNV='$tennv',GIOITINH='$gioitinh',NGAYSINH='$ngaysinh',DIACHI='$diachi' ,SDT='$sdt',EMAIL='$email',NGAYVAOLAM='$ngayvaolam',CMND='$cmnd',BANGCAP='$bangcap',CHUCVU='$chucvu' WHERE MANV = $id";
            $conn->exec($sql);
            $_SESSION["toast"] = "oke";
            var_dump($sql);
            header("Location: dsnhanvien.php");
            exit;
        } else {
           
            header("Location: ../TongQuan/suanhanvien.php?xid=$id&error=1");
            exit;
        }
    } else {
        $em = "unknown error occurred!";
    header("Location: ../TongQuan/suanhanvien.php?xid=$id&error0=$em");
        exit;
    }


} else {
    $sql = "UPDATE NHANVIEN SET TENNV='$tennv',BACLUONG='$bacluong',GIOITINH='$gioitinh',NGAYSINH='$ngaysinh',DIACHI='$diachi' ,SDT='$sdt',EMAIL='$email',NGAYVAOLAM='$ngayvaolam',CMND='$cmnd',BANGCAP='$bangcap',CHUCVU='$chucvu' WHERE MANV = $id";
    $conn->exec($sql);
    var_dump($sql);
    $_SESSION["toast"] = "oke";
    header("Location: dsnhanvien.php");
}

