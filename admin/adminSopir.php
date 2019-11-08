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
	<title>Jtravel Admin Sopir</title>
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
	$('#refresh').click(function() {
		window.location="adminSopir.php";
	});
	$('#sopir').DataTable({
		"paging":true,
		"lengthChange":true,
		"searching":true,
		"ordering":true,
		"autoWidth":true
	});
	$('#modalku').mouseenter(function() {
		$('#nama').focus();
	});
	$('#reset').click(function() {
		$('#nama').val("");
		$('#usia').val("");
		$('#alamat').val("");
		$('#telp').val("");
		$('#ket').val("");
	});
	$('#simpan').click(function() {
		var id_sopir = $('#id_sopir').val();
		var nama = $('#nama').val();
		var usia = $('#usia').val();
		var alamat = $('#alamat').val();
		var telp = $('#telp').val();
		var status = $('#status').val();
		var ket = $('#ket').val();
		$.ajax({
			url: 'simpanSopir.php',
			type: 'GET',
			data: "id_sopir="+id_sopir+"&nama="+nama+"&usia="+usia+"&alamat="+alamat+"&telp="+telp+"&status="+status+"&ket="+ket,
			success:function(data){
				$('#hasil').html(data);
				$('#nama').val("");
				$('#usia').val("");
				$('#alamat').val("");
				$('#telp').val("");
				$('#ket').val("");
				window.location="adminSopir.php";
			}
		});
	});

	$('.buka_modal_edit').click(function() {
		var id = $(this).attr('id');
		$.ajax({
			url: 'editSopir.php',
			type: 'GET',
			data: "id_sopir="+id,
			success:function(data){
				$('#modalEdit').html(data);
				$('#modalEdit').modal('show',{backdorp:'true'});
			}
		});
	});

	$('#modalEdit').mouseenter(function() {
		$('#edit_nama').focus();
		$('#resik').click(function() {
			$('#edit_nama').val("");
			$('#edit_usia').val("");
			$('#edit_alamat').val("");
			$('#edit_telp').val("");
			$('#edit_ket').val("");
		});
		$('#update').click(function() {
			var id_sopir = $('#edit_id_sopir').val();
			var nama = $('#edit_nama').val();
			var usia = $('#edit_usia').val();
			var alamat = $('#edit_alamat').val();
			var telp = $('#edit_telp').val();
			var status = $('#edit_status').val();
			var ket = $('#edit_ket').val();
			$.ajax({
				url: 'updateSopir.php',
				type: 'GET',
				data: "id_sopir="+id_sopir+"&nama="+nama+"&usia="+usia+"&alamat="+alamat+"&telp="+telp+"&status="+status+"&ket="+ket,
				success:function(data){
					$('#hasil').html(data);
					window.location="adminSopir.php";
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
					<li class="treeview active">
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
						<h3 class="modal-title"><span class="fa fa-wheelchair"></span> TAMBAH SOPIR</h3>
					</div>
					<div class="modal-body">
						<input type="text" placeholder="ID.." id="id_sopir" class="form-control" value="<?php $krj->kodeSopir(); ?>"><br>
						<input type="text" placeholder="NAMA.." id="nama" class="form-control"><br>
						<input type="text" placeholder="USIA.." id="usia" class="form-control"><br>
						<input type="text" placeholder="ALAMAT.." id="alamat" class="form-control"><br>
						<input type="text" placeholder="TELEPON.." id="telp" class="form-control"><br>
						<select id="status" class="form-control">
							<option value="1">TERSEWA</option>
							<option value="0">TIDAK TERSEWA</option>
						</select><br>
						<input type="text" placeholder="KETERANGAN.." id="ket" class="form-control"><br>
					</div>
					<div class="modal-footer">
						<button type="button" id="simpan" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> DAFTAR</button>
						<input type="hidden" id="hasil">
						<button type="button" id="reset" class="btn btn-warning"><span class="glyphicon glyphicon-erase"></span> BERSIH</button>
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
			<h3><i class="fa fa-wheelchair"></i> Data Sopir<button style="margin-right:10px" type="button" id="tambah" class="btn btn-info pull-right" data-toggle="modal" data-target="#modalku">TAMBAH <span class="glyphicon glyphicon-file"></span></button>
			<button type="butotn" id="refresh" class="btn btn-default pull-right" style="margin-right:10px"><i class="fa fa-refresh"></i> REFRESH</button>
			</h3>
		</div>
		<div class="box-body" id="tabelbaru">
		<table class="table table-default table-striped table-hover table-responsive table-condensed" id="sopir">
			<thead>
				<tr class="info">
					<th>#</th>
					<th>ID SOPIR</th>
					<th>NAMA</th>
					<th>USIA</th>
					<th>ALAMAT</th>
					<th>TELEPON</th>
					<th>STATUS</th>
					<th>KET</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$data = mysql_query("SELECT * FROM sopir");
				while ($isi = mysql_fetch_array($data)) {
				?>
				<tr>
					<td><?php echo $mulai+$no++; ?></td>
					<td><?php echo $isi[0]; ?></td>
					<td><?php echo $isi[1]; ?></td>
					<td><?php echo $isi[2]; ?></td>
					<td><?php echo $isi[3]; ?></td>
					<td><?php echo $isi[4]; ?></td>
					<td><?php if ($isi[5] == 0) {echo "<span class='label label-success'>TIDAK TERSEWA</span>";}else{echo "<span class='label label-danger'>TERSEWA</span>";} ?></td>
					<td><?php echo $isi[6]; ?></td>
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
												<a href="hapusSopir.php?id_sopir=<?php echo $isi[0]; ?>"><button type="button" class="btn btn-danger"><span class="fa fa-trash"></span> HAPUS</button></a>
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