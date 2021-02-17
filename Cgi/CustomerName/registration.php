<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      CustomerName
 * @brief       CustomerName Registration
 * @date        02/17/21
 * @description Catalog module Install Data
 * @license     http://www.cgi.com/ CGI
 * @link        \Cgi\CustomerName\Plugin\Magento\Customer\CustomerData\Customer
 */

use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Cgi_CustomerName', __DIR__);
