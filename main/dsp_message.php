<?php 
    if (mysql_num_rows($qry_message) == 1) {
 ?><span class="message"><strong style="color:red;">Сообщение:</strong> <?php echo mysql_result($qry_message,0); ?></span><?php } ?>