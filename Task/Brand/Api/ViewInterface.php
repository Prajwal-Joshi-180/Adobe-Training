<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Task\Brand\Api;

/**
 * @api
 * @since 100.0.2
 */
interface ViewInterface
{
    /**
     * Return brand[]
     *
     * @return array[]
     */
    public function getAllBrand();
    /**
     * Return url
     *
     * @return string
     */
    public function getFormUrl();
    /**
     * Return url
     *
     * @return string
     */
    public function getAddUrl();
    /**
     * Return url
     *
     * @return string
     */
    public function getDeleteUrl();
    /**
     * Return url
     *
     * @return string
     */
    public function getEditUrl();
    /**
     * Return url
     *
     * @return string
     */
    public function getViewUrl();
    /**
     * Return brand
     *
     * @return string
     */
    public function getBrand();
}
