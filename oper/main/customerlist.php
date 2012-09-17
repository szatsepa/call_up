<?php
    $title .= " - клиенты.";
?>
<div id="cust_list">
    
    <table class="dat" id="c_list" border="1">
        <thead>
            <th class="dat">Id</th>
            <th class="dat">Ф.И.О.</th>
            <th class="dat">E-mail</th>
            <th class="dat">Телефон</th>
            <th class="dat">Адрес</th>
            <th class="dat">Пожелания</th>
            <th class="dat"></th>
            <th class="dat"></th>
            <th class="dat"></th>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br>
    <br>
    <div id="about_customer">
        <table border="0" cellpadding="0">
            
            <tr>
                    <td><input type="hidden" id="cuid" value=""/>Фамилия</td>
                    <td><input type="text" id="cu_surname" size="50" maxlength="255" value=""></td>
            </tr>
            <tr>
                    <td>Имя</td>
                    <td><input type="text" id="cu_name" size="50" maxlength="255" value=""></td>
            </tr>
            <tr>
                    <td>Отчество</td>
                    <td><input type="text" id="cu_patronymic" size="50" maxlength="255" value=""></td>
            </tr>
            <tr>
                    <td>Email</td>
                    <td><input type="text" id="cu_email" size="50" maxlength="255" value=""></td>
            </tr>
            <tr>
                    <td>Телефон</td>
                    <td><input type="text" id="cu_phone" size="20" maxlength="20" value=""></td>
            </tr>
            <tr>
                    <td>Адрес</td>
                    <td><input type="text" id="cu_shipping" size="20" maxlength="20" value=""></td>
            </tr>
            <tr>
                    <td>Пожелания</td>
                    <td><input type="text" id="cu_desire" size="20" maxlength="20" value=""></td>
            </tr>

                <td></td>
                <td align="right"><input type="button" id="edit_cu" value="Запомнить"></td>
        </tr>
        </table>
    </div>

</div>