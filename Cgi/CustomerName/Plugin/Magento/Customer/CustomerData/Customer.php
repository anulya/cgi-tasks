<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      CustomerName
 * @brief       CustomerName Plugin
 * @date        02/17/21
 * @description CustomerName Plugin
 * @license     http://www.cgi.com/ CGI
 * @link        Catalog
 */

namespace Cgi\CustomerName\Plugin\Magento\Customer\CustomerData;

/**
 * Class Customer
 * @package Cgi\CustomerName\Plugin\Magento\Customer\CustomerData
 */
class Customer
{
    /**
     * @var \Magento\Customer\Model\Session\Proxy
     */
    private $_customerSession;

    /**
     * @var \Magento\Customer\Api\GroupRepositoryInterface
     */
    private $_groupRepository;

    /**
     * Customer constructor.
     * @param \Magento\Customer\Model\Session\Proxy $_customerSession
     * @param \Magento\Customer\Api\GroupRepositoryInterface $_groupRepository
     */
    public function __construct(
        \Magento\Customer\Model\Session\Proxy $_customerSession,
        \Magento\Customer\Api\GroupRepositoryInterface $_groupRepository
    )
    {
        $this->_customerSession = $_customerSession;
        $this->_groupRepository = $_groupRepository;
    }
    // phpcs:enable

    /**
     * @param \Magento\Customer\CustomerData\Customer $subject
     * @param $result
     * @return mixed
     */
    public function afterGetSectionData(\Magento\Customer\CustomerData\Customer $subject, $result)
    {
        $result['is_logged_in'] = $this->_customerSession->isLoggedIn();
        if ($this->_customerSession->isLoggedIn() && $this->_customerSession->getCustomerId()) {
            $customer = $this->_customerSession->getCustomer();
            $result['email'] = $customer->getEmail();
            $result['lastname'] = $customer->getLastname();
            $result['customer_group_id'] = $customer->getGroupId();
            $result['customer_group_name'] = $this->getGroupName($customer->getGroupId());
        }

        return $result;
    }

    /**
     * Get group name
     *
     * @param $groupId
     * @return \Magento\Framework\Phrase|string
     */
    public function getGroupName($groupId)
    {
        try {
            $group = $this->_groupRepository->getById($groupId);
            return $group->getCode();
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            return __("None");
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            return __("None");
        }
    }
}
