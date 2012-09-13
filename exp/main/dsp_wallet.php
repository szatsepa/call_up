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
    <table id="kurs" width="100%">
        <thead>
            
        </thead>
        <tbody>
            <tr>
                <td>
                    <p id="cross_ku"><strong>Конверт курс: 1 число = 1 рубль</strong></p>  
                </td>
                <td>
                    <p><strong>Курс рубля на <span id="senja"></span> г. (даные ЦБР)</strong></p>  
                </td>                    
            </tr>
            <tr>
                <td>
                    <p>Ваш личный счет.<span></span></p>
                </td>
                <td>
                    <p>Доллар США:&nbsp;<span id="c_usd"></span>&nbsp;руб.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Баланс счета:<span id="ballans"></span></p>
                </td>
                <td>
                    <p>Евро:&nbsp;<span id="c_euro"></span>&nbsp;руб.</p>
                </td>
            </tr>
        </tbody>
    </table>
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