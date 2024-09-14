<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';

class BuiltForJsExampleDependencyBuilder extends BuiltForJsExampleBasicHelper
{
    public function processDependency()
    {
        $moduleName = Tools::getValue('module');

        throw new BuiltForJsExampleException('Could not do it!');
    }
}
