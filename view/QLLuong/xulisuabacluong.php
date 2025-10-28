<?php
if (isset($_GET["suaid"])) {
    session_start();
    $id = $_GET["suaid"];
    $luongcb = $_POST['lcb'];
    $tenbacluong = $_POST['tenbacluong'];
    
    $thamnien = $_POST['thamnien'];
    $phucap = $_POST['phucap'];
    require_once '../connect.php';
    $sql = "UPDATE BACLUONG SET TENBACLUONG='$tenbacluong', LUONGCOBAN='$luongcb', THAMNIEN = '$thamnien', PHUCAP = '$phucap' WHERE MABACLUONG=$id";
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    header("Location: bacluong.php");
}
?>