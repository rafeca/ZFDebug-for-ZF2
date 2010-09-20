<?php
/**
 * ZFDebug Zend Application Resource
 *
 * @uses        \Zend\Application\Resource\ResourceAbstract
 * @category    ZFDebug
 * @package     ZFDebug_Resource
 * @author      Rafael de Oleza <rafeca@gmail.com>
 */

namespace ZFDebug\Application\Resource;

use Zend\Application\Resource\AbstractResource;

/**
 * This class provides a resource for the ZFDebug plugin
 *
 * @uses        \Zend\Application\Resource\ResourceAbstract
 * @category    ZFDebug
 * @package     ZFDebug_Resource
 * @author      Rafael de Oleza <rafeca@gmail.com>
 *
 */
class ZFDebug extends AbstractResource
{
    /**
     * @var boolean
     */
    protected $_init = false;

    /**
     * Defined by \Zend\Application\Resource\AbstractResource
     */
    public function init()
    {
        $this->initDebugPlugin();
    }

    /**
     * Initialize ZFDebug plugin
     */
    public function initDebugPlugin()
    {
        // plugin options
        $options = $this->getOptions();

        if (!$this->_init && (bool)$options['debug'] === true) {

            // Setup autoloader with namespace
            if(isset($options['autoload']) && $options['autoload']) {
                $this->getBootstrap()->getApplication()->getAutoloader()->registerNamespace('ZFDebug');
            }

            // bootstrap database
            if ($this->getBootstrap()->hasPluginResource('db')) {
                $this->getBootstrap()->bootstrap('db');
                $db = $this->getBootstrap()->getPluginResource('db')->getDbAdapter();
                $options['plugins']['Database']['adapter'] = $db;
            }

            // normalize base_path with realpath
            if (isset($options['plugins']['File']['base_path'])) {
                $options['plugins']['File']['base_path'] = realpath(
                    $options['plugins']['File']['base_path']
                );
            }

            // Setup the cache plugin
            if ($this->getBootstrap()->hasPluginResource('cachemanager')) {
                $this->getBootstrap()->bootstrap('cachemanager');
                $cache = $this->getBootstrap()->getResource('cachemanager')->getCache('local');
                $options['plugins']['Cache']['backend'] = $cache->getBackend();
            }

            // instantiate plugin && add plugin to front controller
            $this->getBootstrap()->bootstrap('frontController');

            $debug = new \ZFDebug\Controller\Plugin\Debug($options);
            $frontController = $this->getBootstrap()->getResource('frontController');
            $frontController->registerPlugin($debug);
        }
    }
}