<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit2\CustomNotFound\Controller;

/**
 * Class NoRouteHandler
 * Unit2\CustomNotFound\Controller
 */
class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * * process
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        if ($request->getFrontName() == 'admin') {
            return false;
        }

        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request
            ->setModuleName($moduleName)
            ->setControllerName($controllerName)
            ->setActionName($actionName);

        return true;
    }
}
