{if isset($chart_list)}
<table width="100%">
{foreach from=$chart_list item=buying}
    <tr>
        <td style="background-color:white; padding: 10px;"><b>{$buying.product->title}</b><br/>
            {if $isComplite}Кол-во: {$buying.count}
                {else}<input type="text" class="buy-count" id="buying_{$buying.product->id}" name="buying_{$buying.product->id}" value="{$buying.count}" onchange="countChartS({$buying.product->id})"/>{/if}
        </td>
    </tr>
{/foreach}
</table>
<br>
{/if}


{if isset($summ) && $summ!=0}
<div align="center"><b>Итого: {$summ}</b></div>
    {if $isComplite}
    <div align="center" style="color: red">Заказ принят. Ожидайте.</div>
        {else}

    Имя: <input type="text" id="name" name="name"/><br/>
    Телефон: <input type="text" id="tel" name="tel"/><br/>
    E-mail: <input type="text" id="email" name="email"/><br/>
    <button onclick="orderS()">Заказать</button>
    {/if}
{/if}
