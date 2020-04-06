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
		
		<form method="post" action="<?= BASEURL ?>/dashboard/userformproccess">
			<div class="top">
				<button type="submit" name="delete" id="delete">
					<img src="<?= BASEURL ?>/assets/img/icon/bin.png"> Hapus
				</button>
				<div>
					<div class="hide search">
						<button type="button" onclick="hidesearch()">
							<img src="<?= BASEURL ?>/assets/img/icon/close.png">
						</button>
						<input type="text" placeholder="Cari data pengguna..." id="inputsearch">
					</div>
					<button type="button" id="search" name="search" onclick="showsearch(this)">
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
								<select>
									<option>Semua</option>
									<option>Admin</option>
									<option>Petugas</option>
									<option>Masyarakat</option>
								</select>
							</div>
							<div>
								<span>SORTIR</span>
								<select>
									<option>Nama (A - Z)</option>
									<option>Nama (Z - A)</option>
									<option>Terbaru</option>
									<option>Terlama</option>
								</select>
							</div>
							<div>
								<span>TAMPIL</span>
								<select>
									<option>Semua</option>
									<option>10</option>
									<option>20</option>
									<option>50</option>
									<option>100</option>
								</select>
							</div>
						</div>
						<div class="footer">
							<button type="submit" name="reset">Atur Ulang</button>
							<button type="submit" name="filter">Filter</button>
						</div>
					</div>
				</div>
			</div><!-- top -->
			
			<div class="body">
				<div class="header">
					<div><input type="checkbox"></div>
					<div><span>Nama</span></div>
					<div><span>Username</span></div>
					<div><span>No Telepon</span></div>
					<div><span>Terakhir login</span></div>
					<div><span>Hak</span></div>
				</div>
				
				<?php
				
				foreach ($data['pengguna'] as $user) {
					?>
					
					<div class="user">
						<div><input type="checkbox" value="<?= $user['id'] ?>"></div>
						<div>
							<?php
							
							if (file_exists('assets/img/users/' . $user['id'] . '.jpg')) {
								?><img src="<?= BASEURL ?>/assets/img/users/<?= $user['id'] . '.jpg' ?>?=<?= filemtime('assets/img/users/' . $data['photo']) ?>"><?php
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
					</div>
					
					<?php
				}
				
				?>
			</div> <!-- body -->
		</form>
	</div>
</main>

<script type="text/javascript">
	function showsearch(i){
		document.querySelector('.search').classList.remove('hide');
		document.querySelector('#inputsearch').focus();
		document.querySelector('#delete').style.display = 'none';
		
		setTimeout(function(){
			i.setAttribute('type', 'submit');
		}, 1);
	}
	
	function hidesearch(){
		document.querySelector('.search').classList.add('hide');
		document.querySelector('#delete').removeAttribute('style');
		document.querySelector('#search').setAttribute('type', 'button');
	}
	
	function showfilter(){
		document.querySelector('.filter-menu').classList.toggle('hide');
	}
</script>