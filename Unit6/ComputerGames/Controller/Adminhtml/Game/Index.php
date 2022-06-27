<?php
/**
 *  Copyright © Magento. All rights reserved.
 *  See COPYING.txt for license details.
 */
namespace Unit6\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * Index extends Action
 */
class Index extends Action
{
    /**
     * ACL access restriction
     */
    public const ADMIN_RESOURCE = 'Unit6_ComputerGames::grid';

    /**
     * * reutnr Page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $backendPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $backendPage->setActiveMenu('Unit6_ComputerGames::games_list');
        $backendPage->addBreadcrumb(__('Dashboard'), __('Games'));
        $backendPage->getConfig()->getTitle()->prepend(__('Games'));

        return $backendPage;
    }
}
