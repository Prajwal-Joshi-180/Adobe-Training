<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

/**
 * Class BeforeBreadcrumbsPlugin
 * Unit1\Plugins\Plugin
 */
class BeforeBreadcrumbsPlugin
{
    /**
     * * beforeAddCrumb
     *
     * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
     * @param array $crumbName
     * @param array $crumbInfo
     * @return array
     */
    public function beforeAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, $crumbName, $crumbInfo)
    {
        $crumbInfo['label'] = $crumbInfo['label'].'(!b)';
        return [$crumbName, $crumbInfo];
    }
}
