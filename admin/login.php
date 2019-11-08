<?php
include '../index.class.php';
$sambung = new sambung();

$user = $_REQUEST['username'];
$pass = md5($_REQUEST['password']);
	
$query = mysql_query("SELECT * FROM petugas WHERE username = '$user' AND password = '$pass'");
$row = mysql_num_rows($query);
if ($row == 0) {
	echo "<center><h1>ADA YANG SALAH !!</h1>";
	echo "<a href='index.php'><h3>Kembali</h3></a></center>";
}
else{
	echo "<br>OKE !!<br>";
	$user = $_REQUEST['username'];
	$_SESSION['username'] = $user;
	header("location:home.php");
}
?>