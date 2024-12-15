<?php
$id = $_GET["xid"];
require_once '../connect.php';
session_start();

try {
    $sql = "DELETE FROM CONGTAC WHERE MACONGTAC=$id";

    // use exec() because no results are returned
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
header("Location: qlct.php");