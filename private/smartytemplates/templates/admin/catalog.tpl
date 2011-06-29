<h1>Каталог</h1>

{if $action=='add_rubric'}


{else}

    {if $rubric_list} 

        <table>
            {foreach from=$rubric_list item=rubric}
                <tr>
                    <td>{$rubric.title}</td>
                    <td><a href="?page={$page}&action=edit_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}">редактировать</a><br /><a href="?page={$page}&action=del_rubric&id={$rubric->getId()}&rubric={$cur_rubric->getId()}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}

<a href="?page={$page}&action=add_rubric&rubric={$cur_rubric->getId()}">добавить</a>   

{/if}
