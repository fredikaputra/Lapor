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
		
		<form method="get" action="<?= BASEURL ?>/dashboard/pengguna">
			<div class="top">
				<span>
				
				<?php
				
				if (isset($_POST['querysearch'])) {
					?>
					
					Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna untuk <strong>"<?= $_POST['querysearch'] ?>"</strong>
					
					<?php
				}else if (isset($_POST['filter'])) {
					?>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna berdasarkan filter.<?php
				}else {
					?>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> dari <?= $data['users'] ?> pengguna.<?php
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
				<button type="submit" name="search" value="on">
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
							<select name="hak">
								<option>Semua</option>
								<option value="1">Admin</option>
								<option value="2">Petugas</option>
								<option value="3">Masyarakat</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="urutan">
								<option value="1">Nama (A - Z)</option>
								<option value="2">Nama (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="tampil">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="semua">Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/pengguna">Atur Ulang</a>
						<button type="submit" name="filter" value="on">Filter</button>
					</div>
				</div>
			</div><!-- top -->
			
			<div class="body">
				<div class="header">
					<div><span>#</span></div>
					<div><span>Nama</span></div>
					<div><span>Username</span></div>
					<div><span>No Telepon</span></div>
					<div><span>Aktif</span></div>
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
							<div>
								
								<?php
								
								if ($handle = opendir('app/log/last_login')) {
									while (false !== ($file = readdir($handle))) {
										if ($file != "." && $file != "..") {
											$cekId = explode('.', $file);
											if ($cekId[0] == $user['id']) {
												$files = file('app/log/last_login/' . $file);
											}
										}else {
											$files = NULL;
										}
									}
									closedir($handle);
								}
								
								if ($files != NULL) {
									
									if ($files[0] == 'active') {
										?><span class="online">Online</span><?php
									}else {
										?><span><?= Data_model::timeCounter(intval($files[0])) ?></span><?php
									}
								}else {
									?><span>-</span><?php
								}
								
								?>
								
							</div>
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
							<!-- <div><a href="<?= BASEURL ?>/dashboard/pengguna/hapus/" class="singleDel"></a></div> -->
							<div>
								<button type="button" class="singleDel" onclick="delPopup(this)" data-id="<?= $user['id'] ?>" data-name="<?= $user['username'] ?>">
									<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
								</button>
							</div>
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
	
	function delPopup(i){
		document.querySelector('.popup').classList.remove('hide');
		var id = i.getAttribute('data-id');
		document.querySelector('#deleteForm').setAttribute('action', '<?= BASEURL ?>/dashboard/pengguna/hapus/' + id);
		document.querySelector('#info').innerHTML = 'Apakah anda yakin ingin menghapus pengguna';
		document.querySelector('#id').innerHTML = '@' + i.getAttribute('data-name') + '?';
	}

	function closeDelPopup(){
		document.querySelector('.popup').classList.add('hide');
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