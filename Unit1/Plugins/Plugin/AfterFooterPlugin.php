<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit1\Plugins\Plugin;

/**
 * Class AfterFooterPlugin
 * Unit1\Plugins\Plugin
 */
class AfterFooterPlugin
{
    /**
     * * afterGetCopyright
     *
     * @param \Magento\Theme\Block\Html\Footer $subject
     * @param string $result
     * @return string
     */
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return 'Customized copyright!';
    }
}
