<?php

$new_advert = $document_root . '/images/logos/logo_' . $attributes[company_id] . '.jpg';

if (!file_exists($new_advert)) {
   $javascript = "javascript:alert('Отсутствует логотип компании. Загрузите изображение.');";
} else {

    include ("qry_updcompanyadvert.php");
    $javascript = "javascript:alert('Компания установлена на начальной странице.');";
}

 ?>