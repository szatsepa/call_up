<?php
$simbl_array = array('O','A','B','C');
?>
<div class="pager">

    <div class="pager_1">
        <p class="pager_2" align="center" >

        <a class="a_pager" href="index.php?act=look&page=1">A</a>  
        <a class="a_pager" href="index.php?act=look&page=2">B</a>
        <a class="a_pager" href="index.php?act=look&page=3">C</a>
    </div>

    <div class="pager_0">  
        <p class="pager_2" style="font-size: 18px;font-weight: bold;" align="center">Страница <?php echo $simbl_array[$page];?>&nbsp;&nbsp;</p>
    </div>
</div>
