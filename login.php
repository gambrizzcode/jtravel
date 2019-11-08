<?php
include 'index.class.php';
$sambung = new sambung();

$email = $_GET['email'];
$password = md5($_GET['password']);

$data = mysql_query("SELECT * FROM pelanggan WHERE email = '$email' AND password = '$password'");
$uhu = mysql_num_rows($data);
if ($uhu == 0) {
	echo "<center><h1>ADA YANG SALAH !!</h1>";
	echo "<a href='pelanggan.php'><h3>Kembali</h3></a></center>";
}
else{
	$isi = mysql_fetch_array($data);
	$id_pelanggan = $isi[0];
	$_SESSION['id_pelanggan'] = $id_pelanggan;
	echo "<br>OKE !!<br>";
}
?>