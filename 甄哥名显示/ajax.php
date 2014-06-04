<?php
	if(isset($_GET['value'])){
		$value = $_GET['value'];
		switch ($value) {
			case 'myLove':
				echo 'hebeTien';
				break;
			case 'handsome':
				echo 'zhenge';
				break;
			case 'beautiful':
				echo 'zhenmei';
				break;
			default:
				echo 'hello';
				break;
		}
	}
	
?>