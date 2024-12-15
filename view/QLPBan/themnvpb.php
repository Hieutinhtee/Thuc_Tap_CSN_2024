<?php
session_start();
require_once '../connect.php';

$id = intval($_POST['new_nv_pb']);
$idphongban = $_POST['maphongban'];

$sql1 = "UPDATE NHANVIEN SET MAPHONGBAN='$idphongban' WHERE MANV=$id";
var_dump($sql1);
$conn->exec($sql1);


$_SESSION["toast"] = "oke";
header("Location: suaphongban.php?xid=$idphongban");