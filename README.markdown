# ZFDebug for Zend Framework 2

Fork of [Joakim Nygård](http://jokke.dk/)'s [ZFDebug bar](http://code.google.com/p/zfdebug/) that enables the integration
with Zend Framework 2.0

Currently it is based on an experimental version of ZFDebug 1.6, grabbed from its SVN
repository (revision 154 of the trunk).

Most work done it's related to namespace additions. There has also been added an Application
Resource, to make it easier to initialse ZFDebug from the application.ini config file.

## Installation instructions

Place the folder 'ZFDebug' in the library path of your Zend Framework Project
(or in another folder configured in the PHP include_path).

To initialize ZFDebug using its application resource, first add the following line into your application.ini:

    pluginPaths.ZFDebug\Application\Resource = "ZFDebug/Application/Resource"

Then you can configure ZFDebug directly from your 'application.ini'. Enter the following
lines within the environment where you want to display the ZFDebug bar (normally development):

    ; ZFDebug initialization
    resources.zfdebug.autoload          = true
    resources.zfdebug.debug             = true
    resources.zfdebug.jquery_path       = "/js/jquery.min.js"

    ; ZFDebug plugins to load
    resources.zfdebug.plugins.Auth.user = username
    resources.zfdebug.plugins.Auth.role = role
    resources.zfdebug.plugins.Cache     = null
    resources.zfdebug.plugins.Exception = null
    resources.zfdebug.plugins.File[]    = APPLICATION_PATH "/../"
    resources.zfdebug.plugins.Html      = null
    resources.zfdebug.plugins.Log       = null
    resources.zfdebug.plugins.Memory    = null
    resources.zfdebug.plugins.Time      = null
    resources.zfdebug.plugins.Variables = null


You can find more information about those params and more resources regarding the
installation in the official [ZFDebug page](http://code.google.com/p/zfdebug/wiki/Installation)

