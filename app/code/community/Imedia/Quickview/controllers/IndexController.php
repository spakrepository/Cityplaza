<?php
class Imedia_Quickview_IndexController extends Mage_Core_Controller_Front_Action{

	public function indexAction(){

		//echo 'hello'; exit;
		//echo $this->getLayout()->createBlock('core/template')->setTemplate('imedia/quickview/view.phtml')->toHtml();
		//echo $this->getLayout()->createBlock('core/template')->setTemplate('catalog/product/view.phtml')->toHtml();
		$id = $this->getRequest()->getParam('id');
		//echo $id.'<br>';

		$product = Mage::getModel('catalog/product')->load($id);

		Mage::register('product', $product);
		Mage::register('current_product', $product);
//echo $product->getId(); exit;
		//$product = Mage::helper('catalog/product')->initProduct($product->getId(), $this);
		$this->getLayout()->getUpdate()->addHandle(array(
    		'default',
    		'catalog_product_view',
    		'PRODUCT_TYPE_' . $product->getTypeId(),
    		'PRODUCT_' . $product->getId()
		));
		Mage::dispatchEvent('catalog_controller_product_view', array('product' => $product));

		Mage::getSingleton('catalog/session')->setLastViewedProductId($product->getId());

		$this->loadLayout();

		$this->getLayout()->removeOutputBlock('root')->addOutputBlock('content');

		$this->renderLayout();

	}
}
?>