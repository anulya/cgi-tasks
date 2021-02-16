<?php
/**
 * @copyright   © CGI, All rights reserved.
 * @namespace   Cgi
 * @module      Catalog
 * @brief       Adding Custom Product Attributes
 * @author      Anulya Bogolu
 * @email       anulya.reddy@gmail.com
 * @date        02/11/2021
 * @description Adding custom product attributes
 */

namespace Cgi\Catalog\Setup;


use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * @var \Magento\Eav\Setup\EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * constructor.
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory; 
    }

    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if(!$eavSetup->getAttributeId(\Magento\Catalog\Model\Product::ENTITY, 'isbn')) {
            //Create the attribute
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'isbn_number', 
                [
                    'type' => 'int',
                    'label' => 'ISBN',
                    'input' => 'int',
                    'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'searchable' => true,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true
                ]
            );

        $entityTypeId = $eavSetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
        $attributeSetIds = $eavSetup->getAllAttributeSetIds($entityTypeId);
        foreach ($attributeSetIds as $attributeSetId) {
            $groupId = $eavSetup->getAttributeGroupId($entityTypeId, $attributeSetId, "Books");
            $eavSetup->addAttributeToGroup(
                $entityTypeId,
                $attributeSetId,
                $groupId,
                'isbn_number',
                null
            );
        }
        }
    }
}