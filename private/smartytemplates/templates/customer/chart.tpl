<table>
    {foreach from=$chart_list item=buying}
        <tr>
            <td><b>{$buying.product->title}</b><br/>
                {if $isComplite}Кол-во: {$buying.count} 
                {else}<input type="text" id="buying_{$buying.product->id}" name="buying_{$buying.product->id}" value="{$buying.count}" onchange="countChart({$buying.product->id})"/>{/if}
        </td>
    </tr>
{/foreach}
</table>

{if $summ!=0}    
    <div>Итого: {$summ}</div>
    {if $isComplite}
        <div>Заказ принят. Ожидайте.</div>
    {else}
        <button onclick="order()">Заказать</button>
    {/if}
{/if}
