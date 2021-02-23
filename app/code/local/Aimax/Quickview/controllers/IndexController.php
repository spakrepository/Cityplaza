<?php
class Aimax_Quickview_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction()
    {
    	/*$this->getLayout()->getBlockSingleton('aimax/quickview')->addcss();*/
    	//echo 'hello'; exit;
    	$id = $this->getRequest()->getParam('productid');
		$product = Mage::getModel('catalog/product')->load($id);
		Mage::register('product', $product);
		Mage::register('current_product', $product);
		//$product = Mage::helper('catalog/product')->initProduct($product->getId(), $this);

		$this->getLayout()->getUpdate()->addHandle(array(
		    'default',
		    'quickview_index_index',
		    'PRODUCT_TYPE_' . $product->getTypeId(),
		    'PRODUCT_' . $product->getId()
		));
		Mage::dispatchEvent('catalog_controller_product_view', array('product' => $product));

		Mage::getSingleton('catalog/session')->setLastViewedProductId($product->getId());
		$this->loadLayout();
		$this->getLayout()->removeOutputBlock('root')->addOutputBlock('head')->addOutputBlock('content');
		$head = Mage::app()->getLayout()->getBlock('head');
    	$head->addItem('skin_css', 'quickview/quick.css');
		$this->renderLayout();
    }
}

