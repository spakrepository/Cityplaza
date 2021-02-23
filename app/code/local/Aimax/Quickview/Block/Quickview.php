<?php
class Aimax_Quickview_Block_Quickview extends Mage_Core_Block_Template{
	public function _prepareLayout(){
		$this->getLayout()->getBlock('head')->addCss('quickview/quick.css');
		return parent::_prepareLayout();
	}
}
?>
