<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'k3143_bmu';
$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
echo "Вы подключились!<br>";