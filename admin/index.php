<?php
include '../index.class.php';
$sambung = new sambung();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>LOGIN</title>
	<link rel="icon" href="../images/favJT.png">
	<link rel="stylesheet" type="text/css" href="../hover/hover.css">
	<link rel="stylesheet" type="text/css" href="../hover/style.css">
	<script src="../jquery-ui-1.12.1/external/jquery/jquery.js"></script>
</head>
<script>
$(document).ready(function() {
	$('#username').mouseenter(function() {
		$(this).focus();
	});
	$('#password').mouseenter(function() {
		$(this).focus();
	});
});
</script>
<style type="text/css">
*{
	margin: 0;
	padding: 0;
}
.wadah{
	width: 360px;
	height: 490px;
	margin: auto;
	position: absolute;
	display: block;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	box-shadow: 0 0 15px black;
}
img{
	text-align: center;
	width: 150px;
	padding-bottom: 40px;
}
.style-2 .form-group input:valid,
.style-2 .form-group input:focus {
	color: #2c3e50;
}
.style-2 .form-group input:valid ~ .line,
.style-2 .form-group input:focus ~ .line {
	background: #2c3e50;
}
.style-2 .button {
	background: #2c3e50;
}
</style>
<body>
	<div class="wadah">
		<div class="col">
			<div class="form-container">
				<div class="form style-2" style="width:360px">
					<center><img src="../images/adminlogo.png" class="hvr-buzz"></center>
					<form action="login.php" class="active">
						<div class="form-group">
							<input type="text" id="username" name="username" required="required" autocomplete="off">
							<label for="username">USERNAME</label>
							<div class="line"></div>
						</div>
						<div class="form-group">
							<input type="password" id="password" name="password" required="required" autocomplete="off">
							<label for="password">PASSWORD</label>
							<div class="line"></div>
						</div>
						<button type="submit" name="submit" class="button">LOGIN</button>
						<footer class="footer"><center><h5 class="hvr-buzz-out">JTravel Admin Control Panel</h5></center></footer>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>