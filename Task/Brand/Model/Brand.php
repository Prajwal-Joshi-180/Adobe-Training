<?php

namespace Task\Brand\Model;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Model\AbstractModel;
use Task\Brand\Model\ResourceModel\Brand as ResourceModel;

class Brand extends AbstractModel
{
    /**
     * Brand constructor.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
