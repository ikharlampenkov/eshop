<div style="background-color:#f0f0f0; padding:5px;"><h1>КОНТЕНТНЫЕ РАЗДЕЛЫ</h1></div>


{if $action=="add" || $action=="edit"}

<h1>{$txt}</h1>

<form action="?page={$page}&action={$action}{if $action=='edit'}&id={$conpage.id}{/if}" method="post">
    <table width="100%">
        <input name="data[page_title]" value="{$conpage.page_title}" hidden/>
        
        <tr>
            <td class="ttovar" width="150">Название страницы</td>
            <td class="ttovar"><input name="data[title]" value="{$conpage.title}" /></td>
        </tr>
        <tr>
            <td class="ttovar">Текст</td>
            <td class="ttovar">{$ckeditor} {*<textarea name="data[content]">{$conpage.content}</textarea>*}</td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

{else}

{if $conpage_list!==false}
<table width="100%">
{foreach from=$conpage_list item=conpage}
    <tr>
        <td class="ttovar">{$conpage.title}</td>
        <td class="tedit"><a href="?page={$page}&action=edit&id={$conpage.id}" class="tedit">редактировать</a></td>
    </tr>
{/foreach}
</table>
{/if}

{/if}