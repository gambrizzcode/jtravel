<?php
include '../index.class.php';
$sambung = new sambung();
$krj = new kerja();
ini_set("display_errors", "off");
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
	<title>Jtravel Admin Petugas</title>
	<link rel="icon" href="../images/favJT.png">
	<link rel="stylesheet" type="text/css" href="../hover/hover.css">
	<link rel="stylesheet" type="text/css" href="../mybootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.12.1/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" type="text/css" href="../datatables/dataTables.bootstrap.css">
	<script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="../mybootstrap/js/bootstrap.js"></script>
	<script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="../bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="../AdminLTE/js/app.min.js"></script>
	<script src="../datatables/jquery.dataTables.min.js"></script>
	<script src="../datatables/dataTables.bootstrap.min.js"></script>
</head>
<script>
$(document).ready(function() {
	$('#petugas').DataTable({
		"paging":true,
		"lengthChange":true,
		"searching":true,
		"ordering":true,
		"autoWidth":true
	});
	$('#modalku').mouseenter(function() {
		$('#username').focus();
	});
	$('#refresh').click(function() {
		window.location="adminPetugas.php";
	});
	$('#username').focusout(function() {
		var user = $('#username').val();
		if (user == "") {
			$('#cek').text(" USERNAME TIDAK BOLEH KOSONG!!");
			$('#username').focus();
		}
		else{
			$.ajax({
				url: 'cekUsername.php',
				type: 'GET',
				data: "q="+user,
				success:function(data){
					$('#cek').html(data);
					var hasil = $('#state').val();
					if (hasil == 1) {
						$('#cek').removeClass('glyphicon glyphicon-alert');
						$('#cek').addClass('glyphicon glyphicon-ok');
					}
				}
			});
		}
	});
	$('#simpan').click(function() {
		var kode = $('#kode').val();
		var user = $('#username').val();
		var nama = $('#nama').val();
		var pass = $('#pass').val();
		var confirm = $('#confirm').val();
		var foto = $('#foto').val();
		if (kode != "" && user != "" && nama != "" && pass != "" && confirm !="" && foto != "") {
			$.ajax({
				url: 'simpanPetugas.php',
				type: 'GET',
				data: "kode="+kode+"&user="+user+"&nama="+nama+"&pass="+pass+"&foto="+foto,
				success:function(data){
				$('#hasil').html(data);
				kode = "";
				user = "";
				nama = "";
				pass = "";
				confirm = "";
				foto = "";
				window.location="adminPetugas.php";
			}
		});
		}
	});

	$('#pass').focusout(function(){
		var dowo = $('#pass').val().length;
		if (dowo >= 8) {
			$('#panjang').text("OKE");
			$('#panjang').removeClass('glyphicon glyphicon-alert');
			$('#panjang').addClass('glyphicon glyphicon-ok');
		}
		else{
			$('#panjang').text("MINIMAL 8 KARAKTER!!");
		}
	});
	$('#confirm').focusout(function(){
		var dowo1 = $('#pass').val();
		var dowo2 = $('#confirm').val();
		if (dowo1 == dowo2) {
			$('#panjang2').text("OKE!!");
			$('#panjang2').removeClass('glyphicon glyphicon-alert');
			$('#panjang2').addClass('glyphicon glyphicon-ok');
		}
		else{
			$('#panjang2').text("TIDAK COCOK!!");
		}
	});

	$('#reset').click(function() {
		$('#username').val("");
		$('#nama').val("");
		$('#pass').val("");
		$('#confirm').val("");
	});
	$('.buka_modal_edit').click(function() {
		var id = $(this).attr('id');
		$.ajax({
			url: 'editPetugas.php',
			type: 'GET',
			data: "kode_ptg="+id,
			success:function(data){
				$('#modalEdit').html(data);
				$('#modalEdit').modal('show',{backdorp:'true'});
			}
		});
	});
	$('#modalEdit').mouseenter(function() {
		$('#edit_username').focus();
		$('#edit_username').focusout(function() {
			var user = $('#edit_username').val();
			if (user == "") {
				$('#edit_cek').text(" USERNAME TIDAK BOLEH KOSONG!!");
				$('#edit_username').focus();
			}
			else{
				$.ajax({
					url: 'cekUsername.php',
					type: 'GET',
					data: "q="+user,
					success:function(data){
						$('#edit_cek').html(data);
						var hasil = $('#state').val();
						if (hasil == 1) {
							$('#edit_cek').removeClass('glyphicon glyphicon-alert');
							$('#edit_cek').addClass('glyphicon glyphicon-ok');
						}
					}
				});
			}
		});
		$('#update').click(function() {
			var kode = $('#edit_kode').val();
			var user = $('#edit_username').val();
			var nama = $('#edit_nama').val();
			var pass = $('#edit_pass').val();
			var confirm = $('#edit_confirm').val();
			var foto = $('#edit_foto').val();
			if (kode != "" && user != "" && nama != "" && pass != "" && confirm !="" && foto != "") {
				$.ajax({
					url: 'updatePetugas.php',
					type: 'GET',
					data: "kode="+kode+"&user="+user+"&nama="+nama+"&pass="+pass+"&foto="+foto,
					success:function(data){
					$('#hasil').html(data);
					window.location="adminPetugas.php";
				}
			});
			}
		});
		$('#edit_pass').focusout(function(){
			var dowo = $('#edit_pass').val().length;
			if (dowo >= 8) {
				$('#edit_panjang').text("OKE");
				$('#edit_panjang').removeClass('glyphicon glyphicon-alert');
				$('#edit_panjang').addClass('glyphicon glyphicon-ok');
			}
			else{
				$('#edit_panjang').text("MINIMAL 8 KARAKTER!!");
			}
		});
		$('#edit_confirm').focusout(function(){
			var dowo1 = $('#edit_pass').val();
			var dowo2 = $('#edit_confirm').val();
			if (dowo1 == dowo2) {
				$('#edit_panjang2').text("OKE!!");
				$('#edit_panjang2').removeClass('glyphicon glyphicon-alert');
				$('#edit_panjang2').addClass('glyphicon glyphicon-ok');
			}
			else{
				$('#edit_panjang2').text("TIDAK COCOK!!");
			}
		});

		$('#resik').click(function() {
			$('#edit_username').val("");
			$('#edit_nama').val("");
			$('#edit_pass').val("");
			$('#edit_confirm').val("");
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
					<li class="treeview">
						<a href="adminWisata.php" style="font-weight:bold;">
							<i class="fa fa-globe"></i>
							<span>WISATA</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="adminPaket.php" style="font-weight:bold">
							<i class="fa fa-gift"></i>
							<span>PAKET</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="adminMobil.php" style="font-weight:bold">
							<i class="fa fa-car"></i>
							<span>MOBIL</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="adminSopir.php" style="font-weight:bold">
							<i class="fa fa-wheelchair"></i>
							<span>SOPIR</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="treeview">
						<a href="adminPelanggan.php" style="font-weight:bold">
							<i class="fa fa-users"></i>
							<span>PELANGGAN</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="treeview">
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

		<div id="modalku" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"><span class="glyphicon glyphicon-user"></span> TAMBAH PETUGAS</h3>
					</div>
					<div class="modal-body">
						<form id="uploadForm" action="simpanPetugas.php" enctype="multipart/form-data" method="post">
						<input type="text" placeholder="KODE.." id="kode" class="form-control" value="<?php $krj->kodePetugas(); ?>"><br>
						<input type="text" placeholder="USERNAME.." id="username" class="form-control"><br>
						<label id="cek" class="glyphicon glyphicon-alert"></label><br><br>
						<input type="text" placeholder="NAMA.." id="nama" class="form-control"><br>
						<input type="password" placeholder="CREATE PASSWORD.." id="pass" class="form-control"><br>
						<label id="panjang" class="glyphicon glyphicon-alert"></label><br><br>
						<input type="password" placeholder="CONFIRM PASSWORD.." id="confirm" class="form-control"><br>
						<label id="panjang2" class="glyphicon glyphicon-alert"></label><br><br>
						<label>TAMBAHKAN FOTO</label>
						<input type="file" id="foto" name="gambar">
					</div><div id="hasil"></div>
					<div class="modal-footer">
						<button type="button" id="simpan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> DAFTAR</button>
						<input type="hidden" id="hasil">
						<button type="button" id="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
						</form>
					</div>
				</div>
			</div>
		</div>

<div class="content-wrapper" style="min-height:916px;">
<section class="content">
<div class="row">
<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3><i class="fa fa-user"></i> Data Petugas<button style="margin-right:10px" type="button" id="tambah" class="btn btn-info pull-right" data-toggle="modal" data-target="#modalku">TAMBAH <span class="glyphicon glyphicon-file"></span></button>
			<button type="butotn" id="refresh" class="btn btn-default pull-right" style="margin-right:10px"><i class="fa fa-refresh"></i> REFRESH</button>
			</h3>
		</div>
		<div class="box-body" id="tabelbaru">
		<table class="table table-default table-striped table-hover table-responsive table-condensed" id="petugas">
			<thead>
				<tr class="info">
					<th>#</th>
					<th>KODE PETUGAS</th>
					<th>USERNAME</th>
					<th>NAMA</th>
					<th>PASSWORD</th>
					<th>FOTO</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$data = mysql_query("SELECT * FROM petugas");
				while ($isi = mysql_fetch_array($data)) {
				?>
				<tr>
					<td><?php echo $mulai+$no++; ?></td>
					<td><?php echo $isi[0]; ?></td>
					<td><?php echo $isi[1]; ?></td>
					<td><?php echo $isi[2]; ?></td>
					<td><?php echo $isi[3]; ?></td>
					<td><?php echo $isi[4]; ?></td>
					<td>
					<button type="button" id="tombol_hapus" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#<?php echo $isi[0]; ?>"><span class="fa fa-trash"></span></button>
								<div class="modal fade" id="<?php echo $isi[0]; ?>" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<center><h3 class="modal-title">YAKIN HAPUS <i class="fa fa-question"></i></h3></center>
											</div>
											<div class="modal-body" align="center">
												<a href="hapusPetugas.php?kode_ptg=<?php echo $isi[0]; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span> HAPUS</button></a>
												&nbsp;&nbsp;&nbsp;
												<button type="button" class="btn btn-warning" data-dismiss="modal">CANCEL</button>
											</div>
										</div>
									</div>
								</div>
								&nbsp;
					<button type="button" class="btn btn-xs btn-warning buka_modal_edit" id="<?php echo $isi[0]; ?>"><span class="fa fa-edit"></span></button>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>
	</div>
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