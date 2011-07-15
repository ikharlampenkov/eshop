<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>

        <style type="text/css">
			h1 {

			font-size: 20px;
			font-weight: normal;
}

			body {
				font-family:tahoma;
			}
            tr {
   vertical-align: top;
            }

            input {
    width: 100%;
            }

            textarea {
    width: 100%;
    height: 200px;
            }

            #save {
    width: 100px;
            }

            .menu {
            	color: #69aefc;
            	font-weight: bold;
}
		.menu:hover {
			color: #69aefc;
            	font-weight: bold;
			text-decoration: none;
}
		.rmenu {
			color: #1465c0;
}
		.rmenu:hover {
			 #1465c0;
			text-decoration: none;
}

		.tedit {
			background-color:#ebf4ff; padding: 10px; width:100px;
}
		.tdel {
			background-color:#ebf4ff; padding: 10px; width:50px;
}
		a.tdel {
			color: #830000;
}
		a.tedit {
			color: #1465c0;
}
		.ttovar {
			background-color:#f7f7f7; padding: 10px;
}
		.ttovarred {
			background-color:#ffdede; padding: 10px;
}


a { color:#1465c0}
        </style>

        <script type="text/javascript" language="javascript" src="/js/jquery.min.js" ></script>
        <script type="text/javascript" language="javascript" src="/js/main.js" ></script>

        <title>{$title}</title>

    </head>
    <body>
        {include file="error_msg.tpl"}

        <table width="1000" height="100%" cellpadding="0" cellspacing="0" border="0" align="center">
            {*up*}
            <tr>
                <td valign="top" height="40">

                    <table width="100%" height="40" cellpadding="0" cellspacing="0" border="0" style="background-color:#69aefc">
                        <tr>
                            <td style="font-size:26px; color: white;padding-left: 25px;" valign="middle">eSHOP - административная панель управения</td>
                            <td width="300" valign="middle" style="color:white">

                                Пользователь: {$user} &nbsp; / &nbsp; <a href="{$siteurl}?logout" style="color:black">Выйти</a>

                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
            {*end up*}
            {*middle*}
            <tr>
                <td>

                    <table border="0" cellpadding="20" width="100%">
                        <tr>
                            <td width="230">

                            	<table border="0" cellpadding="10" cellspacing="10" width="100%" height="100%" style="background-color:#f0f0f0">
                            	<tr><td><h1>Меню:</h1></tr></td>
                                <tr><td><a href="?page=content_page" class="menu">О МАГАЗИНЕ</a></td></tr>
                                <tr><td><a href="?page=catalog" class="menu">КАТАЛОГ ТОВАРОВ</a></tr></td>
                                <tr><td><a href="?page=order" class="menu">ЗАКАЗЫ</a></tr></td>
                                <tr><td><a href="?page=user" class="menu">ПОЛЬЗОВАТЕЛИ</a></tr></td>
                                </table>

                            </td>
                            <td>

                                {if isset($page) && !empty($page)}
                                    {include file="admin/$page.tpl"}
                                {/if}

                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            {*end middle*}
            {*down*}
            <tr>
                <td height="40">&nbsp;</td>
            </tr>
            {*end down*}
        </table>



    </body>
</html>