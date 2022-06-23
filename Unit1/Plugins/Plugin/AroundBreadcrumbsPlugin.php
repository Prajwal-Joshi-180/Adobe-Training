<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

/**
 * Class AroundBreadcrumbsPlugin
 * Unit1\Plugins\Plugin
 */
class AroundBreadcrumbsPlugin
{
    /**
     * * aroundAddCrumb
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param callable $proceed
     * @param array $crumbName
     * @param array $crumbInfo
     */
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject,
        callable $proceed,
        $crumbName,
        $crumbInfo
    ) {
        $crumbInfo['label'] = $crumbInfo['label'].'(!a)';
        $proceed($crumbName, $crumbInfo);
    }
}
