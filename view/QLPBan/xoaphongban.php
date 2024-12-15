<?php
session_start();
require_once '../connect.php';

$id = $_GET['xid'];

$sql1 = "UPDATE NHANVIEN SET MAPHONGBAN=NULL WHERE MAPHONGBAN=$id";
var_dump($sql1);
$conn->exec($sql1);

$sql = "DELETE FROM PHONGBAN WHERE MAPHONGBAN=$id";
$conn->exec($sql);

$_SESSION["toast"] = "oke";
header("Location: qlphongban.php");