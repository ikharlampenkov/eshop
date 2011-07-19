<table width="100%">
    {foreach from=$chart_list item=buying}
        <tr>
            <td style="background-color:white; padding: 10px;"><b>{$buying.product->title}</b><br/>
                {if $isComplite}Кол-во: {$buying.count} 
                {else}<input type="text" id="buying_{$buying.product->id}" name="buying_{$buying.product->id}" value="{$buying.count}" onchange="countChart({$buying.product->id})" />{/if}
        </td>
    </tr>
{/foreach}
</table>
<br>
{if $summ!=0}    
    <div align="center"><b>Итого: {$summ}</b></div>
    {if $isComplite}
        <div align="center" style="color: red">Заказ принят. Ожидайте.</div>
    {else}
        <button onclick="order()">Заказать</button>
    {/if}
{/if}
