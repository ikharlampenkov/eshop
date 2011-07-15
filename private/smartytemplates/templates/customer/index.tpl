<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8"></meta>
        <meta name="DESCRIPTION" content="{$description}"></meta>
        <meta name="keywords" content="{$keywords}"></meta>
        <meta name="author-corporate" content=""></meta>
        <meta name="publisher-email" content=""></meta>

        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="/css/user.css" />

        <script type="text/javascript" language="javascript" src="/js/jquery.min.js" ></script>
        <script type="text/javascript" language="javascript" src="/js/jquery-ui.min.js" ></script>
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
                            <td style="font-size:26px; color: white;padding-left: 25px;" valign="middle">eSHOP - панель для покупателя</td>
                            <td width="300" valign="middle" style="color:white">

                                Пользователь: {$user} &nbsp; / &nbsp; <a href="{$siteurl}?logout" style="color:black">Выйти</a>

                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
            <tr>
                <td valign="top" height="150">

                    <table width="100%" height="150" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td style="padding: 10px;"> <div>{$conpage.content|nl2br}</div> </td>
                        </tr>
                    </table>


                </td>
            </tr>
            {*end up*}
            {*middle*}
            <tr>
                <td>

                    <table border="0" width="100%">
                        <tr>
                            <td>

                                {if $path}
                                    <div class="ttovar">
                                        {foreach from=$path item=prub name=_prub}
                                            <a href="?page={$page}&rubric={$prub->getId()}">{if !$prub->isRoot}{$prub->title}{else}<< Назад{/if}</a> {if !$smarty.foreach._prub.last}/{/if}
                                        {/foreach}
                                    </div>
                                {/if}

                                {if !$cur_rubric->isRoot}
                                    <h1>{$cur_rubric->title}</h1>
                                {/if}

                                {if $rubric_list}
								<table width="100%">
                                    {foreach from=$rubric_list item=rubric}
                                        <tr><td class="ttovar"><a href="?page={$page}&rubric={$rubric->getId()}">{$rubric->title}</a></td></tr>
                                    {/foreach}
								</table>
                                {/if}

                                {if $product_list}

                                    <table width="100%">
                                        {foreach from=$product_list item=product}
                                            <tr>
                                                <td width="110" class="ttovar" >{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                                                <td class="ttovar"><div>{$product->title}</div>
                                                    <div>{$product->shortText} <a href="#" id="productshowlink_{$product->id}" onclick="showInfo({$product->id})">подробнее...</a> </div>
                                                    <div id="productinfo_{$product->id}" style="display:none;">{$product->fullText|nl2br}</div>
                                                    <div><b>Цена</b> {$product->price}</div>
                                                </td>
                                                <td class="ttovar" ><input type="text" id="product_{$product->id}" name="product_{$product->id}" value=""/> <button onclick="addToChart({$product->id})">Заказать</button></td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                {/if}


                            </td>
                            <td width="230" class="tedit2" >
                                <h1>Корзина</h1>

                                <div id="chart_content">{include file="customer/chart.tpl"} </div>

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