<div style="background-color:#f0f0f0; padding:5px;"><h1>СТАТЬИ</h1></div>

{if $action=="add_news" || $action=="edit_news"}

<h2>{$txt}</h2>

<form action="?page={$page}&action={$action}{if $action=='edit_news'}&id={$news.id}{/if}" method="post">
    <table width="100%">
        <tr>
            <td width="200" class="ttovar">Название</td>
            <td class="ttovar"><input name="data[title]" value="{$news.title}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Дата</td>
            <td class="ttovar"><input name="data[date]" value="{if isset($news.date)}{$news.date|date_format:"%d.%m.%Y"}{else}{$smarty.now|date_format:"%d.%m.%Y"}{/if}"/></td>
        </tr>
        <tr>
            <td class="ttovar">Анонс</td>
            <td class="ttovar"><textarea name="data[short_text]">{$news.short_text}</textarea></td>
        </tr>
        <tr>
            <td class="ttovar">Текст</td>
            <td class="ttovar">{$ckeditor}</td>
        </tr>
    </table>
    <input id="save" name="save" type="submit" value="Сохранить"/>
</form>

    {else}

    {if $news_list!==false}
    <table width="100%">
        <td style="background-color:#f7f7f7; padding: 10px; text-align:center;" valign="middle">
            <a href="?page={$page}&action=add_news">ДОБАВИТЬ СТАТЬЮ</a>
        </td>
    </table>

        {if $page_info.page_count>1}
        <table>
            <tr>
                <td id="pager">Страница:
                    {section name=pager loop={$page_info.page_count} start=0}
                        {if $smarty.section.pager.index==$cur_page}<b>{$smarty.section.pager.index+1}</b>{else}<a href={$siteurl}?page={$page}&action={$action}&pager={$smarty.section.pager.index} >{$smarty.section.pager.index+1}</a> {/if}
                    {/section}
                </td>
            </tr>
        </table>
        {/if}

    <table width="100%" cellpadding="5" border="0" style="font-size:14px;">
        <tr>
            <td class="ttovar">Дата</td>
            <td class="ttovar">Заголовок</td>
            <td class="ttovar">Анонс</td>
            <td class="ttovar">&nbsp;</td>
        </tr>
        {foreach from=$news_list_full item=news}
            <tr>
                <td class="ttovar">{$news.date|date_format:"%d.%m.%Y"}</td>
                <td class="ttovar">{$news.title}</td>
                <td class="ttovar">{$news.short_text|strip_tags:false|truncate:50}</td>
                <td class="tedit">
                    <a href="?page={$page}&action=edit_news&id={$news.id}">редактировать</a>
                    <a href="?page={$page}&action=del_news&id={$news.id}" onclick="return confirmDelete('{$news.title}');" style="color: #830000">удалить</a>
                </td>

            </tr>
        {/foreach}
    </table>

        {if $page_info.page_count>1}
        <table>
            <tr>
                <td id="pager">Страница:
                    {section name=pager loop={$page_info.page_count} start=0}
                        {if $smarty.section.pager.index==$cur_page}<b>{$smarty.section.pager.index+1}</b>{else}<a href={$siteurl}?page={$page}&action={$action}&pager={$smarty.section.pager.index} >{$smarty.section.pager.index+1}</a> {/if}
                    {/section}
                </td>
            </tr>
        </table>
        <br/>
        {/if}

    {/if}

<br>
{/if}