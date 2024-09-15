<?php

class AdminBuiltForJsExampleHelpController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;

        parent::__construct();
    }

    public function initContent()
    {
        $this->content .= $this->module->displayNav('help');
        $this->content .= $this->module->displayHelp();

        parent::initContent();
    }
}
