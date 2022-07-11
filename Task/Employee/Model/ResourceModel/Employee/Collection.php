<?php

namespace Task\Employee\Model\ResourceModel\Employee;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Task\Employee\Model\Employee as Model;
use Task\Employee\Model\ResourceModel\Employee as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Collection constructor.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
    /**
     * Return $this
     *
     * @return $this|Collection|void
     */
    protected function _initSelect()
    {
        $this->getSelect()
            ->from(['main_table' => $this->getMainTable()])
            ->join(
                'assignment2_address',
                'main_table.id = assignment2_address.address_id',
                array('*')
            );
        return $this;
    }
}
