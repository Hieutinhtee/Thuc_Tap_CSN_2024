<?php
session_start();
$id =$_GET["xid"];
require_once '../connect.php';
try {
    $sql = "DELETE FROM CHAMCONG WHERE MACHAMCONG=$id";
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
header("Location: table.php");
