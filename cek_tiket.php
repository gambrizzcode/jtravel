<?php
include 'index.class.php';
$sambung = new sambung();
$data = mysql_query("SELECT * FROM wisata WHERE id_wisata = '$_GET[id_wisata]'");
$isi = mysql_fetch_array($data);
echo "<input type='hidden' id='harga_tiket' value='".$isi[5]."'>";
echo "Rp. ".number_format($isi[5],0,",",".");
?>