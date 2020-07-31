<?php
	session_start();
	session_destroy();
	$url='sign_in.html';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	
	?>
