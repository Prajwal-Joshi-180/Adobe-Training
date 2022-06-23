<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit3\HelloWorldBlock\Controller\Block;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var pageFactory
     */
    protected $_pageFactory;
    /**
     * @param Magento\Framework\App\Action\Context $context
     * @param Magento\Framework\View\Result\PageFactory $pageFactory
     */

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }
    /**
     * Return \Magento\Framework\App\ResponseInterface |
    \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $layout = $this->_pageFactory->create()->getLayout();
        $block = $layout->createBlock('Unit3\HelloWorldBlock\Block\Test');
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
