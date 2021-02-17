<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      ProductSearch
 * @brief       ProductSearch Plugin
 * @date        02/17/21
 * @description ProductSearch Plugin
 * @license     http://www.cgi.com/ CGI
 * @link        ComponentRegistrar\
 */

namespace Cgi\ProductSearch\Plugin;

use Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection;

/**
 * Class BeforeFacetResults
 */
class BeforeFacetResults
{
    /**
     * Add custom conditions before get faceted data
     *
     * @param Collection $productCollection
     * @param string     $field
     * @return array
     */
    public function beforeGetFacetedData(Collection $productCollection, $field): array
    {
        //Custom Conditions on Product Collection
        $productCollection->addFieldToFilter('isbn_number', $field);

        return [$field];
    }
}
