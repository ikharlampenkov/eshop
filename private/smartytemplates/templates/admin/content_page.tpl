<h1>Контентные страницы</h1>


{if $action=="add" || $action=="edit"}

<h2>{$txt}</h2>

<form action="?page={$page}&action={$action}{if edit}&id={$conpage.id}{/if}" method="post">
    <table>
        <tr>
            <td width="200">Название страницы (англ)</td>
            <td><input name="data[page_title]" value="{$conpage.page_title}" /></td>
        </tr>
        <tr>
            <td>Название страницы</td>
            <td><input name="data[title]" value="{$conpage.title}" /></td>
        </tr>
        <tr>
            <td>Текст</td>
            <td><textarea name="data[content]">{$conpage.content}</textarea></td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить" />
</form>

{else}

{if $conpage_list!==false}
<table>
{foreach from=$conpage_list item=conpage}
    <tr>
        <td>{$conpage.page_title}</td>
        <td>{$conpage.title}</td>
        <td><a href="?page={$page}&action=edit&id={$conpage.id}">редактировать</a><br /><a href="?page={$page}&action=del&id={$conpage.id}">удалить</a> </td>
    </tr>
{/foreach}
</table>
{/if}

<a href="?page={$page}&action=add">добавить</a>

{/if}