<?php

/**
 * @category    Inchoo
 * @package     Inchoo_FoxMetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_FoxMetrics_Helper_Data extends Mage_Core_Helper_Data
{

    const CONFIG_ACTIVE = 'inchoo_foxmetrics/settings/active';
    const CONFIG_BASE_SCRIPT = 'inchoo_foxmetrics/settings/base_script';

    public function isModuleEnabled($moduleName = null)
    {
        if (Mage::getStoreConfig(self::CONFIG_ACTIVE) == '0') {
            return false;
        }

        return parent::isModuleEnabled($moduleName = null);
    }

    public function getBaseScript($store = null)
    {
        return Mage::getStoreConfig(self::CONFIG_BASE_SCRIPT, $store);
    }

}