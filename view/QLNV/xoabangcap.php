<?php
$id = $_GET["xid"];
require_once '../connect.php';
session_start();

try {
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM BANGCAP WHERE MABANGCAP=$id";

    // use exec() because no results are returned
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
header("Location: bangcap.php");