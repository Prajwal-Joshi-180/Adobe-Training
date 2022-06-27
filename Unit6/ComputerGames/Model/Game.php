<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit6\ComputerGames\Model;

use Unit6\ComputerGames\Model\ResourceModel\Game as GameResourceModel;

/**
 * Class Game
 * Game extends \Magento\Framework\Model\AbstractExtensibleModel
 */
class Game extends \Magento\Framework\Model\AbstractExtensibleModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(GameResourceModel::class);
    }

    /**
     * * return array
     *
     * @return array
     */
    public function getCustomAttributesCodes()
    {
        return ['game_id', 'name', 'type', 'trial_period', 'release_date'];
    }
}
