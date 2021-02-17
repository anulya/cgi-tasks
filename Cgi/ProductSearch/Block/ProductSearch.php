<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      ProductSearch
 * @brief       ProductSearch Block
 * @date        02/17/21
 * @description ProductSearch Block
 * @license     http://www.cgi.com/ CGI
 * @link        \Cgi\CustomerName\Block\Index\Index
 */

namespace Cgi\ProductSearch\Block;

/**
 * Class ProductSearch
 *
 * @package Cgi\ProductSearch\Block
 */
class ProductSearch extends \Magento\Framework\View\Element\Template
{

    /**
     * @var $productCollectionFactory
     */
    protected $productCollectionFactory;

    /**
     * ProductSearch constructor
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param  $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }


    /**
     * Get Product Collection
     */
    public function getProductCollection()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
}

?>
