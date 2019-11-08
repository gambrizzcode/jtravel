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
	<title>JTravel Admin</title>
	<link rel="icon" href="../images/favJT.png">
	<link rel="stylesheet" type="text/css" href="../hover/hover.css">
	<link rel="stylesheet" type="text/css" href="../mybootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.12.1/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/AdminLTE.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="../AdminLTE/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" type="text/css" href="../fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="../fullcalendar/fullcalendar.print.css" media="print">
	<script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="../mybootstrap/js/bootstrap.js"></script>
	<script src="../jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="../bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="../AdminLTE/js/app.min.js"></script>
	<script src="../fullcalendar/moment.js"></script>
	<script src="../fullcalendar/fullcalendar.min.js"></script>
</head>
<script>
$(document).ready(function() {
	$('#refresh').click(function() {
		window.location="home.php";
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
					<li class="active" title="LOG OUT !!"><a href="logout.php"><i class="fa fa-power-off"></i></a></li>
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
					<li class="treeview active">
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

	<div class="content-wrapper" style="min-height:916px;">
		<section class="content-header">
			<h3>JTravel Admin Control Panel
			<button type="butotn" id="refresh" class="btn btn-default pull-right"><i class="fa fa-refresh"></i> REFRESH</button>
			</h3>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php $krj->totalMobil(); ?></h3>
							<p>Total Mobil</p>
							<h3><?php $krj->sewaMobil(); ?></h3>
							<p>Mobil Tersewa</p>
							<h3><?php $krj->tidakSewaMobil(); ?></h3>
							<p>Mobil Belum Tersewa</p>
						</div>
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<a href="adminMobil.php" class="small-box-footer">
							Detail
							<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?php $krj->totalSopir(); ?></h3>
							<p>Total Sopir</p>
							<h3><?php $krj->sewaSopir(); ?></h3>
							<p>Sopir Tersewa</p>
							<h3><?php $krj->tidakSewaSopir(); ?></h3>
							<p>Sopir Belum Tersewa</p>
						</div>
						<div class="icon">
							<i class="fa fa-wheelchair"></i>
						</div>
						<a href="adminSopir.php" class="small-box-footer">
							Detail
							<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php $krj->totalWisata(); ?></h3>
							<p>Total Destinasi</p>
							<h3><?php $krj->bukaWisata(); ?></h3>
							<p>Buka</p>
							<h3><?php $krj->tutupWisata(); ?></h3>
							<p>Tutup</p>
						</div>
						<div class="icon">
							<i class="fa fa-globe"></i>
						</div>
						<a href="adminWisata.php" class="small-box-footer">
							Detail
							<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-xs-6">
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php $krj->totalPelanggan(); ?></h3>
							<p>Total Pelanggan</p>
							<h3><?php $krj->aktifPelanggan(); ?></h3>
							<p>Pelanggan Aktif</p>
							<h3><?php $krj->tenggangPelanggan(); ?></h3>
							<p>Pelanggan Masa Tenggang</p>
						</div>
						<div class="icon">
							<i class="fa fa-users"></i>
						</div>
						<a href="adminPelanggan.php" class="small-box-footer">
							Detail
							<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-3">
					<div class="box box-solid">
						<div class="box-header with-border">
							<h4 class="box-title">Acara Saya</h4>
						</div>
						<div class="box-body">
							<div id="external-events">
								<!-- <div class="external-event bg-red">LEMBUR</div> -->
				                <div class="checkbox">
                					<label for="drop-remove">
                    					<input type="checkbox" id="drop-remove">
                   					Hilangkan Setelah Dipakai
                  					</label>
               					</div>
							</div>
						</div>
					</div>
					<div class="box box-solid">
						<div class="box-header with-border">
							<h3 class="box-title">Buat Acara</h3>
						</div>
						<div class="box-body">
							<div class="btn-group" style="width: 100%; margin-bottom: 10px;">
							<!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
								<ul class="fc-color-picker" id="color-chooser">
									<li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
									<li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
								</ul>
							</div>
							<div class="input-group">
								<input type="text" id="new-event" class="form-control" placeholder="NAMA ACARA">
								<div class="input-group-btn">
									<button id="add-new-event" type="button" class="btn btn-primary btn-flat" title="TAMBAHKAN KE KALENDER"><span class="fa fa-arrow-right"></span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-9">
					<div class="box box-success">
						<div class="box-body no-padding">
							<div id="calendar"></div>
						</div>
					</div>
				</div>
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
<script>
$(function () {
    function ini_events(ele) {
      ele.each(function () {
        var eventObject = {
          title: $.trim($(this).text())
        };
        $(this).data('eventObject', eventObject);
        $(this).draggable({
          zIndex: 1070,
          revert: true,
          revertDuration: 0
        });
      });
    }
    ini_events($('#external-events div.external-event'));
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      editable: true,
      droppable: true,
      drop: function (date, allDay) {
        var originalEventObject = $(this).data('eventObject');
        var copiedEventObject = $.extend({}, originalEventObject);
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        if ($('#drop-remove').is(':checked')) {
          $(this).remove();
        }
      }
    });
    var currColor = "#3c8dbc";
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      currColor = $(this).css("color");
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);
      ini_events(event);
      $("#new-event").val("");
    });
  });
</script>
</body>
</html>