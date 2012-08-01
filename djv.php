<?php 

//echo date("r",(time() - 10));

phpinfo();
//echo time();


/*$zip = new ZipArchive();
$filename = "test112.zip";

if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}


$zip->addFile("qry_cart.php","qry_price.php");
echo "numfiles: " . $zip->numFiles . "\n";
echo "status:" . $zip->status . "\n";
$zip->close();
*/

/*
$zip = new ZipArchive;
if ($zip->open('pics.zip') === TRUE) {
    $zip->extractTo($_SERVER["DOCUMENT_ROOT"].'/win/images/');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}

*/

?>