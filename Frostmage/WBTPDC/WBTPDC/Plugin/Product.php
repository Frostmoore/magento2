<?php

namespace Frostmage\WBTPDC\Plugin;

class Product
{
	
	
	public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
	{
		
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$wbtvalue = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('wbtpdc/modifier/variable');
		
		
		if($subject->hasData('has_wbt'))
		{
			if($subject->hasData('weight'))
			{
				$weight = $subject->getData('weight');
				$wbtTotal = $weight * $wbtvalue;
				return $result + $wbtTotal;
			}
		}
		
		return $result;
	}
	
	
}