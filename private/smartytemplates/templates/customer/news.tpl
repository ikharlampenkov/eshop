{if $action=='view_news'}

<h1 style="color: #faa61a;">{$news.title}</h1>

<div>{$news.date|date_format:"%d.%m.%Y"}</div><br/>
<div>{$news.full_text}</div>

<br/><br/>
<a href="{$siteurl}?page=news">Все статьи</a>

    {else}

<h1>Статьи</h1>



    {if $page_info.page_count!=0 && $page_info.page_count>1}
    <br/>
    <table>
        <tr>
            <td id="pager">Страница:
                {section name=pager loop={$page_info.page_count} start=0}
                    {if $smarty.section.pager.index==$cur_page}<b>{$smarty.section.pager.index+1}</b>{else}<a href="{$siteurl}?page={$page}&action={$action}&pager={$smarty.section.pager.index}" >{$smarty.section.pager.index+1}</a> {/if}
                {/section}
            </td>
        </tr>
    </table>
    <br/>
    {/if}

    {foreach from=$news_list_full item=news}
    <div style="font-weight: bold;">{$news.date|date_format:"%d.%m.%Y"}&nbsp;<span style="color: #faa61a;">{$news.title}</span></div>
    <div>{$news.short_text}</div>
        {if $news.full_text}<a href="{$siteurl}?page=news&action=view_news&id={$news.id}">подробнее...</a><br/>{/if}
    <br/>
    {/foreach}

    {if $page_info.page_count!=0 && $page_info.page_count>1}
    <br/>
    <table>
        <tr>
            <td id="pager">Страница:
                {section name=pager loop={$page_info.page_count} start=0}
                    {if $smarty.section.pager.index==$cur_page}<b>{$smarty.section.pager.index+1}</b>{else}<a href="{$siteurl}?page={$page}&action={$action}&pager={$smarty.section.pager.index}" >{$smarty.section.pager.index+1}</a> {/if}
                {/section}
            </td>
        </tr>
    </table>
    {/if}

{/if}