<?php
include 'index.class.php';
$sambung = new sambung();
$krj = new kerja();
ini_set("display_errors","off");
if ($_SESSION['id_pelanggan'] != "") {
  $pilihUsername = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_SESSION[id_pelanggan]'");
  $tampilkan = mysql_fetch_array($pilihUsername);
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
        <li class="user-menu"><a href="index.php"><i class="fa fa-home"></i></a></li>
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
          <li>
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
          <li class="active">
            <a href="#" style="font-weight:bold">
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

    <div class="content-wrapper">
    	<section class="content-header">
      		<h3><i class="fa fa-exclamation"></i> About JTravel Agent Service</h3>
    	</section>
    	<section class="content">
    		<!-- <div class="col-md-10"> -->
    			<div class="box box-primary">
	    			<div class="box-body">
	    				<h4>Jtravel Agent Service</h4>
		    			<p>	Adalah perusahaan multi services yang berarti melayani banyak layanan. Dalam hal ini kami melayani sewa mobil tanpa sopir ataupun dengan sopir dengan tujuan destinasi wisata wilayah Kab. Jember. Kami juga melayani biro perjalanan dengan tujuan destinasi wisata wilayah Kab. Jember pula.</p>
		    			<p>	Jika anda sudah punya fasilitas sendiri tetapi belum tahu banyak mengenai informasi destinasi wisata, kami di sini juga menyediakan banyak sekali informasi mengenai tujuan destinasi wisata wilayah Kab. Jember.</p>
		    			<p>	Perusahaan kami memang tidak memiliki tempat yang memadai seperti perusahaan sewa mobil pada umumnya. Tetapi kami memberikan semua pelayanan yang anda butuhkan dengan semaksimal mungkin.</p>
		    			<p>	Jika anda ingin tahu lebih lanjut atau jika anda tertarik pada kami silahkan hubungi kontak kami di bawah ini.</p>
		    			<ul>
		    				<li>No Telp : 0336-321330</li>
		    				<li>Hp : 0812-3085-6890 (Call / SMS)</li>
		    				<li>Wa : 0810-0099-9888</li>
		    				<li>line : 0810-0099-9888</li>
		    				<li>Pin BB : 5ba12345</li>
		    				<li>Facebook : JTravel Agent Service</li>
		    				<li>Twitter : @JTravel_Agent_Service</li>
		    				<li>Instagram : @JTravel_Agent_Service</li>
		    				<li>Email : JTravel_Agent_Service@gmail.com</li>
		    				<li>Atau datang langsung ke tempat kami di Jalan Kartini no.16, Wonorejo, Kencong - Jember</li>
		    			</ul>
	    			</div>
	    		</div>
    		<!-- </div> -->
    	</section>
    </div>
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