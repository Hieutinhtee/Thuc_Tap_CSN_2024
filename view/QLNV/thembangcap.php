<?php
       session_start();
       $tenbangcap = $_POST['tenbangcap'];
       
       $motabangcap = $_POST['motabangcap'];
       $ngaytaobangcap = $_POST['ngaytaobangcap'];
   
       require_once '../connect.php';
       $sql = "INSERT INTO BANGCAP (TENBANGCAP,MOTABANGCAP,NGAYTAO)
       VALUES ('$tenbangcap', '$motabangcap','$ngaytaobangcap')";
       $conn->exec($sql);
       $_SESSION["toast"] = "oke";
       header("Location: bangcap.php");  