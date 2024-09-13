<?php

use PrestaShop\PrestaShop\Adapter\SymfonyContainer;

require_once _PS_MODULE_DIR_ . 'builtforjsexample/classes/helpers/BuiltForJsExampleBasicHelper.php';

class BuiltForJsExampleTabHelper extends BuiltForJsExampleBasicHelper
{
    public function installTabs()
    {
        $res = true;

        $res &= $this->installOneTab('Prestashop Integration Framework Module', 'AdminBuiltForJsExample');

        return $res;
    }

    public function uninstallTabs()
    {
        $res = true;

        $res &= $this->uninstallOneTab('AdminBuiltForJsExample');

        return $res;
    }

    public function installOneTab($name, $className, $isActive = 0)
    {
        $tab = new Tab();
        $tab->name = array();

        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $name;
        }
        $tab->class_name = $className;
        $tab->module = $this->module->name;
        $tab->active = $isActive;
        if ($isActive) {
            $tabRepository = SymfonyContainer::getInstance()->get('prestashop.core.admin.tab.repository');
            $tab->id_parent = $tabRepository->findOneIdByClassName('Improve');
        }

        return $tab->add();
    }

    public function uninstallOneTab($className)
    {
        $res = true;

        $tabRepository = SymfonyContainer::getInstance()->get('prestashop.core.admin.tab.repository');

        while (true) {
            $idtab = $tabRepository->findOneIdByClassName($className);

            if (!$idtab) {
                break;
            }

            try {
                $tab = new Tab((int) $idtab);
                $res &= $tab->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        return $res;
    }
}
