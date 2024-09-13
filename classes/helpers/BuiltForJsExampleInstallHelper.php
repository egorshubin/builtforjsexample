<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';
require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleTabHelper.php';

class BuiltForJsExampleInstallHelper extends BuiltForJsExampleBasicHelper
{
    public function enable()
    {
        $this->setAllShopsContext();

        $tabHelper = new BuiltForJsExampleTabHelper($this->module);

        return $tabHelper->installTabs();
    }

    public function disable()
    {
        $this->setAllShopsContext();

        $tabHelper = new BuiltForJsExampleTabHelper($this->module);

        return $tabHelper->uninstallTabs();
    }

    public function setAllShopsContext()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
    }
}
