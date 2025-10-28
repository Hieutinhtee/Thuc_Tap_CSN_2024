<?php
session_start();
require_once '../connect.php';
$luongcb = $_POST['lcb'];
$tenbacluong = $_POST['tenbacluong'];
$thamnien = $_POST['thamnien'];
$phucap = $_POST['phucap'];
$sql = "INSERT INTO BACLUONG (TENBACLUONG, LUONGCOBAN, THAMNIEN, PHUCAP)
       VALUES ('$tenbacluong', '$luongcb','$thamnien','$phucap')";
$conn->exec($sql);
$_SESSION["toast"] = "oke";
header("Location: bacluong.php");