<br />
<br />
&nbsp;<strong>Матрица</strong><br /><br />
<form action="index.php?act=upd_matrix" method="post" name="upd_matrix">
&nbsp;<select name="topic"><?php
$topic = array ("A","B","C","D","E");
$row = 0;
while ($row < count($topic)) {
    for ($i = 1; $i <= 5; $i++) {
        echo "<option value='".$topic[$row].$i."'>&nbsp;".$topic[$row].$i."&nbsp;</option>";
    }
   	++$row;
}
unset($topic);
?></select><input type="text" name="id" class="submit2" value="" style="width:10em;"><input type="submit" value="Установить" class="submit2">
</form>
<br />
<br />
<?php display_matrix('admin',$qry_matrix,$environment); ?>