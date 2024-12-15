<?php
    if(isset($_GET["suaid"])){
        session_start();
        $id = $_GET["suaid"];
        $tenbangcap = $_POST['tenbangcap'];
       
       $mota = $_POST['motabangcap'];
       $ngaytaobangcap = $_POST['ngaytaobangcap'];
   
       require_once '../connect.php';
       $sql = "UPDATE BANGCAP SET TENBANGCAP='$tenbangcap', MOTABANGCAP='$mota', NGAYTAO='$ngaytaobangcap' WHERE MABANGCAP=$id";
       $conn->exec($sql);
       $_SESSION["toast"] = "oke";
       header("Location: bangcap.php");  
    }
?>