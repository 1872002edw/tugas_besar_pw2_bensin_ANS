<div id="page-wrapper">
	<!-- Main -->
	<div id="main" class="wrapper style1">
		<div class="container">
			<header class="major">
				<h2>Pegawai</h2>
				<p>Kelola Pegawai POM Bensin ANS</p>
			</header>

			<!-- Content -->
			<section id="content">
				<form method="post" action="#">
					<div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-xsmall">
							<select id="cabang" name="cabang">
								<?php
								foreach ($cabang as $row) {
								?>
									<option id="cabang" name="cabang">
										<?php echo $row->getId() ?> - <?php echo $row->getNamaCabang() ?>
									<?php
								}
									?>
									</option>
							</select>
						</div>
					</div>
					<br>
					<td><input type="submit" class="button primary" value="Submit" name="btnCabang"></td>
				</form>
				<br>
				<h4>Pegawai</h4>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Cabang</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								foreach ($userpeg as $rowp) {
								?>
									<td><?php echo $rowp->getNama() ?></td>
									<td><?php echo $rowp->getEmail() ?></td>
									<td><?php echo $rowp->getNamacabang() ?></td>
									<td><button class="button small" onclick="updatePeg(<?php echo $rowp->getId() ?>)">
											UPDATE</button></td>

							</tr>
						<?php
								}
						?>

						</tbody>
					</table>
				</div>
				<h4>Employee of the Month</h4>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Bulan/Tahun</th>
								<th>Nama</th>
								<th>Cabang</th>
								<th>Banyak Transaksi</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
								foreach ($userat as $rowr) {
								?>
									<td><?php echo date('m/Y', strtotime($rowr->getTanggal())); ?></td>
									<td><?php echo $rowr->getNama() ?></td>
									<td><?php echo $rowr->getNamacabang() ?></td>
									<td><?php echo $rowr->getBanyak() ?></td>
									<td><?php echo round($rowr->getRating(), 1) ?></td>
							</tr>
						<?php
								}
						?>

						</tbody>
					</table>
				</div>
			</section>

		</div>
	</div>


</div>