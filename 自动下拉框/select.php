<?php
	$pro = $_GET['province'];
	if($pro == "fujian"){
		$message = array(
			array('city' => 'fuzhou','code'=> 361000,'ID'=>0 ),
			array('city' => 'xiamen','code'=> 362000,'ID'=>1 ),
			array('city' => 'zhangzhou','code'=> 363000,'ID'=>2 ),
			array('city' => 'quanzhou','code'=> 364000,'ID'=>3),
			array('city' => 'sanming','code'=> 365000,'ID'=>4 ),
		);
	}
	elseif ($pro == "zhejiang") {
		$message = array(
			array('city' => 'hangzhou','code'=>400000,'ID'=>1 ),
			array('city' => 'wenzhou','code'=>400001,'ID'=>2 ),
			array('city' => 'shaoxing','code'=>400002,'ID'=>3 ),
			array('city' => 'huzhou','code'=>400003,'ID'=>4 )
		);
	}
	
	echo json_encode($message);
	
?>
