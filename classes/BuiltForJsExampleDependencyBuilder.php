<?php

use PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder;

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';

class BuiltForJsExampleDependencyBuilder extends BuiltForJsExampleBasicHelper
{
    public function processDependency(): bool
    {
        $moduleName = Tools::getValue('module');

        $module = Module::getInstanceByName($moduleName);

        if (!$module) {
            $m = "Module '$moduleName/$moduleName.php' not found in files list. Upload and install it manually";
            throw new BuiltForJsExampleException($m);
        }

        $moduleManagerBuilder = ModuleManagerBuilder::getInstance();
        $moduleManager = $moduleManagerBuilder->build();

        if (!$moduleManager->isInstalled($moduleName)) {
            if (!$moduleManager->install($moduleName)) {
                $m = "Failed to install module '$moduleName'. Try to install it manually";
                throw new BuiltForJsExampleException($m);
            }
        }

        if (!$moduleManager->isEnabled($moduleName)) {
            if (!$moduleManager->enable($moduleName)) {
                $m = "Failed to enable module '$moduleName'. Try to enable it manually";
                throw new BuiltForJsExampleException($m);
            }
        }

        return true;
    }

    public function areDependenciesMet(): bool
    {
        $moduleNames = [
            'ps_mbo',
            'ps_accounts',
            'ps_eventbus',
        ];

        $res = true;

        foreach ($moduleNames as $moduleName) {
            $res = $this->isDependencyMet($moduleName);
            if (!$res) {
                return false;
            }
        }

        return $res;
    }

    protected function isDependencyMet($moduleName): bool
    {
        $moduleManagerBuilder = ModuleManagerBuilder::getInstance();
        $moduleManager = $moduleManagerBuilder->build();

        return $moduleManager->isInstalled($moduleName) && $moduleManager->isEnabled($moduleName);
    }
}
