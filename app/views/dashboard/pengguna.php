<?php

// cek query pada url (setelah tanda ?)
$url = parse_url($_SERVER['REQUEST_URI']);
if (isset($url['query'])) {
	$url = parse_url($_SERVER['REQUEST_URI'])['query'];
	$url = explode('&', $url);
	foreach($url as $key => $value) {
		if (strpos($value, '=') != FALSE) {
			$query = explode('=', $value);
			$get[$query[0]] = $query[1];
		}
	}
}

if (isset($get['querysearch']) && strpos($get['querysearch'], '+')) {
	$get['querysearch'] = str_replace('+', ' ', $get['querysearch']);
}

?>

	<div class="content">
		<div class="header">
			<div>
				<h1>Daftar Pengguna</h1>
				<span>Terdapat <?= $data['users'] ?> pengguna yang sudah bergabung.</span>
			</div>
			<?php
			
			if ($data['petugas']['level'] == '1') {
				?>
				
				<a href="<?= BASEURL ?>/dashboard/tambah-pengguna">
					<img src="<?= BASEURL ?>/assets/img/icon/add-user.png"> Tambah Pengguna
				</a>
				
				<?php
			}
			
			?>
		</div>
		
		<div class="body">
			<div class="top">
				<span>
				
				<?php
				
				if (isset($get['querysearch'])) {
					?>
					
					Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna untuk <strong>"<?= $get['querysearch'] ?>"</strong>
					
					<?php
				}else if (isset($get['filter'])) {
					?>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> pengguna berdasarkan filter.<?php
				}else {
					?>Menampilkan <?= ($data['pengguna'] > 0) ? count($data['pengguna']) : '0' ?> dari <?= $data['users'] ?> pengguna.<?php
				}
				
				?>
				
				</span>
				<form method="get" action="<?= BASEURL ?>/dashboard/pengguna">
					<div class="search">
						<input type="text" placeholder="Cari nama atau username pengguna..." name="querysearch" id="inputsearch" <?= (isset($get['querysearch'])) ? 'value="' . $get['querysearch'] . '"' : '' ?> <?= (isset($get['search']) && $get['search'] == 'on') ? 'autofocus' : '' ?>>
					</div>
					<button type="submit" name="search" value="on">
						<img src="<?= BASEURL ?>/assets/img/icon/search.png">
					</button>
				</form>
				<img src="<?= BASEURL ?>/assets/img/icon/vertical-line.png">
				<button type="button" onclick="showfilter()">
					<img src="<?= BASEURL ?>/assets/img/icon/filter.png">
				</button>
				
				<form method="get" action="<?= BASEURL ?>/dashboard/pengguna" class="filter-menu hide">
					<span>Filter Pengguna</span>
					<div class="filter">
						<div>
							<span>HAK</span>
							<select name="hak">
								<option>Semua</option>
								<option value="1" <?= (isset($get['hak']) && $get['hak'] == '1') ? 'selected' : '' ?>>Admin</option>
								<option value="2" <?= (isset($get['hak']) && $get['hak'] == '2') ? 'selected' : '' ?>>Petugas</option>
								<option value="3" <?= (isset($get['hak']) && $get['hak'] == '3') ? 'selected' : '' ?>>Masyarakat</option>
							</select>
						</div>
						<div>
							<span>SORTIR</span>
							<select name="urutan">
								<option value="1" <?= (isset($get['urutan']) && $get['urutan'] == '1') ? 'selected' : '' ?>>Nama (A - Z)</option>
								<option value="2" <?= (isset($get['urutan']) && $get['urutan'] == '2') ? 'selected' : '' ?>>Nama (Z - A)</option>
							</select>
						</div>
						<div>
							<span>TAMPIL</span>
							<select name="tampil">
								<option value="20" <?= (isset($get['tampil']) && $get['tampil'] == '20') ? 'selected' : '' ?>>20</option>
								<option value="50" <?= (isset($get['tampil']) && $get['tampil'] == '50') ? 'selected' : '' ?>>50</option>
								<option value="semua" <?= (isset($get['tampil']) && $get['tampil'] == 'semua') ? 'selected' : '' ?>>Semua</option>
							</select>
						</div>
					</div>
					<div class="footer">
						<a href="<?= BASEURL ?>/dashboard/pengguna">Atur Ulang</a>
						<button type="submit" name="filter" value="on">Filter</button>
					</div>
				</form>
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
							<?php
							
							if ($data['petugas']['level'] == 1) {
								?>
								
								<div>
									<button type="button" class="singleDel" onclick="delPopup(this)" data-id="<?= $user['id'] ?>" data-name="<?= $user['nama'] ?>">
										<img src="<?= BASEURL ?>/assets/img/icon/bin.png">
									</button>
								</div>
								
								<?php
							}
							
							?>
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
		</div>
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
		document.querySelector('#id').innerHTML = i.getAttribute('data-name') + '?';
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