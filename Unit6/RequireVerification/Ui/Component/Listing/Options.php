<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit6\RequireVerification\Ui\Component\Listing;

/**
 * Class Options
 * Otions implements \Magento\Framework\Data\OptionSourceInterface
 */
class Options implements \Magento\Framework\Data\OptionSourceInterface
{
    public const LISTING_OPTIONS = [
        ['label' => 'From Admin',    'value' => 0],
        ['label' => 'From Checkout', 'value' => 1]
    ];

    /**
     * * return array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->options = self::LISTING_OPTIONS;
    }
}
