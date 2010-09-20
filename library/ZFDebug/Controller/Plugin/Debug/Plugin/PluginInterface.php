<?php
/**
 * ZFDebug Zend Additions
 *
 * @category   ZFDebug
 * @package    ZFDebug_Controller
 * @subpackage Plugins
 * @copyright  Copyright (c) 2008-2009 ZF Debug Bar Team (http://code.google.com/p/zfdebug)
 * @license    http://code.google.com/p/zfdebug/wiki/License     New BSD License
 * @version    $Id: Interface.php 109 2009-09-21 20:56:13Z gugakfugl $
 */

namespace ZFDebug\Controller\Plugin\Debug\Plugin;


/**
 * @category   ZFDebug
 * @package    ZFDebug_Controller
 * @subpackage Plugins
 * @copyright  Copyright (c) 2008-2009 ZF Debug Bar Team (http://code.google.com/p/zfdebug)
 * @license    http://code.google.com/p/zfdebug/wiki/License     New BSD License
 */
interface PluginInterface
{
    /**
     * Has to return html code for the menu tab
     *
     * @return string
     */
    public function getTab();

    /**
     * Has to return html code for the content panel
     *
     * @return string
     */
    public function getPanel();

    /**
     * Has to return a unique identifier for the specific plugin
     *
     * @return string
     */
    public function getIdentifier();
    
    
    /**
     * Return the path to an icon
     *
     * @return string
     */
    public function getIconData();
}