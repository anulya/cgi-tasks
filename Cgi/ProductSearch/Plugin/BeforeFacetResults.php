<?php

namespace Cgi\ProductSearch\Plugin;

use Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection;

/**
 * Class BeforeFacetResults
 * @package Cgi\ProductSearch\Plugin
 */
class BeforeFacetResults
{
    /**
     * Add custom condtions before get faceted data
     *
     * @param Collection $productCollection
     * @param string $field
     * @return array
     */
    public function beforeGetFacetedData(Collection $productCollection, $field): array
    {
        //Custom Conditions on Product Collection
        $productCollection->addFieldToFilter('isbn_number', $field);

        return [$field];
    }
}
