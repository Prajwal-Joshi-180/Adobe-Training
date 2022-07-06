<?php

namespace Task\Employee\Model;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Model\AbstractModel;
use Task\Employee\Model\ResourceModel\Employee as ResourceModel;

class Employee extends AbstractModel
{
    /**
     * Employee constructor.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
