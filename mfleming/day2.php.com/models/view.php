<?php

	class View {
		
		function printHeader() {
		    header("Content-type: text/html");
		}
		
		function getView($file='', $data='') {
			$fullPath = "/Users/Michael/Sites/day2.php.com/views/$file.php";
			
			if (file_exists($fullPath)) {
				include($fullPath);
			}
		}
	}

?>