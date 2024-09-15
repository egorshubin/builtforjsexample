<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';

class BuiltForJsExampleInstallHookHelper extends BuiltForJsExampleBasicHelper
{
    public function installHooks()
    {
        $res = true;

        $res &= $this->module->registerHook('displayBackOfficeHeader');

        return $res;
    }

    public function uninstallHooks()
    {
        $res = true;

        $res &= $this->module->unregisterHook('displayBackOfficeHeader');

        return $res;
    }
}
