<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'welcarecollegeof_applications_db';

$conn = mysqli_connect($hostname, $username, $password, $db_name);
if ($conn) {
} else {
    echo 'connect failed!';
}

date_default_timezone_set('Asia/Calcutta');
