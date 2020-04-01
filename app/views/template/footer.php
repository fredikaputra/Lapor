		<?php
		
		if (isset($data['js'])) {
			foreach ($data['js'] as $js) {
				?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>" charset="utf-8"></script><?php
			}
		}
		
		?>
		<script src="<?= BASEURL ?>/assets/js/outline.js" charset="utf-8"></script>
	</body>
</html>