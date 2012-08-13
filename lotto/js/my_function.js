/* 
 * created by arcady.1254@gmail.com 22/2/2012
 */
    function go_Artikul(artikul,price_id, stid, cod){
     
      var str_out = '';
      var out = '';
      
    if(!cod){
        out = "index.php?act=item_description&artikul="+artikul+"&price_id="+price_id+"&stid="+stid;
    }else{
        out = "index.php?act=item_description&artikul="+artikul+"&price_id="+price_id+"&stid="+stid+"&cod="+cod;
    }
    
    document.location.href = out;
}


