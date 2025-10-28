<?php
       session_start();
       $tenbangcap = $_POST['tenbangcap'];
       $hsl = $_POST['hsl'];
       $motabangcap = $_POST['motabangcap'];
       $ngaytaobangcap = $_POST['ngaytaobangcap'];
   
       require_once '../connect.php';
       $sql = "INSERT INTO BANGCAP (TENBANGCAP,MOTABANGCAP,NGAYTAO,HESOLUONG)
       VALUES ('$tenbangcap', '$motabangcap','$ngaytaobangcap','$hsl')";
       $conn->exec($sql);
       $_SESSION["toast"] = "oke";
       header("Location: bangcap.php");  