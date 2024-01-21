<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Dentist_clinic";
;

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
