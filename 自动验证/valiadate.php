<?php

	
		//不行
			/*$value = $_GET['value'];
			if (eregi("^1\d{10}$",$value)){ 
				echo "success";
		    } 
		　　else{ 
		        echo "error"; 
		    } */
		

	//可以。请输入139
	$value = $_GET['value'];
	if($value == 139){
		echo "success";
	}
	else{
		echo "error";
	}


?>