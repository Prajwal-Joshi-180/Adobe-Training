<?php
/**
 * *
 *   * Copyright © Magento. All rights reserved.
 *   * See COPYING.txt for license details.
 *
 */
namespace Unit6\ComputerGames\Block\Adminhtml\Edit;

/**
 * Class GenericButton
 * Magento\Customer\Block\Adminhtml\Edit
 */
class GenericButton
{
    /**
     * * Magento\Framework\UrlInterface
     *
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * * Magento\Framework\Registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     *
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * Constructor
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Request\Http $request
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
        $this->request  = $request;
    }

    /**
     * Return the customer Id.
     *
     * @return int|null
     */
    public function getGameId()
    {
        return $this->request->getParam('game_id');
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
