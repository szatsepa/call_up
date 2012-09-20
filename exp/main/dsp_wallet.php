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

            </tbody>
        </table>
    </div>
    
</div>