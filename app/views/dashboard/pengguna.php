	<div class="content">
		<div class="header">
			<div>
				<h1>Daftar Pengguna</h1>
				<span>Terdapat <?= $data['users'] ?> pengguna yang sudah bergabung.</span>
			</div>
			<a href="<?= BASEURL ?>/dashboard/tambah-pengguna">
				<img src="<?= BASEURL ?>/assets/img/icon/add-user.png"> Tambah Pengguna
			</a>
		</div>
		
		<form method="post" action="<?= BASEURL ?>/dashboard/pengguna/filter">
			<div class="top">
				<span>
				
				<?php
				
				if (isset($_POST['querysearch'])) {
					?>
					
					<span>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna berdasarkan kata kunci: <?= $_POST['querysearch'] ?></span>
					
					<?php
				}else if (isset($_POST['filter'])) {
					?><span>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna berdasarkan filter.</span><?php
				}else {
					?><span>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> dari <?= $data['users'] ?> pengguna.</span><?php
				}
				
				?>
				
				</span>
				<div class="search">
					<input type="text" placeholder="Cari nama atau username pengguna..." name="querysearch" id="inputsearch" value="<?php
					
					if (isset($_POST['querysearch'])) {
						echo $_POST['querysearch'];
					}
					
					?>" required>
				</div>
				<button type="submit" name="search">
					<img src="<?= BASEURL ?>/assets/img/icon/search.png">
				</button>
				<img src="<?= BASEURL ?>/assets/img/icon/vertical-line.png">
				<button type="button" onclick="showfilter()">
					<img src="<?= BASEURL ?>/assets/img/icon/filter.png">
				</button>
				
				<div class="filter-menu hide">
					<span>Filter Pengguna</span>
					<div class="filter">
						<div>
							<span>HAK</span>
							<select name="privilege">
								<option>Semua</option>
								<option value="admin"
								
								<?php
								
								if (isset($_POST['privilege'])) {
									if ($_POST['privilege'] == 'admin') {
										echo 'selected';
									}
								}
								
								?>
								
								>Admin</option>
								<option value="petugas"
								
								<?php
								
								if (isset($_POST['privilege'])) {
									if ($_POST['privilege'] == 'petugas') {
										echo 'selected';
									}
								}
								
								?>
								
								>Petugas</option>
								<option value="masyarakat"
								
								<?php
								
								if (isset($_POST['privilege'])) {
									if ($_POST['privilege'] == 'masyarakat') {
										echo 'selected';
									}
								}
								
								?>
								
								>Masyarakat</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="sort">
								<option value="nameASC">Nama (A - Z)</option>
								<option value="nameDESC"
								
								<?php
								
								if (isset($_POST['sort'])) {
									if ($_POST['sort'] == 'nameDESC') {
										echo 'selected';
									}
								}
								
								?>
								
								>Nama (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="show">
								<option value="10">10</option>
								<option value="20"
								
								<?php
								
								if (isset($_POST['show'])) {
									if ($_POST['show'] == '20') {
										echo 'selected';
									}
								}
								
								?>
								
								>20</option>
								<option value="50"
								
								<?php
								
								if (isset($_POST['show'])) {
									if ($_POST['show'] == '50') {
										echo 'selected';
									}
								}
								
								?>
								
								>50</option>
								<option value="100"
								
								<?php
								
								if (isset($_POST['show'])) {
									if ($_POST['show'] == '100') {
										echo 'selected';
									}
								}
								
								?>
								
								>100</option>
								<option value="all"
								
								<?php
								
								if (isset($_POST['show'])) {
									if ($_POST['show'] == 'all') {
										echo 'selected';
									}
								}
								
								?>
								
								>Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/pengguna">Atur Ulang</a>
						<button type="submit" name="filter">Filter</button>
					</div>
				</div>
			</div><!-- top -->
			
			<div class="body">
				<div class="header">
					<div><span>#</span></div>
					<div><span>Nama</span></div>
					<div><span>Username</span></div>
					<div><span>No Telepon</span></div>
					<div><span>Terakhir login</span></div>
					<div><span>Hak</span></div>
				</div>
				
				<?php
				
				if ($data['pengguna'] != NULL) {
					$no = 1;
					foreach ($data['pengguna'] as $user) {
						?>
						
						<div class="user">
							<div><?= $no ?></div>
							<div>
								<?php
								
								if (file_exists('assets/img/users/' . $user['id'] . '.jpg')) {
									?><img src="<?= BASEURL ?>/assets/img/users/<?= $user['id'] . '.jpg' ?>?=<?= filemtime('assets/img/users/' . $user['id'] . '.jpg') ?>"><?php
								}else {
									?><img src="<?= BASEURL ?>/assets/img/users/default.png" alt=""><?php
								}
								
								?>
								<span><?= $user['nama'] ?></span>
							</div>
							<div><span>@<?= $user['username'] ?></span></div>
							<div><span><?= $user['telp'] ?></span></div>
							<div><span>2 menit yang lalu</span></div>
							<div>
								<span>
									<?php
										if ($user['level'] == 1) {
											echo 'Admin';
										}else if ($user['level'] == 2) {
											echo 'Petugas';
										}else{
											echo 'Masyarakat';
										}
									?>
								</span>
							</div>
							<!-- <div><a href="<?= BASEURL ?>/dashboard/hapus/<?= $user['id'] ?>" class="singleDel" <?= ($_SESSION['level'] != '1') ? 'style="display: none"' : '' ?>><img src="<?= BASEURL ?>/assets/img/icon/bin.png"></a></div> -->
							<div><a href="<?= BASEURL ?>/dashboard/hapus/<?= $user['id'] ?>" class="singleDel"><img src="<?= BASEURL ?>/assets/img/icon/bin.png"></a></div>
						</div>
						
						<?php
						$no++;
					}
				}else {
					?>
					
					<div class="user" style="display: block; padding: 1cm; text-align: center; color: var(--soft-dark-color)">
						<strong>Pengguna tidak ditemukan</strong>
					</div>
					
					<?php
				}
				
				?>
			</div> <!-- body -->
		</form>
	</div>
</main>

<script type="text/javascript">	
	function showfilter(){
		document.querySelector('.filter-menu').classList.toggle('hide');
		document.querySelector('#inputsearch').toggleAttribute('required');
	}
</script>

<?php

if (isset($data['searchactive'])) {
	?>
	
	<script type="text/javascript">
		document.querySelector('#inputsearch').focus();
	</script>
	
	<?php
}

?>