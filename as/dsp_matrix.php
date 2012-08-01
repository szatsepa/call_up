<?php
// Функция вывода матрицы прайсов
// $mode == 'admin' -- вывод матрицы в административной области
// $mode == 'home'  -- вывод матрицы с картинками на первой странице
// $qry -- результат запроса данных матрицы из базы

function display_matrix($mode,$qry,$env){

	$topic = array ("A","B","C","D","E");
	
	if ($env == 'dev') {
		$dir = 'win/';
	} else {
		$dir = '';
	}
	
	// Массив ячеек матрицы
	$cell = array();
	
	// Заполняем массив ячеек матрицы пустыми значениями
	$row = 0;
	while ($row < count($topic)) { 
	    for ($i = 1; $i <= 5; $i++) {
			$index = $topic[$row].$i;
	        $cell[$index] = 0;
	    } 
	   	++$row;
	}
	
	// Заполним матрицу значениями из базы
	while ($row = mysql_fetch_assoc($qry)) {
	 		$index = substr($row["id"],0,2);
			$cell[$index] = substr($row["id"],3);
	    }	
	//mysql_data_seek($qry,0);
	
	// Выводим матрицу в админке
	if ($mode == 'admin') {
		echo '<table border="0" cellpadding="7" cellspacing="0">';
		$row = 0;
		while ($row < count($topic)) {
		    echo "<tr>";
		    for ($i = 1; $i <= 5; $i++) {
				$index = $topic[$row].$i;
				if ($cell[$index] > 0) {
			        echo "<td><a href='/".$dir."index.php?act=single_price&pricelist_id=".$cell[$index]."' target='_blank'>".$topic[$row].$i."</a></td>";
				} else {
					echo "<td>".$topic[$row].$i."</td>";
				}
		    }
		    echo "</tr>";
		   	++$row;
		}
		echo '</table>';
	}
	
	// Выводим матрицу в home
	if ($mode == 'home') {
		echo '<table border="0" cellpadding="1" cellspacing="0">';
		$row = 0;
		while ($row < count($topic)) {
		    echo "<tr>";
		    for ($i = 1; $i <= 5; $i++) {
				$index = $topic[$row].$i;
				if ($cell[$index] > 0) {
			        echo '<td><a href="/'.$dir.'index.php?act=single_price&pricelist_id='.$cell[$index].'" class="matrix"><img src="images/'.$topic[$row].$i.'.jpg" width="128" height="96" border="0" alt=""></a></td>';
				} else {
					//echo '<td><a href="/'.$dir.'" class="matrix"><img src="images/'.$topic[$row].$i.'.jpg" width="128" height="96" border="0" alt=""></a></td>';
                    echo '<td><a href="/'.$dir.'" class="matrix"><img src="images/blank.jpg" width="128" height="96" border="0" alt=""></a></td>';
				}
		    }
		    echo "</tr>";
		   	++$row;
		}
		echo '</table>';
	}
	
} ?>