<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();

if ($_SESSION['username']) {}
else{header("location:index.php");}
$pilihUsername = mysql_query("SELECT * FROM petugas WHERE username = '$_SESSION[username]'");
$tampilkan = mysql_fetch_array($pilihUsername);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>JTravel Admin Paket</title>
	<link rel="icon" href="../images/favJT.png">
	<link rel="stylesheet" type="text/css" href="../hover/hover.css">
	<link rel="stylesheet" type="text/css" href="../mybootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.12.1/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="../mybootstrap/js/bootstrap.js"></script>
	<script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="../bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="../AdminLTE/js/app.min.js"></script>
</head>
<script>
$(document).ready(function() {
	$('#refresh').click(function() {
		window.location="adminPaket.php";
	});
	$('#tombol_paket').click(function() {
		var id_paket = $('#id_paket').val();
		var paket_wisata = $('#paket_wisata').val();
		var paket_mobil = $('#paket_mobil').val();
		var paket_sopir = $('#paket_sopir').val();
			$.ajax({
				url: 'simpanPaket.php',
				type: 'GET',
				data: "id_paket="+id_paket+"&paket_wisata="+paket_wisata+"&paket_mobil="+paket_mobil+"&paket_sopir="+paket_sopir,
				success:function(data){
					$('#paket_hasil').html(data);
					window.location="adminPaket.php";
				}
			});
	});
	$('.buka_modal_edit').click(function() {
		var id_paket = $(this).attr('id');
		$.ajax({
			url: 'editPaket.php',
			type: 'GET',
			data: "id_paket="+id_paket,
			success:function(data){
				$('#modalEdit').html(data);
				$('#modalEdit').modal('show',{backdorp:'true'});
			}
		});
	});
	$('#modalEdit').mouseenter(function() {
		$('#edit_paket').click(function(event) {
			var id_paket = $('#edit_id_paket').val();
			var paket_wisata = $('#edit_paket_wisata').val();
			var paket_mobil = $('#edit_paket_mobil').val();
			var paket_sopir = $('#edit_paket_sopir').val();
			if(id_paket!="" && id_wisata!="" && id_mobil!=""||id_sopir!=""){
				$.ajax({
					url: 'updatePaket.php',
					type: 'GET',
					data: "id_paket="+id_paket+"&paket_wisata="+paket_wisata+"&paket_mobil="+paket_mobil+"&paket_sopir="+paket_sopir,
					success:function(data){
						$('#edit_paket_hasil').html(data);
						window.location="adminPaket.php";
					}
				});
			}
			else{}
		});
	});
});
</script>
<body class="skin-red sidebar-mini wysihtml5-supported">
<div class="wrapper">
	<header class="main-header">
		<a href="home.php" class="logo">
			<span class="logo-mini">
				<b>JT</b>A
			</span>
			<span class="logo-lg">
				<b>JTravel</b> Admin
			</span>
		</a>
		
		<nav class="navbar navbar-static-top">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle Navigation</span>
			</a>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="user-menu"><a href="#"><?php echo $tampilkan[2]; ?></a></li>
					<li class="active"><a href="logout.php"><i class="fa fa-power-off"></i></a></li>
				</ul>
			</div>
		</nav>
		</header>

		<aside class="main-sidebar">
			<section class="sidebar" style="height:auto">
				<ul class="sidebar-menu">
					<div class="user-panel">
						<div class="pull-left image">
							<img src="../images/<?php echo $tampilkan[4]; ?>" alt="User Image" class="img-circle">
						</div>
						<div class="pull-left info">
							<p><?php echo $tampilkan[2]; ?></p>
							<a href="#">
								<i class="fa fa-circle text-success"></i>
								ONLINE
							</a>
						</div>
					</div>
					<li class="treeview">
						<a href="home.php" style="font-weight:bold;">
							<i class="fa fa-dashboard"></i>
							<span>DASHBOARD</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="adminWisata.php" style="font-weight:bold;">
							<i class="fa fa-globe"></i>
							<span>WISATA</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="active">
						<a href="adminPaket.php" style="font-weight:bold">
							<i class="fa fa-gift"></i>
							<span>PAKET</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="adminMobil.php" style="font-weight:bold">
							<i class="fa fa-car"></i>
							<span>MOBIL</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="adminSopir.php" style="font-weight:bold">
							<i class="fa fa-wheelchair"></i>
							<span>SOPIR</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="adminPelanggan.php" style="font-weight:bold">
							<i class="fa fa-users"></i>
							<span>PELANGGAN</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="adminKeuangan.php" style="font-weight:bold">
							<i class="fa fa-usd"></i>
							<span>KEUANGAN</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<?php
					if ($tampilkan[2] != "SUPERUSER") {
						
					}
					else{?>
					<li>
						<a href="adminPetugas.php" style="font-weight:bold">
							<i class="fa fa-user"></i>
							<span>PETUGAS</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper" style="min-height:916px">
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="box box-success">
							<div class="box-header">
								<h3>
									<span class="fa fa-gift"></span> DATA PAKET
									<button type="butotn" id="refresh" class="btn btn-default pull-right" style="margin-right:10px"><i class="fa fa-refresh"></i> REFRESH</button>
								</h3>
							</div>
							<div class="box-body">
								<div class="form-inline">
								<input type="hidden" id="id_paket" value="<?php echo $krj->kodePaket(); ?>">
									<label>WISATA : </label>
									<select id="paket_wisata" class="form-control">
										<option value="">--- PILIH WISATA ---</option>
									<?php
									$paket_wisata = mysql_query("SELECT * FROM wisata WHERE status = '1'");
									while ($pw = mysql_fetch_array($paket_wisata)) {
									?>
										<option value="<?php echo $pw[0]; ?>"><?php echo $pw[1]; ?></option>
									<?php } ?>
									</select>
									&nbsp;&nbsp;&nbsp;
									<label>MOBIL : </label>
									<select id="paket_mobil" class="form-control">
										<option value="">--- PILIH MOBIL ---</option>
									<?php
									$paket_mobil = mysql_query("SELECT * FROM mobil WHERE status = '0'");
									while ($pm = mysql_fetch_array($paket_mobil)) { ?>
										<option value="<?php echo $pm[0]; ?>"><?php echo $pm[1]; ?> <?php echo $pm[3]; ?></option>
									<?php
									}
									?>
									</select>
									&nbsp;&nbsp;&nbsp;
									<label>SOPIR : </label>
									<select id="paket_sopir" class="form-control">
										<option value="">--- PILIH SOPIR ---</option>
									<?php
									$paket_sopir = mysql_query("SELECT * FROM sopir WHERE status = '0'");
									while ($ps = mysql_fetch_array($paket_sopir)) { ?>
										<option value="<?php echo $ps[0]; ?>"><?php echo $ps[1]; ?></option>
									<?php
									}
									?>
									</select>
									<button type="button" class="btn btn-success btn-flat pull-right" id="tombol_paket">&nbsp;&nbsp;&nbsp;<i class="fa fa-gift"></i> BUAT PAKET&nbsp;&nbsp;&nbsp;</button>
									<input type="hidden" id="paket_hasil">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<?php
				$no = 1;
				$paket = mysql_query("SELECT * FROM paket INNER JOIN wisata ON paket.id_wisata = wisata.id_wisata INNER JOIN mobil ON paket.id_mobil = mobil.id_mobil LEFT JOIN sopir ON paket.id_sopir = sopir.id_sopir");
				while ($isis = mysql_fetch_array($paket)) {
				?>
					<div class="col-lg-4">
						<div class="box box-success">
							<div class="box-header">
								<label><i class="fa fa-gift"></i> PAKET <?php echo $isis[0]; ?></label>
								<div class="pull-right">
								<button type="button" id="tombol_hapus" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal<?php echo $isis[0]; ?>"><span class="fa fa-trash"></span></button>
								<div class="modal fade" id="modal<?php echo $isis[0]; ?>" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<center><h3 class="modal-title">YAKIN HAPUS <i class="fa fa-question"></i></h3></center>
											</div>
											<div class="modal-body" align="center">
												<a href="hapusPaket.php?id_paket=<?php echo $isis[0]; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span> HAPUS</button></a>
												&nbsp;&nbsp;&nbsp;
												<button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
											</div>
										</div>
									</div>
								</div>
								&nbsp;
									<button type="button" class="btn btn-xs btn-warning buka_modal_edit" id="<?php echo $isis[0]; ?>"><span class="fa fa-edit"></span></button>
								</div>
							</div>
							<div class="box-body">
								WISATA : <b><?php echo $isis[5]; ?></b><br>
								MOBIL : <b><?php echo $isis[15]; ?> <?php echo $isis[17]; ?></b><br>
								SOPIR : <b><?php echo $isis[25]; ?></b><br>
								PENUMPANG MAX : <b><?php echo $isis[19]; ?> Orang</b><br>
								BAGASI MAX : <b><?php echo $isis[20]; ?> KG</b><br>
								TIKET : <b>Rp. <?php echo number_format($isis[9],0,",","."); ?></b><br>
								SEWA MOBIL : <b>Rp. <?php echo number_format($isis[8]*$isis[18],0,",",".") ?></b><br>
								SOPIR : <b><?php if ($isis[3] == "") {echo "-";}else{echo "Rp. 100.000";} ?></b><br>
								TOTAL :  <b>Rp. <?php if ($isis[3] == "") {echo number_format((($isis[8]*$isis[18])+$isis[9]),0,",",".");}else{echo number_format((($isis[8]*$isis[18])+$isis[9]+100000),0,",",".");} ?></b>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
				<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
				</div>
			</section>
		</div>

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>JTravel Admin Control Panel</b> V 1.0.0
		</div>
		Copyright 2016,
		<strong>SMK PGRI 05 Jember</strong>
</footer>
</div>
</body>
</html>