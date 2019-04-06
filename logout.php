<?php
session_start();
session_destroy();
	printf("<script>
		alert('Anda baru saja logout');
		window.location.replace('index.php');
		</script>");
?>