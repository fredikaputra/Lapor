		<?php
		
		if (isset($data['js'])) {
			foreach ($data['js'] as $js) {
				?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>?=<?= filemtime('assets/js/' . $js) ?>" charset="utf-8"></script><?php
			}
		}
		
		?>
	</body>
</html>