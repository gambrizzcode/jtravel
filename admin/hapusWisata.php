<?php
include '../index.class.php';
$sambung = new sambung();

mysql_query("DELETE FROM wisata WHERE id_wisata = '$_REQUEST[id_wisata]'");
header("location:adminWisata.php");
?>