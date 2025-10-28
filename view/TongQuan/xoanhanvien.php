<?php
session_start();
$id =$_GET["xid"];
require_once '../connect.php';


try {
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // sql to delete a record
    $sql = "DELETE FROM NHANVIEN WHERE MANV=$id";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    $_SESSION["toast"] = "oke";
    echo "Record deleted successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
header("Location: dsnhanvien.php");
