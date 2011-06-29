<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
<meta name="DESCRIPTION" content="{$description}"></meta>
<meta name="keywords" content="{$keywords}"></meta>
<meta name="author-corporate" content=""></meta>
<meta name="publisher-email" content=""></meta>

<style type="text/css">
table {
    width: 100%;
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

</style>

<script type="text/javascript" language="javascript" src="/js/main.js" ></script>

<title>{$title}</title>

</head>
<body>
{include file="error_msg.tpl"}

<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
{*up*}
  <tr>
    <td valign="top" height="150">

        <table width="100%" height="150" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>Электронный магазин</td>
                <td width="300">

                    <div>{$user}</div> <a href="{$siteurl}?logout">Выйти</a>

                </td>
            </tr>
        </table>


    </td>
  </tr>
{*end up*}
{*middle*}
  <tr>
    <td>

        <table border="1" width="100">
            <tr>
                <td width="230">

                    <a href="?page=content_page">Контентная страница</a><br /><br />
                    <a href="?page=catalog">Товары</a><br /><br />
                    <a href="?page=user">Пользователи</a><br /><br />

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