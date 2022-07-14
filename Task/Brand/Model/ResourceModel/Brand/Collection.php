<?php

namespace Task\Brand\Model\ResourceModel\Brand;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Task\Brand\Model\Employee as Model;
use Task\Brand\Model\ResourceModel\Brand as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
