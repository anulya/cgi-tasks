<?php

namespace Cgi\ProductSearch\Block;

/**
 * Class ProductSearch
 * @package Cgi\ProductSearch\Block
 */
class ProductSearch extends \Magento\Framework\View\Element\Template
{

    /**
     * @var $_productCollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * ProductSearch constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }
}

?>
