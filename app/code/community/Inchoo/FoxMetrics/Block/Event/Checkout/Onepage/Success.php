<?php

/**
 * @category    Inchoo
 * @package     Inchoo_FoxMetrics
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Inchoo
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Inchoo_FoxMetrics_Block_Event_Checkout_Onepage_Success extends Mage_Core_Block_Template {

    protected function _construct() {
        parent::_construct();
        $this->setTemplate('inchoo/foxmetrics/event/checkout/onepage/success.phtml');
    }

    public function getOrderInfo() {
        $lastOrderId = Mage::getSingleton('checkout/session')->getLastOrderId();

        $order = Mage::getSingleton('sales/order');
        $order->load($lastOrderId);

        if ($order && $order->getId()) {

            $billingAddress = $order->getBillingAddress();

            $orderInfo = array(
                'billing_city' => $billingAddress->getCity(),
                'billing_state' => $billingAddress->getRegion(),
                'billing_zip' => $billingAddress->getPostcode(),
                'qty' => $order->getTotalQtyOrdered(),
                'tax_total' => $order->getTaxAmount(),
                'shipping_total' => $order->getShippingAmount(),
                'subtotal' => $order->getSubtotal(),

            );

            $orderInfo['items'] = array();

            $orderedItems = $order->getAllItems();

            foreach($orderedItems as $item) {

                $product = Mage::getModel('catalog/product')
                                ->load($item->getProductId());

                $categories = $product->getCategoryIds();
                $category = Mage::getModel('catalog/category')
                                ->load($categories[0]);

                $orderInfo['items'][] = new Varien_Object(array(
                    'id' => $item->getProductId(),
                    'name' => $item->getName(),
                    'category_name' => $category->getName(),
                    'qty' => $item->getQtyOrdered(),
                    'price' => $item->getPrice(),
                    'order_id' => $order->getId(),
                ));

                unset($product, $category);
            }

            return new Varien_Object($orderInfo);
        }

        return null;
    }

}
