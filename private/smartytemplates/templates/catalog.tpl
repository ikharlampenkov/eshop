{if $action=='good'}

    {if count($path)>1}
    <div class="nav_menu">
        {foreach from=$path item=prub name=_prub}
            {if !$prub->isRoot}
                <a href="?page={$page}&rubric={$prub->getId()}">{$prub->title}</a> /
            {/if}
        {/foreach}

        <a href="?page={$page}&rubric={$cur_rubric->getId()}">{$cur_rubric->title}</a>
    </div>
    {/if}

<table>
    <tr>
        <td width="150">
            {if $product->img->getName()}<img src="{$siteurl}files/{$product->img->getPreview()}"/>{/if}
        </td>
        <td>
            <h1>{$product->title}</h1>

            <p style='font-size: 14px;'>{$product->fullText|nl2br}</p>


            {if $productToneList !== false}
                <p style='font-size: 14px;'><b>Выберите тон:</b></p>
                {foreach from=$productToneList item=tone name=_tone}
                    {if $smarty.foreach._tone.first}
                        <div class="tone-big">
                            <ul id='tons'>
                                <li><img name='img_name' src='{$siteurl}files/{$tone->img->getName()}'></li>
                                <li>
                                    <div id='ton_text'><span>Тон: {$tone->title}</span></div>
                                </li>
                            </ul>
                        </div>
                    {/if}
                {/foreach}

                <p style='width: 31em; margin-top: 5px;'>
                    {foreach from=$productToneList item=tone name=_tone}
                        <img class='ton_input' id='ton_{$tone->id}' name='ton_{$tone->id}' onclick='f_ton({$tone->id})' pk_ton="{$tone->id}" text="Тон: {$tone->title}" src='{$siteurl}files/{$tone->img->getName()}'/>
                    {/foreach}
                </p>
            {/if}

            <p style='font-size: 14px;'><b> Цена:</b> {$product->price}</p>

            <p style="">
                <input type="text" id="product_{$product->id}" name="product_{$product->id}" value="" style="width: 50px;"/>
                <input type="hidden" id="tone" name="tone" value="{if $productToneList !== false}{$productToneList.0->id}{else}0{/if}"/>
                <button onclick="addToChartS({$product->id})"> Заказать</button>
            </p>
        </td>
    </tr>
</table>

    {else}

    {if count($path)>1}
    <div class="nav_menu">
        {foreach from=$path item=prub name=_prub}
            {if !$prub->isRoot}
                <a href="?page={$page}&rubric={$prub->getId()}">{$prub->title}</a> {if !$smarty.foreach._prub.last}/{/if}
            {/if}
        {/foreach}
    </div>
    {/if}

    {if !$cur_rubric->isRoot}
    <h1>{$cur_rubric->title}</h1>
    {/if}

<div class="rubric-block">
    {if $rubric_list}
        <ul class="tree">
            {foreach from=$rubric_list item=rubric}
                <li class="rubric"><a href="?page={$page}&rubric={$rubric->getId()}">{$rubric->title}</a></li>
            {/foreach}
        </ul>
    </div><br/>
    {/if}

    {if $product_list}

    <table>
    <tr>
        {foreach from=$product_list item=product name=_product}
            {if $smarty.foreach._product.index %2 == 0 && $smarty.foreach._product.index != 0}</tr><tr>{/if}

                <td>

                    <div class='prod_fieldset' style='margin: 0 12px 12px 0;'>
                        <table>
                            <tr>
                                <td rowspan=3 style='vertical-align: middle; height: 152px; width: 120px;'>{if $product->img->getName()}<img src='/files/{$product->img->getPreview()}' style='height: 150px; width: 105px;'/>{/if}</td>
                                <td style='color: #f68a2f; text-align: right; height: 24px;'></td>
                            </tr>
                            <tr>
                                <td style='font-size: 16px; height: 25px;'>
                                    <p>{$product->title}</p>

                                    <p style='font-size: 14px;'>{$product->shortText}</p>

                                    <p style='font-size: 14px;'><b> Цена:</b> {$product->price}</p>

                                    <p style=""><input type="text" id="product_{$product->id}" name="product_{$product->id}" value="" style="width: 50px;"/>
                                        <button onclick="addToChartS({$product->id})"> Заказать</button>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style='font-size: 14px; text-align: right; vertical-align: top; height: 24px;'>
                                    <a class='tov_podr' href='?page={$page}&action=good&id={$product->id}&rubric={$product->rubric->id}'>подробнее&nbsp;<span style='color: #fba61a; font-size: 0.5em;'>&gt;</span></a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </td>

        {/foreach}
    </tr>
    </table>

    {/if}
{/if}