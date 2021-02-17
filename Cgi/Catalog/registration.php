<?php

/**
 * PHP version 7.3.7

 * @category    Module
 * @package     Cgi
 * @author      Anulya <anulya.reddy@gmail.com>
 * @copyright   2021 © Cgi, All rights reserved.
 * @namespace   Cgi
 * @module      Catalog
 * @brief       Overriding Catalog manage products block
 * @date        02/17/21
 * @description Catalog module Registration
 * @license     http://www.cgi.com/ CGI
 * @link        Catalog
 */

use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Cgi_Catalog', __DIR__);
