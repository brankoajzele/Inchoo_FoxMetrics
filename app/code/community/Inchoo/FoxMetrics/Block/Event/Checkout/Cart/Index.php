<?php

/**
 * @category    Inchoo
 * @package     Inchoo_FoxMetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_FoxMetrics_Block_Event_Checkout_Cart_Index extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/foxmetrics/event/checkout/cart/index.phtml');
    }

    public function getProductToShoppingCart() {
        if (($product = Mage::getModel('core/session')->getProductToShoppingCart())) {
            Mage::getModel('core/session')->unsProductToShoppingCart();
            return $product;
        }

        return null;
    }

}
