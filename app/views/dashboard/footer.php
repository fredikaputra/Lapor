			</main>
		</div>

		<?php

		if (isset($data['js'])) {
			foreach ($data['js'] as $js) {
				?><script src="<?= BASEURL ?>/assets/js/<?= $js ?>"></script><?php
			}
		}

		?>

		<script>
			var timeout;

			timeout = setTimeout(function(){
				window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
			}, 180000);

			document.onmousemove = function(){
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
				}, 180000);
			}

			document.onkeydown = function(){
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					window.location.href = "<?= BASEURL ?>/dashboard/user-locked";
				}, 180000);
			}
		</script>

	</body>
</html>