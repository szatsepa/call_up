<div id="account_list">
    
    <table class="dat" id="a_list" border="0">
        <thead>
            <th class="dat">Id</th>
            <th class="dat">Ф.И.О.</th>
            <th class="dat">E-mail</th>
            <th class="dat">Телефон</th>
            <th class="dat">Баланс</th>
            <th class="dat"></th>
            <th class="dat"></th>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br>
    <br>
    <div class="t_wallet">
        <table class="dat" id="table_wallet" border="1" width="792">
            <thead style="font-size: 16px;font-weight: bold;text-align: center;">
                <tr class="dat" id="who">
                    <td colspan="6" style="color: black;text-align: center"></td>
                </tr>
                <tr class="dat"  bgcolor="#eeeeee">
                    <td class="dat" colspan="3" style="color: green;" width="396">
                        Приход
                    </td>
                    <td class="dat" colspan="3" style="color: red;" width="396">
                        Расход
                    </td>
                </tr>
                
            </thead>
            <tbody>
                <tr class="dat" style="font-size: 14px;font-weight: normal;background-color: #ccc">
                    <td class="dat">
                      Дата - время  
                    </td>
                    <td class="dat">
                       Сумма (валюта) 
                    </td>
                    <td class="dat">
                        Источник (номер квитанции)
                    </td>
                    <td class="dat">
                      Дата - время  
                    </td>
                    <td class="dat">
                       Сумма (валюта) 
                    </td>
                    <td class="dat">
                        Номер заказа
                    </td>
                </tr>
                <tr class="dat">
                    
                </tr>

            </tbody>
        </table>
    </div>
    <div id="about_account" style="padding-left: 36px">
        <input type="hidden" id="customer_id" value=""/>
        <table id="cu_account" border="0" cellpadding="8" width="592">
            <thead>
                <tr id="who_account">
                    <td  style="background-color: #ececec;width: 592px;font-size: 16px;font-weight: bold;text-align: center;">
                    </td>
                </tr>
            </thead>
            <tbody  style="font-size: 16px;font-weight: bold;text-align: left;">
                <tr id="sel_type"  class="dat">
                    <td style="text-align: center">
                        <p>
                            <select id="s_type" style="color: black;font-size: 16px;font-weight: bold">
                                <option value="1" selected style="color: black;">Приход</option>
                                <option value="0" style="color: black;">Расход</option>
                            </select>
                        </p>                        
                    </td>                    
                </tr>
                <tr id="carrency">
                    <td>
                        <input type="text" size="12" id="count" placeholder="Сумма" value=""/>
                    
                        <select  class="s_carrency" id="sel_carrency">
                            <option class="s_carrency" value="rub" selected>Руб</option>
                            <option class="s_carrency" value="usd">Доллар</option>
                            <option class="s_carrency" value="euro">Евро</option>
                            <option class="s_carrency" value="num">Число</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" size="64" id="date_doc" placeholder="Дата документа(гггг-мм-дд)" value=""/>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="text" size="64" id="doc" placeholder="Документ" value=""/>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="text" size="64" id="num_doc" placeholder="Номер документа" value=""/>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="button" id="save_doc" value="Сохранить"/>
                    </td>                    
                </tr>
            </tbody>
        </table>
    </div>

</div>