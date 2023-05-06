<?php
$con = new mysqli('localhost', 'root', 'root123',"schoolservicedb");
if ($con->connect_errno) {
die('Нет соединения: ' . $con->connect_error);
}