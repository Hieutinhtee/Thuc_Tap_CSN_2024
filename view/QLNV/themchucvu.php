<?php
    session_start();
    $tencv = $_POST['tenchucvu'];
 
    $mota = $_POST['motachucvu'];
    $ngaytaochucvu = $_POST['ngaytaochucvu'];

    require_once '../connect.php';
    $sql = "INSERT INTO CHUCVU (TENCHUCVU,MOTACHUCVU,NGAYTAOCHUCVU)
    VALUES ('$tencv', '$mota','$ngaytaochucvu')";
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    header("Location: chucvu.php");  