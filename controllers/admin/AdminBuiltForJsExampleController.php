<?php

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
            exit(json_encode($this->module->dependencyBuilder->processDependency()));
        } catch (Exception $exception) {
            $this->module->eHelper->throwError($exception);
        }
    }
}
