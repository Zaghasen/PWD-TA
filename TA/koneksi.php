<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "gym";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if ($koneksi->connect_error) {
    die("TIDAK BISA TERKONEKSI KE DATABASE : ' . $koneksi -> connect_error");
}
