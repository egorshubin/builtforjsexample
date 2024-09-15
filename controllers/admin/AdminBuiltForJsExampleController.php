<?php

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleErrorHelper.php';
require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/BuiltForJsExampleDependencyBuilder.php';

class AdminBuiltForJsExampleController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;

        parent::__construct();
    }

    public function initContent()
    {
        $this->content .= $this->module->displayContent();

        parent::initContent();
    }

    public function ajaxProcessProcessDependency()
    {
        try {
            $dependencyBuilder = new BuiltForJsExampleDependencyBuilder($this->module);
            exit(json_encode($dependencyBuilder->processDependency()));
        } catch (Exception $exception) {
            $eHelper = new BuiltForJsExampleErrorHelper($this->module);
            $eHelper->throwError($exception);
        }
    }
}
