<?php

$db_user = "root";
$db_pass = 'avslTgJYQLs4';
$db_name = "omnitool";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);