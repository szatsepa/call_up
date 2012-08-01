<?php

//    if(!isset ($_SESSION[user]))$type = $_SESSION[auth];

foreach ($prices_arr as $key => $value) {
    
$c_list_array = array();

$c_list_array = $value;

    if(count($c_list_array) == 0){
    
    ?>
<!-- <form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script> -->
<?php

}else{
    
unset($array_fields);

$array_fields = array();


$all_cost = 0;

foreach ($c_list_array as $key => $value) {
    

        $artikul = $value[str_code1];

	$img  = $value[imagin];

	$name = $value[status]."<br/> ".$value[str_name];

	$price = $value[num_price_single];

	$volume = $value[str_volume];

	$amount = $value[num_amount]; 
        
        $comment = $value[comment]; 

	$count_volume = count_Volume($name); 
        
        $price_id = $value[price_id];
        
        include 'dsp_cart_plus.php';
    
}


 if(isset ($attributes[change]) and $attributes[change] == 1){
}
 if(isset ($attributes[up]) and isset($attributes[affected]) and $attributes[affected] == 1){
} 
  if(isset ($attributes[down]) and isset($attributes[affected]) and $attributes[affected] == 1){

  unset($attributes[affected]);
  
  unset($attributes[down]);
  
  unset ($attributes[up]);
        }
    }
}
?>