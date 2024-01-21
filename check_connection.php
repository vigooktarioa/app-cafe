<?php
require_once 'proses/koneksi.php'; // Make sure the path to Koneksi.php is correct

$koneksi = new Koneksi();
$dbConnection = $koneksi->DBConnect();

if ($dbConnection instanceof PDO) {
    echo "Connection is successful.";
} else {
    echo $dbConnection; // This will echo the error message if connection failed
}
?>