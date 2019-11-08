<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
ini_set("display_errors","off");
if ($_SESSION['id_pelanggan'] != "") {
  $pilihUsername = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_SESSION[id_pelanggan]'");
  $tampilkan = mysql_fetch_array($pilihUsername);
  $pelaggan = $_SESSION['id_pelanggan'];
}
else{
  ini_set("display_errors","off");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>JTravel Agent Service</title>
  <link rel="icon" href="images/favJT.png">
	<link rel="stylesheet" type="text/css" href="hover/hover.css">
	<link rel="stylesheet" type="text/css" href="mybootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="AdminLTE/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="mybootstrap/js/bootstrap.js"></script>
	<script src="jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="slimScroll/jquery.slimscroll.min.js"></script>
	<script src="AdminLTE/js/app.min.js"></script>
</head>
<script>
$(document).ready(function() {
  $('#tombol_paket').click(function() {
    var id_transaksi = $('#id_transaksi').val();
    var id_wisata = $('#id_wisata').val();
    var id_mobil = $('#id_mobil').val();
    var id_sopir = $('#id_sopir').val();
    var id_pelanggan = $('#id_pelanggan').val();
    var tanggal = $('#tanggal').val();
    var id_paket = $('#id_paket').val();
    var penumpang = $('#penumpang').val();
    var bagasi = $('#barang').val();
    var total = $('#total').val();
    if (id_pelanggan == "") {
      window.location="pelanggan.php";
    }
    else{
     $.ajax({
        url: 'bayar.php',
        type: 'GET',
        data: "id_transaksi="+id_transaksi+"&id_pelanggan="+id_pelanggan+"&id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir+"&penumpang="+penumpang+"&barang="+barang+"&tanggal="+tanggal+"&total="+total+"&id_paket="+id_paket,
        success:function(data){
          $('#hasil_paket_terakhir').html(data);
          window.location="struk.php?id_transaksi="+id_transaksi+"&id_pelanggan="+id_pelanggan+"&id_wisata="+id_wisata+"&id_mobil="+id_mobil+"&id_sopir="+id_sopir+"&tanggal="+tanggal;
        }
      }); 
    }
  });
});
</script>
<body class="skin-purple fixed sidebar-mini wysihtml5-supported">
<div class="wrapper">
	<header class="main-header">
    <a href="index.php" class="logo">
      <span class="logo-mini">
        <b>JT</b>A
      </span>
      <span class="logo-lg">
        <b>JTravel</b> Agent
      </span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle Navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav pull-right">
        <li class="usr-menu"><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li class="dropdown notifications-menu">
              <?php if ($tampilkan[1]) {
                ?>
                <?php
                $query = mysql_query("SELECT * FROM transaksi WHERE id_pelanggan = '$tampilkan[0]' AND ket = 'TENGGANG'");
                $baris = mysql_num_rows($query);
                $kueri = mysql_query("SELECT * FROM paket");
                $row = mysql_num_rows($kueri);
                echo "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$tampilkan[1]."<span class='label label-warning'>".$baris."</span></a>";
              }else{
                echo "<a href='pelanggan.php'><b>LOGIN | DAFTAR</b></a>";
                }
                ?>
            <ul class="dropdown-menu">
              <li>
                <ul class="menu" style="height: auto;width: 100%;">
                  <li>
                    <a href="#"><i class="fa fa-money text-green"></i> TRANSAKSI DALAM MASA TENGGANG <span class="label label-warning"><?php echo $baris; ?></span>
                    </a>
                    <a href="paket.php"><i class="fa fa-gift text-green"></i>PAKET TERBARU HARI INI <span class="label label-warning"><?php echo $row; ?></span></a>
                    <a href="logout.php"><i class="fa fa-power-off text-red"></i> LOGOUT</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar" style="height:auto">
        <ul class="sidebar-menu">
          <li class="treeview">
            <a href="index.php" style="font-weight:bold;">
              <i class="fa fa-home"></i>
              <span>BERANDA</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="wisata.php" style="font-weight:bold;">
              <i class="fa fa-globe"></i>
              <span>WISATA</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li class="active">
            <a href="paket.php" style="font-weight:bold">
              <i class="fa fa-gift"></i>
              <span>PAKET</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="mobil.php" style="font-weight:bold">
              <i class="fa fa-car"></i>
              <span>MOBIL</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="sopir.php" style="font-weight:bold">
              <i class="fa fa-wheelchair"></i>
              <span>SOPIR</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="pelanggan.php" style="font-weight:bold">
              <i class="fa fa-users"></i>
              <span>PELANGGAN</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="transaksi.php" style="font-weight:bold">
              <i class="fa fa-money"></i>
              <span>TRANSAKSI</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="aboutus.php" style="font-weight:bold">
              <i class="fa fa-exclamation"></i>
              <span>ABOUT US</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-double-right pull-right"></i>
              </span>
            </a>
          </li>
        </ul>
      </section>
    </aside>

    <div class="modal fade" id="modalYakin" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h1 class="modal-title"><span class="fa fa-gift"></span> YAKIN PILIH PAKET INI ???...</h1>
          </div>
          <div class="modal-body">
            <button type="button" id="tombol_paket" class="btn btn-flat btn-danger btn-lg btn-block">
              <i class="fa fa-check"> YA, BELI</i>
            </button>
            <button type="button" class="btn btn-flat btn-warning btn-block" data-dismiss="modal"><i class="fa fa-close"> TIDAK</i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="content-wrapper">
    	<section class="content-header">
      		<h3><i class="fa fa-gift"></i> Pilihan Paket Perjalanan JTravel</h3>
    	</section>
    	<section class="content">
    		<div class="row">
    		<?php
    		$paket = mysql_query("SELECT * FROM paket INNER JOIN wisata ON paket.id_wisata = wisata.id_wisata INNER JOIN mobil ON paket.id_mobil = mobil.id_mobil LEFT JOIN sopir ON paket.id_sopir = sopir.id_sopir");
    		while ($isis = mysql_fetch_array($paket)) {
    		?>
    			<div class="col-lg-4">
    				<div class="box box-success">
    					<div class="box-header">
    						<i class="fa fa-gift"> PAKET </i> <?php echo $isis[0]; ?><button type="button" class="pull-right btn btn-info btn-sm" data-toggle="modal" data-target="#modalYakin"><i class="fa fa-check text-danger"></i> <strong>PILIH</strong></button>
                <input type="hidden" id="id_paket" value="<?php echo $isis[0]; ?>">
                <input type="hidden" id="id_transaksi" value="<?php $krj->kode_Transaksi(); ?>">
                <input type="hidden" id="id_wisata" value="<?php echo $isis[4]; ?>">
                <input type="hidden" id="id_mobil" value="<?php echo $isis[14]; ?>">
                <input type="hidden" id="id_sopir" value="<?php echo $isis[24]; ?>">
                <input type="hidden" id="tanggal" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" id="penumpang" value="<?php echo $isis[19]; ?>">
                <input type="hidden" id="barang" value="<?php echo $isis[20]; ?>">
                <input type="hidden" id="id_pelanggan" value="<?php echo $pelaggan; ?>">
                <input type="hidden" id="total" value="<?php echo ((($isis[8]*$isis[18])+$isis[9])+100000); ?>">
    					</div>
    					<div class="box-body">
    						<table>
    							<tr>
    								<center>
    									<img class="img-rounded hvr-buzz-out" src="images/<?php echo $isis[11]; ?>" style="width: 100%">
    									<b> <?php echo $isis[5]; ?></b>
    								</center>
    							</tr>
    							<tr><br></tr>
    							<tr>
    								<center>
    									<img class="img-rounded hvr-buzz-out" src="images/<?php echo $isis[21]; ?>" style="width: 100%">
    									 <b> <?php echo $isis[15]; ?> <?php echo $isis[17]; ?></b>
    								</center>
    							</tr>
    							<tr><br></tr>
    							<tr>
    								<td align="right">SOPIR : </td>
    								<td> <b> <?php echo $isis[25]; ?></b></td>
    							</tr>
    							<tr>
    								<td align="right">PENUMPANG MAX : </td>
    								<td> <b> <?php echo $isis[19]; ?> Orang</b></td>
    							</tr>
    							<tr>
    								<td align="right">BAGASI MAX : </td>
    								<td> <b> <?php echo $isis[20]; ?> KG</b></td>
    							</tr>
    							<tr>
    								<td align="right">TIKET : </td>
    								<td> <b> Rp. <?php echo number_format($isis[9],0,",","."); ?></b></td>
    							</tr>
    							<tr>
    								<td align="right">SEWA MOBIL : </td>
    								<td> <b> Rp. <?php echo number_format($isis[8]*$isis[18],0,",",".") ?></b></td>
    							</tr>
    							<tr>
    								<td align="right">SOPIR : </td>
    								<td> <b> <?php if ($isis[3] == "") {echo "-";}else{echo "Rp. 100.000";} ?></b></td>
    							</tr>
    							<tr>
    								<td align="right">TOTAL : </td>
    								<td> <b> Rp. <?php if ($isis[3] == "") {echo number_format((($isis[8]*$isis[18])+$isis[9]),0,",",".");}else{echo number_format((($isis[8]*$isis[18])+$isis[9]+100000),0,",",".");} ?></b></td>
    							</tr>
    						</table>
    					</div>
    				</div>
    			</div>
    		<?php } ?>
    		</div>
    	</section>
    </div>
    <input type="hidden" id="hasil_paket_terakhir">
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>JTravel Agent Service</b> V 1.0.0
	</div>
	Copyright 2016,
	<strong>SMK PGRI 05 Jember</strong>
</footer>
</div>
</body>
</html>