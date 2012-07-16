<div style="background-color:#f0f0f0; padding:5px;"><h1>ВЕРХНИЙ БАННЕР</h1></div>

{if $action=='add' || $action=="edit"}

<h1>{$txt}</h1>

<form action="?page={$page}&action={$action}{if $action=='edit'}&id={$banner->id}{/if}" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$banner->title}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Рисунок</td>
            <td class="ttovar">
                {if isset($banner) &&   $banner->img->getName()}
                    <img src="{$siteurl}files/{$banner->img->getName()}"/><br/>
                {/if}
                <input type="file" name="img"/></td>
        </tr>
        <tr>
            <td class="ttovar">На первой странице?</td>
            <td class="ttovar"><input type="checkbox" name="data[is_first_page]" {if $banner->isFirstPage}checked="checked"{/if}></td>
        </tr>

    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

    {else}

<table width="100%">
    <tr>
        <td colspan="5" style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle"><a href="?page={$page}&action=add">добавить баннер</a></td>
    </tr>
    {if $bannerList}
        {foreach from=$bannerList item=banner}
            <tr>
                <td class="ttovar">{if $banner->img->getName()}<img src="/files/{$banner->img->getPreview()}"/>{else}&nbsp;{/if}</td>
                <td class="ttovar">{$banner->title}</td>
                <td class="ttovar">{if $banner->isFirstPage}На первой странице{else}Все остальные страницы{/if}</td>
                <td class="tedit"><a href="?page={$page}&action=edit&id={$banner->getId()}">редактировать</a><br/>
                    <a href="?page={$page}&action=del&id={$banner->getId()}" onclick="return confirmDelete('{$banner->title}');" style="color: #830000">удалить</a></td>
            </tr>
        {/foreach}
    {/if}
</table>

{/if}
