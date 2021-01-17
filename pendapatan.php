<script>
	$(document).ready(function() {
		$('#pendapatanTable').DataTable();
	});
</script>

<body class="is-preload">
	<div id="page-wrapper">
		<!-- Main -->
		<div id="main" class="wrapper style1">
			<div class="container">
				<header class="major">
					<h2>Pendapatan</h2>
					<p>Cabang <?php echo $namacabang ?> | Bulan <?php echo $bulan ?>
					<p>
					<div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-xsmall">
							<p>Total Pemasukan</p>
						</div>
						<div class="col-6 col-12-xsmall">
							<p><?php echo "Rp " . number_format($total->getPemasukan(), 2, ",", ".") ?></p>
						</div>
						<div class="col-6 col-12-xsmall">
							<p>Total Modal</p>
						</div>
						<div class="col-6 col-12-xsmall">
							<p><?php echo "Rp " . number_format($total->getModal(), 2, ",", ".") ?></p>
						</div>
						<div class="col-6 col-12-xsmall">
							<p>Total Potongan</p>
						</div>
						<div class="col-6 col-12-xsmall">
							<p><?php echo "Rp " . number_format($total->getPotongan(), 2, ",", ".") ?></p>
						</div>
						<div class="col-6 col-12-xsmall">
							<b>Total Pendapatan</b>
						</div>
						<div class="col-6 col-12-xsmall">
							<b><?php echo "Rp " . number_format($total->getPendapatan(), 2, ",", ".") ?></b>
						</div>
					</div>
				</header>

				<!-- Content -->

				<section id="content">
					<form name="myform" action="" method="post">
						<h4>Transaksi BBM</h4>
						<div class="row gtr-uniform gtr-50">
							<div class="col-6 col-12-xsmall">
								<select name="cabang" id="cabang">
									<option value="all">- Cabang -</option>
									<?php foreach ($cabangs as $cabang) {
										echo "<option value=" . $cabang->getId() . ">" . $cabang->getNamacabang() . "</option>"
									?>
									<?php } ?>
								</select>
							</div>
							<div class="col-6 col-12-xsmall">
								<select name="bulan" id="bulan">
									<option value="all">- Bulan -</option>
									<option value="1">Januari</option>
									<option value="2">Februari</option>
									<option value="3">Maret</option>
									<option value="4">April</option>
									<option value="5">Mei</option>
									<option value="6">Juni</option>
									<option value="7">Juli</option>
									<option value="8">Agustus</option>
									<option value="9">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select>
							</div>
							<div class="col-12 col-12-xsmall">
								<input type="submit" class="button primary fit" value="Hitung" name="btnHitung">
							</div>
						</div>
					</form>
					<br>
					<div class="table-wrapper">
						<table class="alt" id="pendapatanTable">
							<thead>
								<tr>
									<th>Tanggal</th>
									<th>Cabang</th>
									<th>Jenis BBM</th>
									<th>Banyak</th>
									<th>Pemasukan</th>
									<th>Modal</th>
									<th>Potongan</th>
									<th>Pendapatan</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pendapatans as $pendapatan) {
								?>
									<tr>
										<td><?php echo $pendapatan->getTanggal() ?></td>
										<td><?php echo $pendapatan->getCabang() ?></td>
										<td><?php echo $pendapatan->getJenis() ?></td>
										<td><?php echo $pendapatan->getBanyak() ?></td>
										<td><?php echo "Rp " . number_format($pendapatan->getPemasukan(), 2, ",", ".")  ?></td>
										<td><?php echo "Rp " . number_format($pendapatan->getModal(), 2, ",", ".") ?></td>
										<td><?php echo "Rp " . number_format($pendapatan->getPotongan(), 2, ",", ".") ?></td>
										<td><?php echo "Rp " . number_format($pendapatan->getPendapatan(), 2, ",", ".") ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</section>

			</div>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
				<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li>
				<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
			</ul>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>