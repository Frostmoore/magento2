<?php
    /**
     * Frostmage WBTPDC CustomPrice Observer
     *
     * @category    Frostmage
     * @package     Frostmage_WBTPDC
     * @author      Ditta Individuale See My Page di Riccardo Ronconi
     *
     */
    namespace Frostmage\WBTPDC\Observer;
 
    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
	
	
 
    class CustomPrice implements ObserverInterface
    {		
		
        public function execute(\Magento\Framework\Event\Observer $observer) {

			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$wbtvalue = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue('wbtpdc/modifier/variable');
			
            $item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
			if ($item->getProduct()->getData('has_wbt')) {
				$wbtweight = $item->getData('weight') * $wbtvalue; //set your price here
				$price = $item->getProduct()->getData('price');
				$item->setCustomPrice($price + $wbtweight);
				$item->setOriginalCustomPrice($price + $wbtweight);
				$item->getProduct()->setIsSuperMode(true);
			}
        }
 
    }