<?php

if (!session_id()) session_start(); // jalankan session ketika session tidak berjalan

require_once 'app/init.php'; // panggil file init.php

$app = new App; // jalankan aplikasinya

?>
<!-- 
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<style type="text/css">
			body.monitor #monitor{
				position: fixed;
				background-color: var(--soft-dark-color);
				transform: translate(40cm, 10cm);
				color: white;
				padding: 20px;
				z-index: 99999999;
				box-shadow: 0 0 10px #00000015;
				cursor: grab;
			}
		</style>
	</head>
	<body class="monitor">
		<div id="monitor" draggable="true">
			<div>GET value:</div>
			<div><pre><?php	print_r($_GET); ?></pre></div>
			
			<div>POST value:</div>
			<div style="margin-bottom: 1cm;"><pre><?php	print_r($_POST); ?></pre></div>
			
			<div>SESSION value:</div>
			<div style="margin-bottom: 1cm;"><pre><?php	print_r($_SESSION); ?></pre></div>
			
			<div>FILES value:</div>
			<div><pre><?php	print_r($_FILES); ?></pre></div>
		</div>
		
		<script type="text/javascript">
		dragElement(document.getElementById("monitor"));

		function dragElement(elmnt) {
		var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
		if (document.getElementById(elmnt.id + "header")) {
		// if present, the header is where you move the DIV from:
		document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
		} else {
		// otherwise, move the DIV from anywhere inside the DIV:
		elmnt.onmousedown = dragMouseDown;
		}

		function dragMouseDown(e) {
		e = e || window.event;
		e.preventDefault();
		// get the mouse cursor position at startup:
		pos3 = e.clientX;
		pos4 = e.clientY;
		document.onmouseup = closeDragElement;
		// call a function whenever the cursor moves:
		document.onmousemove = elementDrag;
		}

		function elementDrag(e) {
		e = e || window.event;
		e.preventDefault();
		// calculate the new cursor position:
		pos1 = pos3 - e.clientX;
		pos2 = pos4 - e.clientY;
		pos3 = e.clientX;
		pos4 = e.clientY;
		// set the element's new position:
		elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
		elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
		}

		function closeDragElement() {
		// stop moving when mouse button is released:
		document.onmouseup = null;
		document.onmousemove = null;
		}
		}
		</script>
	</body>
</html> -->