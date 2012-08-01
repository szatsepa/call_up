<?php 

function count_cart($user_id,$pricelist_id){

	$count = 0;

$query = "SELECT num_amount FROM cart WHERE user_id=$user_id AND price_id=$pricelist_id";

$qry_count = mysql_query($query) or die($query);

while($num_amount = mysql_fetch_row($qry_count)){

	$count += $num_amount[0];
		
	}

	return $count;
}

function good_image($artikul){


$query = "SELECT gp.id, p.str_name, p.str_volume, p.num_price_single, pr.comment FROM goods_pic AS gp, pricelist AS p, price AS pr WHERE gp.barcode = p.str_barcode AND pr.id = p.pricelist_id AND p.str_code1 = $artikul";

$qry_img = mysql_query($query) or die($query);

$artikul_arr = mysql_fetch_assoc($qry_img);


return $artikul_arr;

}

function good_description($artikul){

$query = "SELECT g.short_description, g.ingridients, g.specification, g.gost FROM goods AS g, pricelist AS pl WHERE pl.str_barcode = g.barcode AND pl.str_code1 = $artikul";

$qry_description = mysql_query($query) or die($query);

$description = mysql_fetch_assoc($qry_description);

$cnt = mysql_num_rows($qry_description);


if($cnt == 0){

	return 0;

}else{

return $description;

}

}

function goods_list($pricelist_id, $artikul){

	$list_arr = array();

	$position = 0;

	$query = "SELECT pl.str_code1, gp.id, pl.str_name, p.comment, pl.str_volume, pl.num_price_single FROM pricelist AS pl, goods_pic AS gp, price AS p WHERE gp.barcode = pl.str_barcode AND pl.pricelist_id = p.id AND p.id = $pricelist_id";
	
	$qry_list = mysql_query($query) or die($query);


	while($pr_list = mysql_fetch_assoc($qry_list)){

		array_push($list_arr,$pr_list);
	}

	for($i = 0;$i < count($list_arr); $i++ ) {
		
		$position++;

		if($artikul == $list_arr[$i][str_code1]){
			
			break;

		}
	}

	$out_arr = array();

	for($i = ($position - 2);$i < ($position + 2);$i++){

		
		
			array_push($out_arr,$list_arr[$i]);

		if($i != $position){}

	}

	return $out_arr;

}

function goods_rnd($pricelist_id, $artikul){

	$list_arr = array();

	$query = "SELECT pl.str_code1, gp.id, pl.str_name, p.comment, pl.str_volume, pl.num_price_single FROM pricelist AS pl, goods_pic AS gp, price AS p WHERE gp.barcode = pl.str_barcode AND pl.pricelist_id = p.id AND p.id = $pricelist_id";
	
	$qry_list = mysql_query($query) or die($query);


	while($pr_list = mysql_fetch_assoc($qry_list)){

		array_push($list_arr,$pr_list);
	}

	return $list_arr;

}

?>  