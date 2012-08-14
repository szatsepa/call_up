<?php

/*
 * created by arcady.1254@gmail.com 9.11.2011
 */

class User{
    
    var $data;
    
    function User(){
        $this->data = array();
    }
    
    function setUser($id){  
        
        $query = "SELECT id, surname, name, patronymic, phone, email, role, status FROM users WHERE id = $id";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->data = $row; 
    }
    function setCustomer($id){
        
        $query = "SELECT id, surname, name, patronymic, phone, e_mail AS email, shipping_address, desire FROM customer WHERE id = $id";
                
        $result = mysql_query($query) or die($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->data = $row;
        
    }
}

class Storefront{
    
    var $prices = array();
    
    function Storefront(){
      
    }
    function setStore($price){
        array_push($this->prices, $price);        
    }
}
// create class price

class Price{
    
    var $id;
    var $name;
    
    function Price(){
        
    }
    
    function setPrice($id, $price_name){
        $this->id = $id;
        $this->name = $price_name;
    }
    
}

//создадим класс артикул

class Artikul extends Price{
    
    var $image;
    var $name;
    var $artikul;
    var $price;
    var $volume;
    var $barcod;
    var $price_id;
    
    function Artikul(){
        
    }
    
    function setArtikul($img, $name, $art, $price, $vol,$price_id){
        $this->image = $img.".jpg";
        $this->name = $name;
        $this->artikul = $art;
        $this->price = $price;
        $this->volume = $vol;
        $this->price_id = $price_id;       
    }
}
class Name_artikul{
    
    var $name;
    var $state;
    var $pakage;
    var $group;
    var $pricelist;
    var $img;
    var $p_name;
    var $unit;
    var $volume = array();
    var $barcode;
//    var $artikles = array();
    var $id;
    
    function Name_artikul(){
        
    }

    function setName_artikul($name, $artikul, $price_id){  
        
        $this->artikul = $artikul;
        $this->name = $name;
        $this->pricelist = $price_id; 
        
      $artikul = quote_smart($artikul);
      
        $query = "SELECT  gp.id AS good_picture,
                            pl.str_name, 
                            p.comment, 
                            pl.str_state,
                            pl.str_package,
                            pl.str_group,
                            pl.str_unit,
                            p.id AS pricelist_id,
                            pl.num_price_single,
                            pl.id AS goods_id,
                            pl.str_barcode AS barcode,
                            pl.id
                        FROM pricelist AS pl, 
                            goods_pic AS gp, 
                            price AS p
                        WHERE gp.barcode = pl.str_barcode 
                            AND pl.str_code1 = $artikul
                            AND p.id = $price_id
                        ORDER BY gp.id";
        
//        echo "$query<br>"; 
    
    $qry_name = mysql_query($query) or die($query);
    
        while($row = mysql_fetch_assoc($qry_name)){
//            $this->name = $row[str_name];
            $this->state = $row[str_state];
            $this->pakage = $row[str_pakage];
            $this->group = $row[str_group];
            $this->unit = $row[str_unit];
//            $this->pricelist = $row[pricelist_id];
            $this->img = $row[good_picture];
            $this->p_name = $row[comment];
            $this->barcode = $row[barcode];
            $this->id = $row[id];
        }
//        
//              
      $query = "SELECT  pl.id, 
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_volume, 
                        pl.num_price_single, 
                        pl.num_price_pack,
                        pl.num_amount
                  FROM pricelist AS pl, 
                         price AS p 
                WHERE p.id = pl.pricelist_id 
                    AND pl.num_amount > 0
                    AND pl.str_name = $name
                    AND p.id = $price_id
        ORDER BY pl.str_volume";

        $qry_volume = mysql_query($query) or die ($query);

        while($row = mysql_fetch_assoc($qry_volume)){
            
            array_push($this->volume, $row);
        }
        
           
    }
}
class Advert{
    
    var $data;
    
    function Advert(){
        
    }
    function setAdvert($img_arr){
        
        $this->data = $img_arr;
        
    }
    
}
?>
