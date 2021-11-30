<?php 

$dbh = mysqli_connect("localhost","root","");

if(!$dbh){
	echo("connection failed...");
	die($dbh);
}