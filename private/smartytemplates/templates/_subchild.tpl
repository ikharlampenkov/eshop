<ul class="child">
{foreach from=$child item=rubric}
    <li><a href="?page=catalog&rubric={$rubric.info->getId()}">{$rubric.info->title}</a>
    {if $rubric.child}
    {include file="_subchild.tpl" child=$rubric.child}
    {/if}
    </li>
{/foreach}
</ul>