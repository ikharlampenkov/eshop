<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
        <meta name="DESCRIPTION" content="{$description}"></meta>
        <meta name="keywords" content="{$keywords}"></meta>
        <meta name="author-corporate" content=""></meta>
        <meta name="publisher-email" content=""></meta>

        <style >
            input {
    width: 99%;
            }

            textarea {
    width: 99%;
    height: 200px;
            }

            #save {
    width: 100px;
            }


        </style>

        <title>{$title}</title>

    </head>
    <body>
        {include file="error_msg.tpl"}

        {if $login==false}

            <table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td valign="middle" align="center">

                        <table height="100" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="300">

                                    <div style="text-align:center; vertical-align:middle;">
                                        <div style="border:1px solid black; width:250px; height:100px; padding:10px; text-align:left;">
                                        {if isset($login_fail)}<div style="color:red; font-weight:bold; font-size:12px;">Вы ввели неправильный логин и пароль!</div>{/if}
                                        <form method="post" style="margin:0px; padding:0px;">
                                            <div><span style="width:70px">Логин: </span><input name="login" type="text" style="width:150px;"></div>
                                            <div><span style="width:70px">Пароль: </span><input name="psw" type="password" style="width:150px;"></div>
                                            <div><input type="submit" value="Войти" style="width:70px;"></div>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
        </table>

    {else}

    {/if}    

</body>
</html>