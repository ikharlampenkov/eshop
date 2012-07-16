{include file="share/head.tpl"}

{if isset($page) && !empty($page)}
{include file="customer/$page.tpl"}
    {else}
    {if $bannerList}
    <div id="myCarousel" class="carousel slide">
        <!-- Carousel items -->
        <div class="carousel-inner">

            {foreach from=$bannerList item=banner name=_banner}
                <div class="{if $smarty.foreach._banner.first}active{/if} item">
                    <a href="http://{$banner->link}" title="">
                        {if $banner->img->getName()}
                            <img src="/files/{$banner->img->getName()}" alt="{$banner->title}"/>{else}&nbsp;{/if}
                    </a>

                    <div class="carousel-caption">
                        <h4>{$banner->title}</h4>
                    </div>
                </div>
            {/foreach}

        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    {/if}
{/if}

{include file="share/foot.tpl"}