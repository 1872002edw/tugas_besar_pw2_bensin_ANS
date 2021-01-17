<div id="page-wrapper">
	<!-- Main -->
	<div id="main" class="wrapper style1">
		<div class="container">
			<header class="major">
				<h2>Membership</h2>
			</header>

			<!-- Sidebar -->
			<section id="content">
				<section>
					<h3>Profil</h3>

					<form method="post" action="#">
						<div class="row gtr-uniform gtr-50">
							<div class="col-6">
								<h4>Id</h4>
							</div>
							<div class="col-6">
								<input type="text" name="id" id="id" value=<?php echo $cekupdatep->getId() ?>>
							</div>
							<div class="col-6">
								<h4>Nama</h4>
							</div>
							<div class="col-6">
								<input type="text" name="nama" id="nama" value=<?php echo $cekupdate->getNama() ?>>
							</div>
							<div class="col-6">
								<h4>Username</h4>
							</div>
							<div class="col-6">
								<input type="text" name="username" id="username" value=<?php echo $cekupdate->getUsername() ?>>
							</div>
							<div class="col-6">
								<h4>Email</h4>
							</div>
							<div class="col-6">
								<input type="text" name="email" id="email" value=<?php echo $cekupdate->getEmail() ?>>
							</div>
							<div class="col-6">
								<h4>Cabang</h4>
							</div>
							<div class="col-6">
								<select id="cabang" name="cabang">
									<?php
									foreach ($pilihcabang as $row) {
									?>
										<option id="cabang" name="cabang">
											<?php echo $row->getId() ?> - <?php echo $row->getNamaCabang() ?>
										<?php
									}
										?>
										</option>
								</select>
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
			</section>
		</div>
	</div>
</div>