<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
$data = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id_pelanggan]'");
$baris = mysql_num_rows($data);
if ($baris != 0) {
	echo "<i class='fa fa-check text-success'></i>";
}
else{
	echo "<i class='fa fa-close text-danger'></i>";
}
?>