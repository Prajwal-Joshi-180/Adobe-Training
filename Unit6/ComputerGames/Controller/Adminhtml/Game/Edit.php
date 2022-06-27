<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit6\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * it extends Action
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;
    /**
     * @var Registry
     */
    protected Registry $coreRegistry;

    /**
     * Edit constructor.
     *
     * @param PageFactory $resultPageFactory
     * @param Registry $coreRegistry
     * @param Action\Context $context
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Registry $coreRegistry,
        Action\Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * * return Page
     *
     * @return Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Game'));
        $gameId = $this->getRequest()->getParam('game_id');
        $this->coreRegistry->register('game_id', $gameId);

        return $resultPage;
    }

    /**
     * * return bool
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Unit6_ComputerGames::grid');
    }
}
