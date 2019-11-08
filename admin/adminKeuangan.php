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
	<title>JTravel Admin Keuangan</title>
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
	<script src="../chartjs/Chart.min.js"></script>
</head>
<script>
$(document).ready(function() {
	$('#transaksi').DataTable({
		"paging":true,//pembagian halaman
		"lengthChange":true,//ubah jumlah data yang ditampilkan
		"searching":true,//pencarian
		"ordering":true,//pengurutan berdasarkan
		"autoWidth":true//lebar otomatis
	});
	$('#refresh').click(function() {//ketika tombol refresh diklik
		window.location="adminKeuangan.php";//mengarah ke halaman ini, sama aja dengan direfresh (iya kan ?? :-P)
	});
	$('#tombol_transaksi').click(function() {//ketika tombol transaksi diklik
		$('#id_transaksi').val("");//mengosongkna textbox id_transaksi
	});
	$('.mbayar').click(function() {//ketika tombol mbayar diklik
		//tombol mbayar itu tombol yang berada di masing" id_transaksi di tabel
		var tombol_id_transaksi = $(this).attr('id');//membuat variabel tombol_id_transaksi dengan value dari id tombol mbayar ini sendiri
		$('#id_transaksi').val(tombol_id_transaksi);//textbox id_transaksi menjadi berisi nilai dari variabel tombol_id_transaksi
	});
	$('#bayar').click(function() {//ketika tombol bayar diklik
		var id_transaksi = $('#id_transaksi').val();//membuat variabel id_transaksi dengan mengambil value dari textbox id_transaksi
		var kode_ptg = $('#kode_ptg').val();//membuat variabel kode_ptg dengan mengambil value dari input type hidden kode_ptg yang berisi kode petugas yang diambil dari sessionyang telah dibuat pada saat login
		var id_pelanggan = $('.mbayar').attr('name');
		$.ajax({
			url: 'bayar.php',//kirim data ke <-
			type: 'GET',//dengan type <-
			data: "id_transaksi="+id_transaksi+"&kode_ptg="+kode_ptg+"&id_pelanggan="+id_pelanggan,//mengirim variabel id_transaksi dan kode_ptg
			//ajax ini digunakan untuk melakukan pelunasan bagi pelanggan yang sudah datang ke kantor jtravel
			//pelanggan sudah dapat menikmati layanan kami dan pelanggan tersebut sudah tidak dalam masa tenggang
			success:function(data){//jika ajax berhasil
				$('#hasil_bayar').html(data);//menampung hasil di input type hidden hasil_bayar
				window.location='adminKeuangan.php';//diarahkan ke halaman ini lagi, sama dengan refresh
			}
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
					<li class="active">
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

		<div class="modal fade" id="modal_transaksi" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"><span class="fa fa-credit-card"></span> PEMBAYARAN</h3>
					</div>
					<div class="modal-body">
						<input type="text" placeholder="Masukkan Id Transaksi.." class="form-control input-lg" id="id_transaksi"><br>
						<input type="hidden" id="id_pelanggan">
						<input type="hidden" id="kode_ptg" value="<?php echo $tampilkan[0]; ?>">
						<button type="button" id="bayar" class="btn btn-danger btn-flat btn-block btn-lg"><span class="glyphicon glyphicon-credit-card"></span> LUNAS</button>
						<input type="hidden" id="hasil_bayar"><br>
					</div>
				</div>
			</div>
		</div>

		<div class="content-wrapper" style="min-height:916px">
			<section class="content-header">
				<div class="page-header">
					<button type="butotn" id="refresh" class="btn btn-default pull-right" style="margin-left:10px"><i class="fa fa-refresh"></i> REFRESH</button>
					<span class="fa fa-usd"></span> DATA KEUANGAN
					<div class="pull-right input-group col-md-2">
						<button type="button" id="tombol_transaksi" class="btn btn-primary btn-flat btn-block btn-lg pull-right" data-toggle="modal" data-target="#modal_transaksi">TRANSAKSI <i class="fa fa-credit-card"></i></button>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-lg-5">
						<div class="small-box bg-purple">
							<div class="inner">
								<h3><?php echo "Rp. "; $krj->saldo(); ?></h3>
								<p>Saldo</p>
								<h3><?php echo "Rp. "; $krj->hari_ini(); ?></h3>
								<p>Pemasukan Hari ini</p>
								<h3><?php echo "Rp. "; $krj->total(); ?></h3>
								<p>Total Uang</p>
							</div>
							<div class="icon">
								<i class="fa fa-money"></i>
							</div>
							<a href="#" class="small-box-footer">
								Detail <i class="fa fa-arrow-down"></i>
							</a>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title"><i class="fa fa-line-chart"></i> Grafik Pendapatan</h3>
							</div>
							<div class="box-body">
								<div class="chart">
									<canvas id="areaChart" style="height: 250px"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<div class="box">
						<div class="box-header">
							<h3><i class="fa fa-money"></i> Data Transaksi</h3>
						</div>
						<div class="box-body">
							<table class="table table-default table-striped table-hover table-responsive table-condensed" id="transaksi">
								<thead>
									<tr class="info">
										<th>#</th>
										<th>ID TRANSAKSI</th>
										<th>ID PELANGGAN</th>
										<th>ID WISATA</th>
										<th>ID MOBIL</th>
										<th>ID SOPIR</th>
										<th>PENUMPANG</th>
										<th>BARANG</th>
										<th>TANGGAL</th>
										<th>TOTAL</th>
										<th>KET</th>
										<th>PETUGAS</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									$data = mysql_query("SELECT * FROM transaksi");
									while ($isi = mysql_fetch_array($data)) {
									?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<button type="button" class="mbayar btn btn-info btn-flat btn-xs" name="<?php echo $isi[1]; ?>" id="<?php echo $isi[0]; ?>" data-toggle="modal" data-target="#modal_transaksi"><?php echo $isi[0]; ?></button>
										</td>
										<td><?php echo $isi[1]; ?></td>
										<td><?php echo $isi[2]; ?></td>
										<td><?php echo $isi[3]; ?></td>
										<td><?php echo $isi[4]; ?></td>
										<td><?php echo $isi[5]; ?></td>
										<td><?php echo $isi[6]; ?></td>
										<td><?php echo $isi[7]; ?></td>
										<td><?php echo $isi[8]; ?></td>
										<td><?php echo $isi[9]; ?></td>
										<td><?php echo $isi[10]; ?></td>
										<!-- <td><a href="hapusTransaksi.php?id_transaksi=<?php //echo $isi[0]; ?>"><span class="fa fa-trash"></span></a> &nbsp;&nbsp;&nbsp;<a href="editTransaksi.php?id_transaksi=<?php //echo $isi[0]; ?>"><span class="fa fa-edit"></span></a></td> -->
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
				</div>
			</section>
		</div>
		<input type="hidden" id="harike0" value="<?php $krj->hari_ini_0(); ?>">
		<input type="hidden" id="harike1" value="<?php $krj->hari_ini_1(); ?>">
		<input type="hidden" id="harike2" value="<?php $krj->hari_ini_2(); ?>">
		<input type="hidden" id="harike3" value="<?php $krj->hari_ini_3(); ?>">
		<input type="hidden" id="harike4" value="<?php $krj->hari_ini_4(); ?>">
		<input type="hidden" id="harike5" value="<?php $krj->hari_ini_5(); ?>">
		<input type="hidden" id="harike6" value="<?php $krj->hari_ini_6(); ?>">
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>JTravel Admin Control Panel</b> V 1.0.0
		</div>
		Copyright 2016,
		<strong>SMK PGRI 05 Jember</strong>
	</footer>
</div>
<script>
$(function(){
var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
var areaChart = new Chart(areaChartCanvas);
var tanggal = new Date();
var harike0 = $('#harike0').val();
var harike1 = $('#harike1').val();
var harike2 = $('#harike2').val();
var harike3 = $('#harike3').val();
var harike4 = $('#harike4').val();
var harike5 = $('#harike5').val();
var harike6 = $('#harike6').val();
<?php $hari = date('d-m-Y'); ?>
<?php $hari1 = date('d-m-Y',strtotime('-1 days')); ?>
<?php $hari2 = date('d-m-Y',strtotime('-2 days')); ?>
<?php $hari3 = date('d-m-Y',strtotime('-3 days')); ?>
<?php $hari4 = date('d-m-Y',strtotime('-4 days')); ?>
<?php $hari5 = date('d-m-Y',strtotime('-5 days')); ?>
<?php $hari6 = date('d-m-Y',strtotime('-6 days')); ?>
var areaChartData = {
      labels: [
      '<?php echo $hari6; ?>',
      '<?php echo $hari5; ?>',
      '<?php echo $hari4; ?>',
      '<?php echo $hari3; ?>',
      '<?php echo $hari2; ?>',
      '<?php echo $hari1; ?>',
      '<?php echo $hari; ?>'
      ],
      datasets: [
        {
          label: "Pemasukan",
          fillColor: "rgba(0, 0, 0, 1)",
          strokeColor: "rgba(0, 0, 0, 1)",
          pointColor: "rgba(0, 0, 0, 1)",
          pointStrokeColor: "rgba(0, 0, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0, 0, 0, 1)",
          data: [harike6,harike5,harike4,harike3,harike2,harike1,harike0]
        },
      ]
    };
    var areaChartOptions = {
      showScale: true,
      scaleShowGridLines: false,
      scaleGridLineColor: "rgba(0,0,0,1)",
      scaleGridLineWidth: 2,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines: true,
      bezierCurve: false,
      bezierCurveTension: 0.3,
      pointDot: true,
      pointDotRadius: 4,
      pointDotStrokeWidth: 1,
      pointHitDetectionRadius: 20,
      datasetStroke: true,
      datasetStrokeWidth: 2,
      datasetFill: false,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      maintainAspectRatio: true,
      responsive: true
    };
    areaChart.Line(areaChartData, areaChartOptions);
});
</script>
</body>
</html>