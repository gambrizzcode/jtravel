<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM paket WHERE id_paket = '$_REQUEST[id_paket]'");
header("location:adminPaket.php");
?>