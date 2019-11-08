<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
ini_set("display_errors","off");
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
	<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="mybootstrap/js/bootstrap.js"></script>
	<script src="jquery-ui-1.12.1/jquery-ui.js"></script>
</head>
<body class="hold-transition login-page">
	<div class="wrapper">
		<!-- <div class="login-box"> -->
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<div class="login-logo">
						<b>JT</b>ravel <b>e</b>-<b>N</b>ota
					</div>
					<div class="login-box-body bg-blue" style="border-radius:5px">
						<div class="box box-primary bg-aqua">
							<div class="box-header with-border">
								<?php
								$data_pelanggan = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_REQUEST[id_pelanggan]'");
								$isi_pelanggan = mysql_fetch_array($data_pelanggan);
								?>
								<label><?php echo $_REQUEST['id_transaksi']; ?></label><br>
								<?php echo $isi_pelanggan[1]; ?> (<?php echo $isi_pelanggan[0]; ?>)
								<i class="pull-right"><?php echo $_REQUEST['tanggal']; ?></i>
							</div>
							<div class="box-body">
								<?php
								$data_wisata = mysql_query("SELECT * FROM wisata WHERE id_wisata = '$_REQUEST[id_wisata]'");
								$isi_wisata = mysql_fetch_array($data_wisata);
								?>
								<strong>
									<?php echo $isi_wisata[1]; ?> (<?php echo $isi_wisata[4]." KM"; ?>)<i class="pull-right"><?php echo "Rp. ".number_format($isi_wisata[5],0,",","."); ?></i>
								</strong><br>

								<?php
								$data_mobil = mysql_query("SELECT * FROM mobil WHERE id_mobil = '$_REQUEST[id_mobil]'");
								$isi_mobil = mysql_fetch_array($data_mobil);
								?>
								<strong>
									<?php echo $isi_mobil[1]; ?> <?php echo $isi_mobil[3]; ?> (<?php echo "Rp. ".number_format($isi_mobil[4],0,",",".")." /KM"; ?>)<i class="pull-right"><?php echo "Rp. ".number_format($isi_mobil[4]*$isi_wisata[4],0,",","."); ?></i>
								</strong><br>

								<?php
								if ($_REQUEST['id_sopir'] != "") {
								$data_sopir = mysql_query("SELECT * FROM sopir WHERE id_sopir = '$_REQUEST[id_sopir]'");
								$isi_sopir = mysql_fetch_array($data_sopir);
								?>
								<strong>
									<?php echo $isi_sopir[1]; ?> <i class="pull-right">Rp. 100.000</i>
								</strong>
								<br>
								<br>
								<strong>
									TOTAL <i class="pull-right lead"><?php echo "Rp. ".number_format((($isi_mobil[4]*$isi_wisata[4])+$isi_wisata[5]+100000),0,",",".") ?></i>
								</strong>
								<br>
								<?php }else{ ?>
								<br>
								<strong>
									TOTAL <i class="pull-right lead"><?php echo "Rp. ".number_format((($isi_mobil[4]*$isi_wisata[4])+$isi_wisata[5]),0,",",".") ?></i>
								</strong>
								<br>
								<?php
								} ?><br><br>
								<div class="well bg-yellow">
									<p>Silahkan <u><b>ScreenShoot</b></u> e-Nota ini dan Tunjukkan Kepada Operator Pada Saat COD Di Kantor Kami. <i>Terima Kasih</i>. <i class="fa fa-thumbs-up"></i></p>
								</div>
								<center><a href="index.php"><h4><u>KEMBALI</u></h4></a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div>
</body>
</html>