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
}
