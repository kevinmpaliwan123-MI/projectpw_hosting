<?php

$host = "127.0.0.1";
$db   = "db_joki";
$user = "root";
$pass = "hagi";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
