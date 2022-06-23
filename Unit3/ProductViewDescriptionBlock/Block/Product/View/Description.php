<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\ProductViewDescriptionBlock\Block\Product\View;

/**
 * Class Description
 *  Description extends \Magento\Framework\View\Element\Template
 */
class Description extends \Magento\Framework\View\Element\Template
{
    /**
     *  * parama $description
     *
     * @param \Magento\Catalog\Block\Product\View\Description $description
     */
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
    {
        $description->setTemplate('Unit3_ProductViewDescriptionBlock::description.phtml');
    }
}
