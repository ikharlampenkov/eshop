<h1>Каталог</h1>

{if $action=='add_rubric' || $action=="edit_rubric"}

    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}{if $action=='edit_rubric'}&id={$rubric->id}{/if}&rubric={$cur_rubric->getId()}" method="post">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="{$rubric->title}" /></td>
            </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[parent]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if (isset($rubric) && $rub->id==$rubric->parent) || (!isset($rubric) && $rub->id==$cur_rubric->getId())}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>


{elseif $action=='add_product' || $action=='edit_product'}

    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}{if $action=='edit_product'}&id={$product->id}{/if}&rubric={$cur_rubric->getId()}" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td width="200">Название</td>
                <td><input name="data[title]" value="{$product->title}" /></td>
            </tr>
            <tr>
                <td>Рисунок</td>
                <td>{if $product->img->getName()}<img src="{$siteurl}files/{$product->img->getName()}" /><br />
                    &nbsp;<a href="?page={$page}&action=del_img&id={$product->id}&rubric={$cur_rubric->getId()}">удалить</a><br />{/if}
                    <input type="file"  name="img" /></td>
            </tr>
            <tr>
                <td>Рубрика</td>
                <td><select name="data[rubric]">
                        {foreach from=$rubric_tree item=rub}
                            <option value="{$rub->id}" {if (isset($product) && $rub->id==$product->rubric->id)  || (!isset($product) && $rub->id==$cur_rubric->getId())}selected="selected"{/if}>{$rub->title}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td>Цена</td>
                <td><input name="data[price]" value="{$product->price}" /></td>
            </tr>
            <tr>
                <td>Текст</td>
                <td><textarea name="data[short_text]">{$product->shortText}</textarea></td>
            </tr>
            <tr>
                <td>Полный текст</td>
                <td><textarea name="data[full_text]">{$product->fullText}</textarea></td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

{else}
    
    {if $path}
    <div>
    {foreach from=$path item=prub name=_prub}
        <a href="?page={$page}&rubric={$prub->getId()}">{if !$prub->isRoot}{$prub->title}{else}..{/if}</a> {if !$smarty.foreach._prub.last}/{/if}
    {/foreach}
    </div>
    {/if}
    
    {if !$cur_rubric->isRoot}
    <h3>{$cur_rubric->title}</h3>
    {/if}

    <h4>Рубрики</h4>
    
    {if $rubric_list}

        <table>
            {foreach from=$rubric_list item=rubric}
                <tr>
                    <td><a href="?page={$page}&rubric={$rubric->getId()}">{$rubric->title}</a></td>
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
                    <td>{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                    <td>{$product->title}</td>
                    <td>{$product->shortText}</td>
                    <td>{$product->price}</td>
                    <td><a href="?page={$page}&action=edit_product&id={$product->getId()}&rubric={$cur_rubric->getId()}">редактировать</a><br /><a href="?page={$page}&action=del_product&id={$product->getId()}&rubric={$cur_rubric->getId()}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}

    <a href="?page={$page}&action=add_product&rubric={$cur_rubric->getId()}">добавить товар</a>

{/if}
