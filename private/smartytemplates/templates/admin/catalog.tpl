<h1>Каталог</h1>

{if $action=='add_rubric' || $action=="edit_rubric"}

    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}{if $action=='edit_rubric'}&id={$rubric.id}{/if}" method="post">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="{$rubric->title}" /></td>
            </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[parent]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if isset($rubric) && $rub.id==$rubric->parent}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>


{elseif $action=='add_product' || $action=='edit_product'}

    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}{if $action=='edit_product'}&id={$product->id}{/if}&rubric={}" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="{$product->title}" /></td>
            </tr>
            <tr>
            <td>Рисунок</td>
            <td>{if !empty($product->img)}<img src="{$siteurl}files/{$product->img->getName()}" /><br />
                &nbsp;<a href="?page={$page}&action=del_img&id={$product->id}">удалить</a><br />{/if}
                <input type="file"  name="img" /></td>
        </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[rubric]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if isset($product) && $rub.id==$product->rubric}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Текст</td>
                <td><textarea name="data[shot_text]">{$product->shot_text}</textarea></td>
            </tr>
            <tr>
                <td>Полный текст</td>
                <td><textarea name="data[full_text]">{$product->full_text}</textarea></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

{else}

    <h4>Рубрики</h4>

    {if $rubric_list}

        <table>
            {foreach from=$rubric_list item=rubric}
                <tr>
                    <td><a href="?page={$page}&rubric={$cur_rubric->getId()}">{$rubric->title}</a></td>
                    <td><a href="?page={$page}&action=edit_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}">редактировать</a><br /><a href="?page={$page}&action=del_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}

    <a href="?page={$page}&action=add_rubric&rubric={$cur_rubric->getId()}">добавить рубрику</a>

    <hr/>

    <h4>Товары</h4>

    {if $product_list}

        <table>
            {foreach from=$product_list item=product}
                <tr>
                    <td><img src="/files/{$product->img}" /></td>
                    <td>{$product->title}</a></td>
                    <td><a href="?page={$page}&action=edit_product&id={$product->getId()}&rubric={$cur_rubric->getId()}">редактировать</a><br /><a href="?page={$page}&action=del_product&id={$product->getId()}&rubric={$cur_rubric->getId()}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}

    <a href="?page={$page}&action=add_product&rubric={$cur_rubric->getId()}">добавить товар</a>

{/if}
