<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';
require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/install/BuiltForJsExampleTabHelper.php';
require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/install/BuiltForJsExampleInstallHookHelper.php';

class BuiltForJsExampleInstallHelper extends BuiltForJsExampleBasicHelper
{
    public function install(): bool
    {
        $this->setAllShopsContext();

        $res = true;

        return $res;
    }

    public function uninstall(): bool
    {
        $this->setAllShopsContext();

        $res = true;

        return $res;
    }

    public function enable()
    {
        $this->setAllShopsContext();

        $res = true;

        $hookHelper = new BuiltForJsExampleInstallHookHelper($this->module);
        $res &= $hookHelper->installHooks();

        $tabHelper = new BuiltForJsExampleTabHelper($this->module);
        $res &= $tabHelper->installTabs();

        return $res;
    }

    public function disable()
    {
        $this->setAllShopsContext();

        $res = true;

        $hookHelper = new BuiltForJsExampleInstallHookHelper($this->module);
        $res &= $hookHelper->uninstallHooks();

        $tabHelper = new BuiltForJsExampleTabHelper($this->module);
        $res &= $tabHelper->uninstallTabs();

        return $res;
    }

    public function setAllShopsContext()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
    }
}
