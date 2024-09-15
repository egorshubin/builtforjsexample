<div class="productTabs">
    <div class="list-group">
        <ul class="nav nav-pills op_tabs">
            <li {if $active_url === 'main'}class="active"{/if}>
                <a href="{$main_url|escape:'htmlall':'UTF-8'}" class="list-group-item">
                    <i class="fa-solid fa-cloud-arrow-down"></i>&nbsp;
                    {l s='Configure' mod='builtforjsexample'}</a>
            </li>
            <li {if $active_url === 'help'}class="active"{/if}>
                <a href="{$help_url|escape:'htmlall':'UTF-8'}" class="list-group-item">
                    <i class="fa-solid fa-circle-info"></i>&nbsp;
                    {l s='Help' mod='builtforjsexample'}</a></li>
        </ul>
    </div>
</div>
