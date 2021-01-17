<?php
session_start();
include_once 'util/PDOUtil.php';
include_once 'entity/User.php';
include_once 'entity/Harga.php';
include_once 'entity/Member.php';
include_once 'entity/Transaksi.php';
include_once 'entity/Pegawai.php';
include_once 'entity/PoinMasuk.php';
include_once 'entity/PoinKeluar.php';
include_once 'entity/Pendapatan.php';
include_once 'entity/Cabang.php';
include_once 'entity/Total.php';

include_once 'controller/UserController.php';
include_once 'controller/HargaController.php';
include_once 'controller/SignUpController.php';
include_once 'controller/TransaksiController.php';
include_once 'controller/UserController.php';
include_once 'controller/PendapatanController.php';
include_once 'controller/PegawaiController.php';
include_once 'controller/MemberController.php';

include_once 'dao/UserDaoImpl.php';
include_once 'dao/HargaDaoImpl.php';
include_once 'dao/TransaksiDaoImpl.php';
include_once 'dao/PegawaiDaoImpl.php';
include_once 'dao/MemberDaoImpl.php';
include_once 'dao/PoinMasukDaoImpl.php';
include_once 'dao/PoinKeluarDaoImpl.php';
include_once 'dao/PendapatanDaoImpl.php';
include_once 'dao/CabangDaoImpl.php';
if (!isset($_SESSION['session'])) {
	$_SESSION['session'] = false;
}
?>

<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Pom Bensin ANS</title>
	<meta charset="utf-8" />
	<link rel="icon" href="images/shell.jpg" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/dataTables.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>
<!-- <body class="is-preload landing"> -->

<body>
	<div id="page-wrapper">

		<!-- Header -->
		<header id="header">
			<h1 id="logo"><a href="?navito=home">POM ANS</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="?navito=home">Home</a></li>
					<?php
					//IF UDAH LOGIN, ELSE BELOM LOGIN
					if ($_SESSION['session']) {
						// MENU ROLE OWNER
						if ($_SESSION['session_role'] == 'owner') {
							echo '<li><a href="?navito=harga">Harga</a></li>';
							echo '<li><a href="?navito=pendapatan">Pendapatan</a></li>';
							echo '<li><a href="?navito=eom">Pegawai</a></li>';
						}
						// MENU ROLE PEGAWAI
						if ($_SESSION['session_role'] == 'pegawai') {
							echo '<li><a href="?navito=transaksi">Transaksi</a></li>';
						}
						// MENU ROLE MEMBER
						if ($_SESSION['session_role'] == 'member') {
							echo '<li><a href="?navito=member">Member</a></li>';
						}
						echo '<li><a href="?navito=logout" class="button primary">Log out</a></li>';
					} else {
						echo '<li><a href="?navito=login" class="button primary">Log in</a></li>';
					}
					?>

				</ul>
			</nav>

		</header>
	</div>

	<main>
		<?php
		$nav = filter_input(INPUT_GET, "navito");
		switch ($nav) {
			case 'home':
				include_once './home.php';
				break;
			case 'elements':
				include_once './elements.php';
				break;
			case 'login':
				$userController = new UserController();
				$userController->index();
				break;
			case 'logout':
				$userController = new UserController();
				$userController->logout();
				break;
			case 'signup':
				$signUpController = new SignUpController();
				$signUpController->index();
				break;
			case 'transaksi':
				$transaksiController = new TransaksiController();
				$transaksiController->index();
				break;
			case 'harga':
				$hargaController = new HargaController();
				$hargaController->index();
				break;
			case 'member':
				$memberController = new MemberController();
				$memberController->index();
				break;
			case 'updatePeg':
				$PegController = new PegawaiController();
				$PegController->updatePeg();
				break;
			case 'pendapatan':
				$pendapatanController = new PendapatanController();
				$pendapatanController->index();
				break;
			case 'eom':
				$pegawaiController = new PegawaiController();
				$pegawaiController->index();
				break;
			default:
				include_once './home.php';
				break;
		}
		?>
	</main>
	<!-- Scripts -->
	<script src="assets/js/update.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/daterangepicker.js"></script>
	<!-- <script src="assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="assets/js/daterangepicker/moment.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
</body>

</html>