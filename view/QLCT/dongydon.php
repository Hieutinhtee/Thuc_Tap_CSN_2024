<?php

session_start();
$id = $_GET["xid"];

require_once '../connect.php';
$sql = "UPDATE NGHIPHEP SET PHEDUYET=1 WHERE MANGHIPHEP=$id";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: dsnghiphep.php");
?>