<?php 
if ($mobile == 'true') {
	header ("location:index.php?".$urladd);
} else {
	header ("location:index.php?act=kabinet".$urladd);
}
?>