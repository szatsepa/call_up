<?php 

if (isset($attributes[price_id]) and intval($attributes[price_id]) > 0) {
	
		$price_id = intval($attributes[price_id]);
	
		if (isset($eid)) {
		
			$eid = "&eid=".$eid;
		
		} else {
		
			$eid = "";
		
		}
		
			
		header ("location:index.php?act=price&price_id=".$price_id.$eid);
	
} else {

	header ("location:index.php");

}
?>