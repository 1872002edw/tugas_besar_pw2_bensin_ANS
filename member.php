<script>
	$(document).ready(function() {
		$('#poinmasukTable').DataTable();
		$('#poinkeluarTable').DataTable();
	});
</script>
<div id="page-wrapper">
	<!-- Main -->
	<div id="main" class="wrapper style1">
		<div class="container">
			<header class="major">
				<h2>Membership</h2>
			</header>
			<div class="row gtr-150">
				<div class="col-4 col-12-medium">

					<!-- Sidebar -->
					<section id="sidebar">
						<section>
							<h3>Profil</h3>

							<form method="post" action="#">
								<div class="row gtr-uniform gtr-50">
									<div class="col-6">
										<h4>Nama</h4>
									</div>
									<div class="col-6">
										<input type="text" name="nama" id="nama" value=<?php echo $user->getNama() ?> />
									</div>
									<div class="col-6">
										<h4>Email</h4>
									</div>
									<div class="col-6">
										<input type="text" name="email" id="email" value=<?php echo $user->getEmail() ?> />
									</div>
									<div class="col-6">
										<h4>Tanggal Lahir</h4>
									</div>
									<div class="col-6">
										<input type="text" name="birthday" id="birthday" value=<?php echo date('m/d/Y', strtotime($member->getTgllahir())); ?> />
									</div>
									<div class="col-6">
										<h4>No. Mobil</h4>
									</div>
									<div class="col-6">
										<input type="text" name="mobil" id="mobil" value="<?php echo $member->getMobil() ?>">
									</div>
									<div class="col-6">
										<h4>No. Motor</h4>
									</div>
									<div class="col-6">
										<input type="text" name="motor" id="motor" value="<?php echo $member->getMotor() ?>">
									</div>
									<div class="col-12">
										<ul class="actions">
											<li><input type="submit" value="Ubah Akun" class="primary" name="btnUbah" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
							<footer>
								<ul class="actions">
								</ul>
							</footer>
						</section>
						<hr />
					</section>
				</div>
				<section class="col-8 col-12-medium imp-medium">
					<section>
						<!-- Rating Transasksi -->
						<h3>Rating Transaksi</h3>
						<div class="table-wrapper">
							<form method="post" action="#">
								<table class="alt">
									<thead>
										<tr>
											<th>Transaksi</th>
											<th>Rating</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><select id="id" name="id">
													<?php
													foreach ($gettrans as $rowt) {
													?>
														<option value=<?php echo $rowt->getId()?>>
															<?php echo $rowt->getId() ?> / <?php echo date('d-m-Y', strtotime($rowt->getTanggal())); ?>
														<?php
													}
														?>
														</option>
												</select>
											</td>
											<td><select id="rating" name="rating">
													<option value=1>1</option>
													<option value=2>2</option>
													<option value=3>3</option>
													<option value=4>4</option>
													<option value=5>5</option>
												</select>
											</td>
											<td><input type="submit" class="button primary" value="submit" name="btnRating"></td>
										</tr>
									</tbody>
								</table>
							</form>
						</div>
					</section>
					<!-- POINT HISTORY -->
					<section>
						<h2 style="color:#e44c65">Point: <?php echo $member->getPoin() ?></h2>
					</section>
					<section>
						<h3>Poin Masuk</h3>
						<div class="table-wrapper">
							<table id="poinmasukTable" class="alt">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Jumlah</th>
										<th>Sisa</th>
										<th>Masa Berlaku</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
										foreach ($poinmasuk as $row) {
											$tglsekarang = date('d-m-Y');
											$tglpoin = date('d-m-Y', strtotime($row->getTanggal()));
											$diff = abs(strtotime($tglsekarang) - strtotime($tglpoin));
											$hari = $diff / (60 * 60 * 24);
											$fixtgl = 365 - $hari;
										?>
											<td><?php echo date('d-m-Y', strtotime($row->getTanggal())); ?></td>
											<td><?php echo $row->getJumlah() ?></td>
											<td><?php echo $row->getSisa() ?></td>

											<td><?php echo ($fixtgl); ?> HARI</td>
											<td><?php echo ($row->getStatus() ? "Berlaku" : "Tidak Berlaku") ?></td>
									</tr>
								<?php
										}
								?>

								</tbody>

							</table>
						</div>
					</section>
					<section>
						<h3>Point Keluar</h3>
						<div class="table-wrapper">
							<table id="poinkeluarTable" class="alt">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($poinkeluar as $rowk) {
									?>
										<td><?php echo date('d-m-Y', strtotime($rowk->getTanggal())); ?></td>
										<td><?php echo $rowk->getJumlah() ?></td>
										</tr>
									<?php
									}
									?>

								</tbody>
								<tfoot>

								</tfoot>
							</table>
						</div>
					</section>
			</div>
		</div>
	</div>
</div>


<footer id="footer">
	<a href="#">Back to top</a>
	<ul class="copyright">
		<li>&copy; POM Bensin AWS. All rights reserved.</li>
		<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
	</ul>
</footer>