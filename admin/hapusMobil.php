<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM mobil WHERE id_mobil = '$_REQUEST[id_mobil]'");
header("location:adminMobil.php");
?>