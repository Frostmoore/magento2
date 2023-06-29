<?php

namespace Frostmage\WBTPDC\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Frostmage\WBTPDC\Helper\Data;

class value extends Template
{
	
	public function sayHello()
	{
		return __('Porca madonna');
	}
	
	public function ciao()
	{
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$conf = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('wbtpdc/modifier/wbtpdc_value');
		return __($conf);
	}
}