<?php
/**
 *  Copyright © Magento. All rights reserved.
 *  See COPYING.txt for license details.
 */

namespace Unit6\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;

/**
 * Class Validate
 * alidate extends Action
 */
class Validate extends Action
{
    /**
     * Validator
     */
    public function execute()
    {
        $this->getResponse()->appendBody(json_encode(true));
        $this->getResponse()->sendResponse();
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
