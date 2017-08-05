<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

echo "Your cookies have been eaten and you have been logged out.<br /><br />Why did you logout? Do you really hate us that much?"

?>