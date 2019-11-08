<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
class sambung{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $name = "jtravel";

	function __construct(){
		mysql_connect($this->host,$this->user,$this->pass);
		// mysqli_connect($this->host,$this->user,$this->pass,$this->name);
		mysql_select_db($this->name);
	}
}
// die();
class kerja{
	function kodePetugas(){
		$data = mysql_query("SELECT * FROM petugas");
		$baris = mysql_num_rows($data)+1;
		echo "PTG-00".$baris;
	}
	function simpanPetugas($a,$b,$c,$d,$e){
		mysql_query("INSERT INTO petugas VALUES('$a','$b','$c','$d','$e')");
	}
	function updatePetugas($a,$b,$c,$d,$e){
		mysql_query("UPDATE petugas SET username = '$b', nama = '$c', password = '$d', foto = '$e' WHERE kode_ptg = '$a'");
	}
	function kodeWisata(){
		$data = mysql_query("SELECT * FROM wisata");
		$baris = mysql_num_rows($data)+1;
		echo "DES_WI-0".$baris;
	}
	function simpanWisata($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		mysql_query("INSERT INTO wisata VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')");
	}
	function totalWisata(){
		$data = mysql_query("SELECT * FROM wisata");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function bukaWisata(){
		$data = mysql_query("SELECT * FROM wisata WHERE status = '1'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function tutupWisata(){
		$data = mysql_query("SELECT * FROM wisata WHERE status = '0'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function updateWisata($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		mysql_query("UPDATE wisata SET nama = '$b', alamat = '$c', jenis = '$d', jarak = '$e', tiket = '$f', telp = '$g', gambar = '$h', status = '$i', ket = '$j' WHERE id_wisata = '$a'");
	}
	function kodeSopir(){
		$data = mysql_query("SELECT * FROM sopir");
		$baris = mysql_num_rows($data)+1;
		echo "DRV-00".$baris;
	}
	function simpanSopir($a,$b,$c,$d,$e,$f,$g){
		mysql_query("INSERT INTO sopir VALUES('$a','$b','$c','$d','$e','$f','$g')");
	}
	function totalSopir(){
		$data = mysql_query("SELECT * FROM sopir");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function sewaSopir(){
		$data = mysql_query("SELECT * FROM sopir WHERE status = '1'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function tidakSewaSopir(){
		$data = mysql_query("SELECT * FROM sopir WHERE status = '0'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function updateSopir($a,$b,$c,$d,$e,$f,$g){
		mysql_query("UPDATE sopir SET nama = '$b', usia = '$c', alamat = '$d', telp = '$e', status = '$f', ket = '$g' WHERE id_sopir = '$a'");
	}
	function kodeMobil(){
		$data = mysql_query("SELECT * FROM mobil");
		$baris = mysql_num_rows($data)+1;
		echo "CAR-00".$baris;
	}
	function simpanMobil($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		mysql_query("INSERT INTO mobil VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')");
	}
	function totalMobil(){
		$data = mysql_query("SELECT * FROM mobil");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function sewaMobil(){
		$data = mysql_query("SELECT * FROM mobil WHERE status = '1'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function tidakSewaMobil(){
		$data = mysql_query("SELECT * FROM mobil WHERE status = '0'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function updateMobil($a,$b,$c,$d,$e,$f,$g,$h,$i,$j){
		mysql_query("UPDATE mobil SET merk = '$b', type = '$c', nama = '$d', biayaperkm = '$e', penumpangmax = '$f', bagasimax = '$g',gambar = '$h', status = '$i', ket = '$j' WHERE id_mobil = '$a'");
	}
	function kodePelanggan(){
		$data = mysql_query("SELECT * FROM pelanggan");
		$baris = mysql_num_rows($data)+1;
		echo "PLG-0".$baris;
	}
	function simpanPelanggan($a,$b,$c,$d,$e,$f,$g){
		mysql_query("INSERT INTO pelanggan VALUES('$a','$b','$c','$d','$e','$f','$g')");
	}
	function totalPelanggan(){
		$data = mysql_query("SELECT * FROM pelanggan");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function aktifPelanggan(){
		$data = mysql_query("SELECT * FROM pelanggan WHERE ket = ''");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function tenggangPelanggan(){
		$data = mysql_query("SELECT * FROM pelanggan WHERE ket = 'TENGGANG'");
		$baris = mysql_num_rows($data);
		echo $baris;
	}
	function updatePelanggan($a,$b,$c,$d,$e,$f,$g){
		mysql_query("UPDATE pelanggan SET nama = '$b', password = '$c', alamat = '$d', telp = '$e', email = '$f', ket = '$g' WHERE id_pelanggan = '$a'");
	}
	function saldo(){
		$hari_ini = date('Y-m-d');
		//$hari_sebelumnya = date('Y-m-d',strtotime('-7 days'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal <> '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo number_format($isi[0],0,",",".");
	}
	function total(){
		$data = mysql_query("SELECT SUM(total) FROM transaksi");
		$isi = mysql_fetch_array($data);
		echo number_format($isi[0],0,",",".");
	}
	function hari_ini(){
		$hari_ini = date('Y-m-d');
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo number_format($isi[0],0,",",".");
	}
	function hari_ini_0(){
		$hari_ini = date('Y-m-d');
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_1(){
		$hari_ini = date('Y-m-d',strtotime('-1 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_2(){
		$hari_ini = date('Y-m-d',strtotime('-2 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_3(){
		$hari_ini = date('Y-m-d',strtotime('-3 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_4(){
		$hari_ini = date('Y-m-d',strtotime('-4 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_5(){
		$hari_ini = date('Y-m-d',strtotime('-5 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function hari_ini_6(){
		$hari_ini = date('Y-m-d',strtotime('-6 day'));
		$data = mysql_query("SELECT SUM(total) FROM transaksi WHERE tanggal = '$hari_ini'");
		$isi = mysql_fetch_array($data);
		echo $isi[0];
		// echo number_format($isi[0],0,",",".");
	}
	function kode_transaksi(){
		$waktu = date('ymd/his');
		$data = mysql_query("SELECT * FROM transaksi");
		$baris = mysql_num_rows($data)+1;
		echo "JT_".$waktu."-".$baris;
	}
	function bayar($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		mysql_query("INSERT INTO transaksi VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k')");
	}
	function bayar_transaksi($a,$b){
		mysql_query("UPDATE transaksi SET ket = 'LUNAS', kode_ptg = '$b' WHERE id_transaksi = '$a'");
	}
	function simpanPaket($a,$b,$c,$d){
		mysql_query("INSERT INTO paket VALUES('$a','$b','$c','$d')");
	}
	function kodePaket(){
		$data = mysql_query("SELECT id_paket FROM paket ORDER BY id_paket DESC");
		$baris = mysql_fetch_array($data);
		echo $baris[0]+1;
	}
	function updatePaket($a,$b,$c,$d){
		mysql_query("UPDATE paket SET id_wisata = '$b', id_mobil = '$c', id_sopir = '$d' WHERE id_paket = '$a'");
	}
	function statusPelanggan($a,$b){
		mysql_query("UPDATE pelanggan SET ket = '$b' WHERE id_pelanggan = '$a'");
	}
	function statusMobil($a){
		mysql_query("UPDATE mobil SET status = '1' WHERE id_mobil = '$a'");
	}
	function statusSopir($a){
		mysql_query("UPDATE sopir SET status = '1' WHERE id_sopir = '$a'");
	}
}
?>