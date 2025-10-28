<?php
session_start();
require_once '../connect.php';
$manv = $_POST['manv'];
$tennv = $_POST['tennv'];
$songaycong = $_POST['songaycong'];
$sogiotangca = $_POST['sogiotangca'];
$thangchamcong = $_POST['thang'];

$sql0 = "SELECT * FROM NHANVIEN WHERE MANV = $manv";
$stmt0 = $conn->prepare($sql0);
$stmt0->execute();
$r0 = $stmt0->fetch(PDO::FETCH_ASSOC);
$tenbacluong = $r0['BACLUONG'];
$tenchucvu = $r0['CHUCVU'];
$tenbangcap = $r0['BANGCAP'];

$sql1 = "SELECT * FROM BACLUONG WHERE TENBACLUONG = '$tenbacluong'";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$r1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM CHUCVU WHERE TENCHUCVU = '$tenchucvu'";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$r2 = $stmt2->fetch(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM BANGCAP WHERE TENBANGCAP = '$tenbangcap'";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$r3 = $stmt3->fetch(PDO::FETCH_ASSOC);

$luongcoso = $r1['LUONGCOBAN'];
$tonghesoluong = $r2['HESOLUONG'] + $r3['HESOLUONG'];
$tongphucap = $r1['PHUCAP'] + $r2['PHUCAP'];
$luongcoban = ($r1['LUONGCOBAN'] * $tonghesoluong + $tongphucap)/ 26;

// Tính số tiền thưởng, vi phạm
$tienvipham = 0;
$thuong = 0;
$stmt4 = $conn->prepare("SELECT * FROM DANHGIA WHERE MANV=$manv");
$stmt4->execute();
foreach ($stmt4->fetchAll() as $r4) {
    $dateToCheck = $r4['THOIGIAN']; // Ngày kiểm tra (dạng YYYY-MM-DD)
    list($selectedYear, $selectedMonth) = explode('-', $thangchamcong);
    $date = new DateTime($dateToCheck);
    // Lấy tháng và năm từ ngày kiểm tra
    $month = (int) $date->format('m'); // Lấy tháng
    $year = (int) $date->format('Y'); // Lấy năm

    if ($month == $selectedMonth && $year == $selectedYear) {
        if($r4['LOAIDANHGIA']=='Khen thưởng'){
            $thuong = $thuong + $r4['SOTIEN'];
        }
        else{
            $tienvipham = $tienvipham + $r4['SOTIEN'];
        }
    }
}

// Tính số tiền hỗ trọ coogn tác
$hotrocongtac = 0;
$stmt5 = $conn->prepare("SELECT * FROM CONGTAC WHERE MANV=$manv");
$stmt5->execute();
foreach ($stmt5->fetchAll() as $r5) {

    $dateToCheck = $r5['NGAYBATDAU']; // Ngày kiểm tra (dạng YYYY-MM-DD)
    list($selectedYear, $selectedMonth) = explode('-', $thangchamcong);
    $date = new DateTime($dateToCheck);
    // Lấy tháng và năm từ ngày kiểm tra
    $month = (int) $date->format('m'); // Lấy tháng
    $year = (int) $date->format('Y'); // Lấy năm

    if ($month == $selectedMonth && $year == $selectedYear) {
        $hotrocongtac = $hotrocongtac + $r5['HOTRO'];
    }
}


$thuclinh = $songaycong * $luongcoban + $sogiotangca * $luongcoban/8 - $tienvipham + $thuong + $hotrocongtac;


$sql1 = "INSERT INTO CHAMCONG (TENNV, MANV, THOIGIAN, SOGIOLAM, SOGIOTANGCA, TIENVIPHAM, PHUCAP, THUONG, THUCLINH, PHUCAPCONGTAC,HESOLUONG,LUONGCOSO,LUONGCOBAN)
    VALUES ('$tennv', '$manv', '$thangchamcong','$songaycong','$sogiotangca','$tienvipham','$tongphucap','$thuong','$thuclinh','$hotrocongtac','$tonghesoluong','$luongcoso','$luongcoban')";
$conn->exec($sql1);
var_dump($sql1);


$_SESSION["toast"] = "oke";
header("Location: bangchamcong.php");