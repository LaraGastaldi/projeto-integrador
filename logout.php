<?php
	session_start();
	session_destroy();
	if (isset($_COOKIE)) {
		unset($_COOKIE['admin']);
		setcookie("admin", "", 1, "/");
	}

	echo '<meta http-equiv="refresh" content="0;url=index.php">';

?>