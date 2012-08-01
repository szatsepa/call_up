<?php
/* Функция принимает текстовую переменную, в которой содержатся данные,
разделенные точкой с запятой. Возвращает отформатированный html-текст с гиперссылками

*/

function string2html($string){
    
    $array_data = explode(";", $string);
    
    $output = "";
    foreach ($array_data as $value) {
        if (stristr($value, '@')) {
            
            $array_spec = explode(" ", $value);
            foreach ($array_spec as $value2) {
                if (stristr($value2, '@')) {
                    $output .= "<a href='mailto:".$value2."'>";
                    $output .= $value2."</a>";
                } else {
                    $output .= $value2."&nbsp;";
                }
             }
        } elseif (stristr($value, 'http://')) {
            $array_spec = explode(" ", $value);
            foreach ($array_spec as $value2) {
                if (stristr($value2, 'http://')) {
                    $output .= "<a href='".$value2."' target='_blank'>";
                    $output .= $value2."</a>";
                } else {
                    $output .= $value2."&nbsp;";
                }
             }
                        
        } else {
            $output .= $value;
        }
        
        $output .= "<br />";    
    }

return $output;

}
?>