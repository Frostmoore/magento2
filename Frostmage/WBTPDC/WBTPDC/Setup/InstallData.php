<?php
/**
 * Copyright 2018 Ditta individuale See My Page di Riccardo Ronconi. 
 * All rights reserved. See COPYING.txt for license details.
 */

 namespace Frostmage\WBTPDC\Setup;
 
 use Magento\Framework\Setup\InstallDataInterface;
 use Magento\Framework\Setup\ModuleContextInterface;
 use Magento\Framework\Setup\ModuleDataSetupInterface;
 
 /**
 * @codeCoverageIgnore
 */
 class InstallData implements InstallDataInterface
 {
	 /**
	  * Eav setup factory
	  * @var EavSetupFactory
	  */
	 private $eavSetupFactory;
	 
	 /**
	  * Init
	  * @param EavSetupFactory $eavSetupFactory
	  */
	 public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
	 {
		 $this->eavSetupFactory = $eavSetupFactory;
	 }
	 
	 /**
	  * Bool: Ce l'ha il porco del vostro Dio?
	  * {@inheritdoc}
	  * @SuppressWarnings(PHPMD.CyclomaticComplexity)
	  * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
	  * @SuppressWarnings(PHPMD.NPathComplexity)
	  */
	 public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	 {
		 $eavSetup = $this->eavSetupFactory->create();
		 $eavSetup->addAttribute(
		 \Magento\Catalog\Model\Product::ENTITY,
		 'has_wbt',
			 [
				'group'                    => 'General',
				'type'                     => 'int',
				'label'                    => 'Has Weight Based Tax',
				'input'                    => 'boolean',
				'required'                 => false,
				'sort_order'               => 90,
				'global'                   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'is_used_in_grid'          => true,
				'is_visible_in_grid'       => true,
				'is_filterable_in_grid'    => true,
				'visible'                  => true,
				'is_html_allowed_on_front' => true,
				'visible_on_front'         => true
			 ]
		 );
	 }
 }
?>