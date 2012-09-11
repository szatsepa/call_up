<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="content">
    <div class="head_wallet">
        <span>Валюта счета /</span><span class="h_wallet" id="usd"> доллар </span>/<span class="h_wallet" id="euro"> евро </span>/<span class="h_wallet" id="rub"> рубль </span>/<span class="h_wallet" id="num"> число </span>/ 
        
    </div>
    <div class="b_wallet">
        <p id="cross_ku">Конверт курс: 1 число = 1 рубль</p> 
        <p>Ваш личный счет:<span>   ямс_0378_Q</span></p> 
<!--        <p>Ваш личный счет:<span id="account"></span></p> -->
        <p>Баланс счета:<span id="ballans"></span></p>
    </div>
    <div class="t_wallet">
        <table id="table_wallet" border="1">
            <thead style="font-size: 18px;font-weight: bold;text-align: center;">
                <tr  bgcolor="#eeeeee">
                    <td colspan="3" style="color: green;">
                        Приход
                    </td>
                    <td colspan="3" style="color: red;">
                        Расход
                    </td>
                </tr>
                
            </thead>
            <tbody>
                <tr style="font-size: 16px;font-weight: normal;background-color: #ccc">
                    <td>
                      Дата - время  
                    </td>
                    <td>
                       Сумма (валюта) 
                    </td>
                    <td>
                        Источник (номер квитанции)
                    </td>
                    <td>
                      Дата - время  
                    </td>
                    <td>
                       Сумма (валюта) 
                    </td>
                    <td>
                        Номер заказа
                    </td>
                </tr>
<!--                <tr>
                    <td>
                       12-03-2012 15:50
                    </td>
                    <td>
                        150 руб.
                    </td>
                    <td>
                        VISA 537648
                    </td>
                    <td>
                        13-03-2012 13-00
                    </td>
                    <td>
                        30 чисел
                    </td>
                    <td>
                        756 483 831 342
                    </td>
                </tr>
                <tr>
                    <td>
                       15-03-2012 9:15
                    </td>
                    <td>
                        $700 
                    </td>
                    <td>
                        QIWI 764563
                    </td>
                    <td>
                        
                    </td>
                    <td>
                       
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                       19-03-2012 10-00
                    </td>
                    <td>
                        5 000 чисел
                    </td>
                    <td>
                        Выплата № 73737373 Заявка № 756 483 831 342
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>--> 
            </tbody>
        </table>
    </div>
    
</div>