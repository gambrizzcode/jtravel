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
	<title>JTravel Admin Mobil</title>
	<link rel="icon" href="../images/favJT.png">
	<link rel="stylesheet" type="text/css" href="../hover/hover.css">
	<link rel="stylesheet" type="text/css" href="../mybootstrap/css/bootstrap.min.css">
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
	$('#refresh').click(function() {
		window.location="adminMobil.php";
	});
	$('#mobil').DataTable({
		"paging":true,
		"lengthChange":true,
		"searching":true,
		"ordering":true,
		"autoWidth":true
	});
	$('#modalku').mouseenter(function() {
		$('#merk').focus();
	});
	$('#reset').click(function() {
		$('#merk').val("");
		$('#type').val("");
		$('#nama').val("");
		$('#biayaperkm').val("");
		$('#penumpangmax').val("");
		$('#bagasimax').val("");
		$('#gambar').val("");
		$('#status').val("");
		$('#ket').val("");
	});
	$('#simpan').click(function() {
		var id_mobil = $('#id_mobil').val();
		var merk = $('#merk').val();
		var type = $('#type').val();
		var nama = $('#nama').val();
		var biayaperkm = $('#biayaperkm').val();
		var penumpangmax = $('#penumpangmax').val();
		var bagasimax = $('#bagasimax').val();
		var gambar = $('#gambar').val();
		var status = $('#status').val();
		var ket = $('#ket').val();
		$.ajax({
			url: 'simpanMobil.php',
			type: 'GET',
			data: "id_mobil="+id_mobil+"&merk="+merk+"&type="+type+"&nama="+nama+"&biayaperkm="+biayaperkm+"&penumpangmax="+penumpangmax+"&bagasimax="+bagasimax+"&gambar="+gambar+"&status="+status+"&ket="+ket,
			success:function(data){
				$('#hasil').html(data);
				window.location="adminMobil.php";
			}
		});		
	});
	$('.buka_modal_edit').click(function() {
		var id = $(this).attr('id');
		$.ajax({
			url: 'editMobil.php',
			type: 'GET',
			data: "id_mobil="+id,
			success:function(data){
				$('#modalEdit').html(data);
				$('#modalEdit').modal('show',{backdorp:'true'});
			}
		});
	});
	$('#modalEdit').mouseenter(function() {
		$('#resik').click(function() {
			$('#edit_merk').focus();
			$('#edit_type').val("");
			$('#edit_nama').val("");
			$('#edit_biayaperkm').val("");
			$('#edit_penumpangmax').val("");
			$('#edit_bagasimax').val("");
			$('#edit_gambar').val("");
			$('#edit_ket').val("");
		});
		$('#update').click(function() {
			var id_mobil = $('#edit_id_mobil').val();
			var merk = $('#edit_merk').val();
			var type = $('#edit_type').val();
			var nama = $('#edit_nama').val();
			var biayaperkm = $('#edit_biayaperkm').val();
			var penumpangmax = $('#edit_penumpangmax').val();
			var bagasimax = $('#edit_bagasimax').val();
			var gambar = $('#edit_gambar').val();
			var status = $('#edit_status').val();
			var ket = $('#edit_ket').val();
			$.ajax({
				url: 'updateMobil.php',
				type: 'GET',
				data: "id_mobil="+id_mobil+"&merk="+merk+"&type="+type+"&nama="+nama+"&biayaperkm="+biayaperkm+"&penumpangmax="+penumpangmax+"&bagasimax="+bagasimax+"&gambar="+gambar+"&status="+status+"&ket="+ket,
				success:function(data){
					$('#edit_hasil').html(data);
					window.location="adminMobil.php";
				}
			});		
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
					<li>
						<a href="adminPaket.php" style="font-weight:bold">
							<i class="fa fa-gift"></i>
							<span>PAKET</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-double-right pull-right"></i>
							</span>
						</a>
					</li>
					<li class="active">
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

<div id="modalku" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"><span class="fa fa-car"></span> TAMBAH MOBIL</h3>
					</div>
					<div class="modal-body">
						<form id="uploadForm" action="simpanMobil.php" enctype="multipart/form-data" method="post">
						<input type="text" placeholder="ID.." id="id_mobil" class="form-control" value="<?php $krj->kodeMobil(); ?>"><br>
						<input type="text" placeholder="MERK.." id="merk" class="form-control"><br>
						<input type="text" placeholder="TYPE.." id="type" class="form-control"><br>
						<input type="text" placeholder="NAMA.." id="nama" class="form-control"><br>
						<input type="text" placeholder="BIAYA PER KM.." id="biayaperkm" class="form-control"><br>
						<input type="text" placeholder="PENUMPANG MAXIMUM.." id="penumpangmax" class="form-control"><br>
						<input type="text" placeholder="BAGASI MAXIMUM.." id="bagasimax" class="form-control"><br>
						<input type="file" placeholder="GAMBAR.." id="gambar" name="gambar"><br>
						<select id="status" class="form-control">
							<option value="1">TERSEWA</option>
							<option value="0">TIDAK TERSEWA</option>
						</select><br>
						<input type="text" placeholder="KETERANGAN.." id="ket" class="form-control"><br>
					</div>
					<div class="modal-footer">
						<button type="submit" id="simpan" name="simpan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> DAFTAR</button>
						<input type="hidden" id="hasil">
						<button type="button" id="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
						</form>
					</div>
				</div>
			</div>
		</div>

<div class="content-wrapper" style="min-height:916px">
<section class="content">
<div class="row">
	<div class="col-xs-12">
			<div class="box" id="tabelbaru">
				<div class="box-header">
					<h3><i class="fa fa-car"></i> Data Mobil <button style="margin-right:10px" type="button" id="tambah" class="btn btn-info pull-right" data-toggle="modal" data-target="#modalku">TAMBAH <span class="glyphicon glyphicon-file"></span></button>
					<button type="butotn" id="refresh" class="btn btn-default pull-right" style="margin-right:10px"><i class="fa fa-refresh"></i> REFRESH</button>
					</h3>
				</div>
					<div class="box-body">
						<table class="table table-default table-striped table-hover table-responsive table-condensed" id="mobil">
						<thead>
							<tr class="info">
								<th>#</th>
								<th>ID_MOBIL</th>
								<th>MERK</th>
								<th>TYPE</th>
								<th>NAMA</th>
								<th>BIAYA PER KM</th>
								<th>PENUMPANG MAX</th>
								<th>BAGASI MAX</th>
								<th>GAMBAR</th>
								<th>STATUS</th>
								<th>KET</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$data = mysql_query("SELECT * FROM mobil");
							while ($isi = mysql_fetch_array($data)) {
							?>
							<tr>
								<td><?php echo $mulai+$no++; ?></td>
								<td><?php echo $isi[0]; ?></td>
								<td><?php echo $isi[1]; ?></td>
								<td><?php echo $isi[2]; ?></td>
								<td><?php echo $isi[3]; ?></td>
								<td><?php echo "Rp. ".number_format($isi[4],0,",","."); ?></td>
								<td><?php echo $isi[5]." Orang"; ?></td>
								<td><?php echo $isi[6]. " KG"; ?></td>
								<td><?php echo $isi[7]; ?></td>
								<td><?php if ($isi[8] == 0) {echo "<span class='label label-success'>TIDAK TERSEWA</span>";}else{echo "<span class='label label-danger'>TERSEWA</span>";} ?></td>
								<td><?php echo $isi[9]; ?></td>
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
												<a href="hapusMobil.php?id_mobil=<?php echo $isi[0]; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span> HAPUS</button></a>
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