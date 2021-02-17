<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      Catalog
 * @brief       Install Data
 * @date        02/17/21
 * @description Catalog module Install Data
 * @license     http://www.cgi.com/ CGI
 * @link        Catalog
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
    private $_eavSetupFactory;

    /**
     * constructor.
     * @param \Magento\Eav\Setup\EavSetupFactory $_eavSetupFactory
     */
    public function __construct(EavSetupFactory $_eavSetupFactory)
    {
        $this->_eavSetupFactory = $_eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return NUll
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
        if (!$eavSetup->getAttributeId(\Magento\Catalog\Model\Product::ENTITY, 'isbn')) {
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
