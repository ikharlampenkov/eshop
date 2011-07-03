<h1>Заказы</h1>

{if $action=='edit'} 
    
    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}&id={$order->id}" method="post">
        <table>
            <tr>
                <td>Пользователь</td>
                <td><select name="data[user_login]">
                        {foreach from=$user_list item=user}
                            <option value="{$user.login}" {if $user.login==$order->user}selected="selected"{/if}>{$user.login}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Дата</td>
                <td><input name="data[date]" value="{$order->date|date_format:"%d.%m.%Y"}" /></td>
            </tr>
            <tr>
                <td>Скидка</td>
                <td><input name="data[discount]" value="{$order->discount}" /></td>
            </tr>
            <tr>
                <td>Завершeн</td>
                <td><input type="checkbox" name="data[is_complite]" {if $order->isComplite}checked="checked"{/if} style="width:14px;" /></td>
            </tr>   
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>
     
    <h4>Товары</h4>

    {if $order->productList}

        <table>
            {foreach from=$order->productList item=product}
                <tr>
                    <td width="110">{if $product.product->img->getName()}<img src="/files/{$product.product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                    <td>{$product.product->title}</td>
                    <td>{$product.product->price}</td>
                    <td>{$product.count}</td>
                </tr>
            {/foreach}
            <tr>
                <td colspan="2">Итого</td>
                <td>{$order->getSumm()}</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    {/if}
                    
    
{else}    

{if $order_list}

        <table>
            <tr>
                <td>Пользователь</td>
                <td>Дата</td>
                <td>Сумма</td>
                <td>Скидка</td>
                <td>Сумма со скидкой</td>
                <td>Завершен</td>
                <td>&nbsp;</td>
            </tr>
            {foreach from=$order_list item=order}
                <tr>
                    <td>{$order->user}</td>
                    <td>{$order->date}</td>
                    <td>{$order->getSumm()}</td>
                    <td>{$order->discount}</td>
                    <td>{$order->getSummWithDiscount()}</td>
                    <td>{$order->isComplite}</td>
                    <td><a href="?page={$page}&action=edit&id={$order->id}">редактировать</a><br />
                        <a href="?page={$page}&action=del&id={$order->id}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}
    
{/if}