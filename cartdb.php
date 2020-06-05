<?php
session_start();

require_once('order.php');
class cartdb
{
public $servernam;
public $usernam;
public $passwor;
public $dbnam;
public $tablenam;
public $co;
public function __construct($dbnam="cartdb",
$tablenam="carttb",
$servernam="localhost",
$usernam="root",
$passwor="12345"
)	

{
	$this->dbnam=$dbnam;
	$this->tablenam=$tablenam;
	$this->servernam=$servernam;
	$this->usernam=$usernam;
	$this->passwor=$passwor;
	$this->co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
	if(!$this->co)
	{
		die("connection failed:".mysqli_connect_error());
	}
	$sql="create database if not exists $dbnam";
	if(mysqli_query($this->co,$sql))
	{
		$this->co=mysqli_connect($servernam,$usernam,$passwor,$dbnam);
		$sql="create table if not exists $tablenam
		(Name VARCHAR(25) NOT NULL,Address VARCHAR(255) NOT NULL,
		Phone VARCHAR(100) NOT NULL,Email VARCHAR(255) NOT NULL)";
		if(!mysqli_query($this->co,$sql)){
			echo"error creating table:".mysqli_error($this->co);
		}
	}
	else
		return false;
}
}
?>