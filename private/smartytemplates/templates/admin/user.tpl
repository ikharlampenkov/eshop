<h1>Пользователи</h1>


{if $action=="add" || $action=="edit"}

    <h2>{$txt}</h2>

    <form action="?page={$page}&action={$action}{if $action=="edit"}&login={$user.login}{/if}" method="post">
        <table>
            <tr>
                <td width="200">Логин</td>
                <td><input name="data[login]" value="{$user.login}"  /></td>
            </tr>
            <tr>
                <td>Пароль</td>
                <td><input name="data[password]" value="{$user.password}" /></td>
            </tr>
            <tr>
                <td>Роль</td>
                <td><select name="data[role]" >
                        {foreach from=$role_list item=role}
                            <option value="{$role}" {if isset($user) && $user.role==$role}selected="selected"{/if}>{$role}</option>
                        {/foreach}
                    </select>
                </td>
            </tr>
        </table>
        <input id="save" name="save" type="submit" value="Сохранить" />
    </form>

{else}

    {if $user_list!==false}
        <table>
            {foreach from=$user_list item=user}
                <tr>
                    <td>{$user.login}</td>
                    <td>{$user.role}</td>
                    <td><a href="?page={$page}&action=edit&login={$user.login}">редактировать</a><br /><a href="?page={$page}&action=del&login={$reu.login}">удалить</a> </td>
                </tr>
            {/foreach}
        </table>
    {/if}

    <a href="?page={$page}&action=add">добавить</a>

{/if}