<?php
$db_hostname = "localhost";
$db_username = "fit2104";
$db_password = "fit2104";
$db_name = "fit2104_23s2_lab05";

$dsn = "mysql:host=$db_hostname;dbname=$db_name";
$dbh = new PDO($dsn, "$db_username", "$db_password");