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

                    <table border="1" width="100%">
                        <tr>
                            <td colspan="2">

                                <div>{$conpage.content}</div>

                            </td>
                        </tr>
                        <tr>
                            <td>

                                {if $path}
                                    <div>
                                        {foreach from=$path item=prub name=_prub}
                                            <a href="?page={$page}&rubric={$prub->getId()}">{if !$prub->isRoot}{$prub->title}{else}..{/if}</a> {if !$smarty.foreach._prub.last}/{/if}
                                        {/foreach}
                                    </div>
                                {/if}

                                {if !$cur_rubric->isRoot}
                                    <h3>{$cur_rubric->title}</h3>
                                {/if}

                                {if $rubric_list}

                                    <table>
                                        {foreach from=$rubric_list item=rubric}
                                            <tr>
                                                <td><a href="?page={$page}&rubric={$rubric->getId()}">{$rubric->title}</a></td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                {/if}

                                <hr/>

                                <h4>Товары</h4>

                                {if $product_list}

                                    <table>
                                        {foreach from=$product_list item=product}
                                            <tr>
                                                <td>{if $product->img->getName()}<img src="/files/{$product->img->getPreview()}" />{else}&nbsp;{/if}</td>
                                                <td>{$product->title}</td>
                                                <td>{$product->shortText}</td>
                                                <td>{$product->price}</td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                {/if}


                            </td>
                            <td width="230">
                                <div>Корзина</div>


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