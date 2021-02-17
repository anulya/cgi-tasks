<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      ProductSearch
 * @brief       ProductSearch Controller
 * @date        02/17/21
 * @description ProductSearch Controller
 * @license     http://www.cgi.com/ CGI
 * @link        \Cgi\ProductSearch\Controller\Index\Index
 */

namespace Cgi\ProductSearch\Controller\Index;

/**
 * Class Index
 * @package Cgi\ProductSearch\Controller
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var $resultPageFactory
     */
    protected $resultPageFactory;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}

?>
