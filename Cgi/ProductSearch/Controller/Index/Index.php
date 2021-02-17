<?php

namespace Cgi\ProductSearch\Controller\Index;

/**
 * Class Index
 * @package Cgi\ProductSearch\Controller
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var $_resultPageFactory
     */
    protected $_resultPageFactory;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}

?>
