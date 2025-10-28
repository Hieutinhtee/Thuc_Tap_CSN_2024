<?php
$servername = "localhost";
$username1 = "root";
$password1 = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=hhhh1", $username1, $password1);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>