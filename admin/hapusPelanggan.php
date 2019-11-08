<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM pelanggan WHERE id_pelanggan = '$_REQUEST[id_pelanggan]'");
header("location:adminPelanggan.php");
?>