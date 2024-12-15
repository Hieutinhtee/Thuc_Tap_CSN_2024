<?php
if (isset($_GET["suaid"])) {
    session_start();
    $id = $_GET["suaid"];
    $luongcb = $_POST['lcb'];
    $tenbacluong = $_POST['tenbacluong'];
    $luongtc = $_POST['ltc'];
    $hotro = $_POST['hotro'];
    $phucap = $_POST['phucap'];
    require_once '../connect.php';
    $sql = "UPDATE BACLUONG SET TENBACLUONG='$tenbacluong', LUONGCOBAN='$luongcb', LUONGTANGCA='$luongtc', HOTRO = '$hotro', PHUCAP = '$phucap' WHERE MABACLUONG=$id";
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    header("Location: bacluong.php");
}
?>