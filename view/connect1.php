<?php

$uri = "mysql://avnadmin:AVNS_3rz19mfNZ1JSs113i90@mysql-117e64ac-hieuthaiminh05-bb3b.j.aivencloud.com:25375/QLNS4H?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$dbconnect = "mysql:";
$dbconnect .= "host=" . $fields["host"];
$dbconnect .= ";port=" . $fields["port"];;
$dbconnect .= ";dbname=QLNS4H";
$dbconnect .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $conn = new PDO($dbconnect, $fields["user"], $fields["pass"]);  
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>

