
	<div class ="vstup_reg">
            <div id = "vstup_1_reg">&nbsp;</div>
                <div id = "vstup_2_reg">&nbsp;</div>
	</div>
		
		
<!---контент--> 

	<div class = "cont_reg">
             <form action="index.php?act=registration" method="post" name="f_1">
                 <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
		<div id = "cont_reg_left">
                    <br/>
                    <br/>
                    <br/>

                    <div id = "cont_reg_left_3">Фамилия: </div>
                    <div id = "cont_reg_left_4"><input type="text" required name="surname" size="30"/></div>
                    <div id = "cont_reg_left_3">Имя: </div>
                    <div id = "cont_reg_left_4"><input type="text" name="name" size="30"/></div>
                    <div id = "cont_reg_left_3">Отчечтво: </div>
                    <div id = "cont_reg_left_4"><input type="text" name="patronymic" size="30"/></div>
                    <div id = "cont_reg_left_3">Телефон: </div>
                    <div id = "cont_reg_left_4"><input type="text" required name="phone" size="30"/></div>
                    <div id = "cont_reg_left_3">E-mail: </div>
                    <div id = "cont_reg_left_4"><input type="text" required id="eml"  onblur="return isEmailCorrect()" name="e_mail" size="30"/></div>
<!--                    <div id = "cont_reg_left_3">Адрес доставки: </div>
                    <div id = "cont_reg_left_6"><textarea rows="5" cols="29" name="adress"></textarea></div>
                    <br/>
                    &nbsp;
                    <br/>
                    <div id = "cont_reg_left_3">Пожелания заказчика: </div>
                    <div id = "cont_reg_left_6"><textarea rows="5" cols="29" name="desire"></textarea></div>-->
                </div>
	
		
		<div id = "cont_reg_right" >
			<br/>
                        <div id = "cont_reg_left_spaser">&nbsp;<p>Для того, чтобы продолжить оформление заказа (редактирование, удаление), введите свои данные. </p></div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        
                        <div id = "cont_reg_left_spaser_1"><p>После чего на указанный электронный ящик придет письмо с ключом доступа.</p></div>
			 <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
			<div id = "cont_reg_left_btn">
                        <input type="hidden" name="cod" value="<?php echo $attributes[cod]; unset($attributes[cod])?>"/>
                        <input type="image" src="http://<?php echo $_SESSION[domen];?>/images/storefront/btn_pay_for.jpg" width="259" height="29" border="0" onclick="return validatePwd();"/>
                        </div>
                </div>	
             </form>
	</div>
<div class ="vstup_reg">
    
</div>


