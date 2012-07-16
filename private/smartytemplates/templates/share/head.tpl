<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta name="DESCRIPTION" content="{$description}"/>
    <meta name="keywords" content="{$keywords}"/>
    <meta name="author-corporate" content=""/>
    <meta name="publisher-email" content=""/>

    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>

    <script type="text/javascript" language="javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="/js/main.js"></script>

    <title>{$title}</title>
</head>
<body>

{include file="error_msg.tpl"}

<table>
    <tr>
        <td>&nbsp;</td>
        <td class="main-block">

            <table>
                <tr>
                    <td class="head-block">
                        <img src="{if $bannerTop !== false}/files/{$bannerTop->img->getName()}{else}/i/head.jpg{/if}" />
                    </td>
                </tr>
                <tr>
                    <td class="head-url"><a href="/">ТиандеМагазин.рф</a></td>
                </tr>
                <tr>
                    <td class="discont-block">

                        <table class="top-menu-table">
                            <tr>
                                <td>&nbsp;</td>
                                <td class="top-menu"><a href="?page=about">О магазине</a></td>
                                <td class="top-menu"><a href="?page=business">Бизнес</a></td>
                            {if $login==false}
                                <td class="top-menu"><a href="?page=discount">Получить 35% скидку</a></td>
                            {/if}
                                <td class="top-menu"><a href="?page=news">Статьи</a></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>

                        <table>
                            <tr>
                                <td class="sp-block">

                                    <table>
                                        <tr>
                                        {if $specList != false}
                                            {foreach from=$specList item=spec}
                                                <td class="sp-block-place">

                                                    <div class="container">

                                                        <div>

                                                            <div style="float: left; vertical-align: bottom; height: 152px; width: 120px; text-align: center; padding: 0; margin: 20px 0 0 0;">
                                                                {if $spec->img->getName()}<img src='/files/{$spec->img->getPreview()}' style='height: 150px; width: 105px;'>{/if}
                                                            </div>
                                                            <div style="float: right; width: 148px; text-align: left;">
                                                                <p>{$spec->title}</p>

                                                                <p style='font-size: 14px;'>{$spec->shortText}</p>

                                                                <p style='font-size: 14px;'><b>Цена:</b> {$spec->price}</p>

                                                                <div style="text-align: right; height: 20px; width: 148px; padding: 0; margin: 0">
                                                                    <a class='tov_podr' style="text-align: right" href='?page=catalog&action=good&id={$spec->id}&rubric={$spec->rubric->id}'> подробнее&nbsp;<span style='color: #fba61a; font-size: 10px;'>&gt;</span></a>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>

                                                </td>
                                            {/foreach}
                                        {/if}

                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td class="cat-block">

                                    <table>
                                        <tr>
                                            <td class="cat-tree-block">

                                            {if $rubric_tree}

                                                <ul class="tt-menu">
                                                    {if $rubric_tree}
                                                        {foreach from=$rubric_tree item=rubric}
                                                            <li><a href="?page=catalog&rubric={$rubric.info->getId()}">{$rubric.info->title}</a>
                                                                {if $rubric.child}
                                                                {include file="_subchild.tpl" child=$rubric.child}
                                                                {/if}
                                                            </li>
                                                        {/foreach}
                                                    {/if}
                                                </ul>
                                            {/if}

                                                <br/>

                                            {if isset($chart_list) || (isset($summ) && $summ!=0)}
                                                <h3>Корзина</h3>

                                                <div id="chart_content">{include file="chart.tpl"} </div>
                                            {/if}

                                            {if isset($orders_list)}
                                                <h1>Заказы</h1>

                                                {foreach from=$orders_list item=order}
                                                    <div {if $order->isComplite==0}class="ttovarred" {else}class="ttovar"{/if}>
                                                        <div>№ {$order->id} от {$order->date}</div>
                                                        <div>Сумма:{$order->getSumm()}</div>
                                                        <div>Скидка: {$order->discount}</div>
                                                        <div>Итого: {$order->getSummWithDiscount()}</div>
                                                    </div>
                                                    <br/>
                                                {/foreach}
                                            {/if}

                                                <br/>

                                                <div class="menu-phone">
                                                {if isset($user)}
                                                    <span class="user-info">
                                                                                Пользователь: {$user}&nbsp;/&nbsp;<a href="{$siteurl}?logout" style="color:black">Выйти</a>
                                                    </span><br/>
                                                {/if}
                                                {$contacts.content}
                                                </div>

                                            </td>
                                            <td class="cat-main-block">