<?php

/**
 * @category    Inchoo
 * @package     Inchoo_FoxMetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_FoxMetrics_Block_Base_Script extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/foxmetrics/base/script.phtml');
    }

    protected function _toHtml() {
        if (!$this->helper('inchoo_foxmetrics')->isModuleOutputEnabled()) {
            return '';
        }
        return parent::_toHtml();
    }

}