<?php
namespace Frostmage\WBTPDC\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
	
	
	public function __construct(
		\Magento\Framework\App\Helper\Context $context,
		\Magento\Catalog\Model\ProductRepository $productRepo
		)
	{
		$this->_productRepo = $productRepo;
		parent::__construct($context);
	}
	
	
    public function getConfig($config_path)
    {
        return $this->scopeConfig->getValue(
            $config_path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
	
}
