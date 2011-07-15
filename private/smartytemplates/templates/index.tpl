
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
        <meta name="DESCRIPTION" content="{$description}"></meta>
        <meta name="keywords" content="{$keywords}"></meta>
        <meta name="author-corporate" content=""></meta>
        <meta name="publisher-email" content=""></meta>

        <style >
			body {
				font-family:tahoma;
			}
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

            <table width="100%" height="100%" cellpadding="10" cellspacing="10" border="0">
                <tr>
                    <td valign="middle" align="center">

                        <table height="100" width="300" cellpadding="10" cellspacing="0" border="0" style="background-color:#69aefc">
                        <form method="post" style="margin:0px; padding:0px;">
                            <tr><td></td><td style="font-size:26px; color: white;padding-left: 25px;">eSHOP</td></tr>
                            <tr><td style="color:white">Логин: </td><td><input name="login" type="text" style="width:190px;border:10px;font-size: 16px;"></td></tr>
                            <tr><td style="color:white">Пароль:</td><td><input name="psw" type="password" style="width:190px;border:10px;font-size: 16px;"></td></tr>
                            <tr><td>&nbsp;</td><td><input type="submit" value="Войти" style="width:190px;font-size: 16px;"></td></tr>     
                            <tr><td></td><td>{if isset($login_fail)}<div style="color:white; font-weight:bold; font-size:12px;">Невервный логин и пароль.</div>{/if}</td></tr>
                                  
						</form>
                    </table>


                </td>
            </tr>
        </table>

    {else}

    {/if}    

</body>
</html>