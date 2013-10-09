<?php

/**
 * @category    Inchoo
 * @package     Inchoo_FoxMetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_FoxMetrics_Block_Event_Catalog_Product_View extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/foxmetrics/event/catalog/product/view.phtml');
    }

    public function getCurrentProduct() {
        return Mage::registry('current_product');
    }

    public function getProduct() {
        $product = $this->getCurrentProduct();

        $categories = $product->getCategoryIds();

        return new Varien_Object(array(
            'id' => $product->getId(),
            'name' => $product->getName(),
            'category_name' => Mage::getModel('catalog/category')->load($categories[0])->getName(),
        ));
    }

}
