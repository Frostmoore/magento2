<?php

namespace Frostmage\WBTPDC\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\DataObject;

class Customcartblock extends DataObject implements ArgumentInterface
{
	
	public function __construct(\Magento\Checkout\Model\Cart $cart)
	{
		$this->cart = $cart;
	}
	
    public function getSomeThing()
    {
		$giggio = 0;
		$yappa = 'Di cui Eco Contributo: ';
		$formula = 0;
		foreach ($this->cart->getQuote()->getAllItems() as $item)
		{
			if($item->getProduct()->getData('has_wbt'))
			{
				
				$wbtweight = $item->getData('weight');
				$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
				$wbtvalue = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('wbtpdc/modifier/variable');
				
				$giggio = $wbtweight * $wbtvalue;
				
				$formula += ($item->getQty() * $giggio) - $item->getBaseDiscountAmount();
			}
			
			
			
			
		}
		
        return $yappa . $formula . '€';
    }
}