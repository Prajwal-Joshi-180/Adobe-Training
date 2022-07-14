<?php

namespace Task\Brand\Model\ResourceModel;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Task\Brand\Model\ResourceModel\Brand as ResourceModel;

class Brand extends AbstractDb
{

    public const TABLE_NAME = 'task_brand';
    public const ID_FIELD_NAME = 'id';
    /**
     * Brand constructor.
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::ID_FIELD_NAME);
    }
}
