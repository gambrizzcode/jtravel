<?php
include '../index.class.php';
$sambung = new sambung();

$q = $_GET['q'];

$data = mysql_query("SELECT * FROM petugas WHERE username = '".$q."'");
$row = mysql_num_rows($data);
if ($row == 0) {
	echo "USERNAME OK!!";
	echo "<input type='hidden' id='state' value='1'>";
}
else{
	echo "Username sudah digunakan, Coba yang lain!!";
	echo "<input type='hidden' id='state' value='0'>";
}
?>