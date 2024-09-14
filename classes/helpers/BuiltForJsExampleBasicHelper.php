<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/BuiltForJsExampleException.php';

class BuiltForJsExampleBasicHelper
{
    public $module;

    public function __construct($module)
    {
        $this->module = $module;
    }
}
