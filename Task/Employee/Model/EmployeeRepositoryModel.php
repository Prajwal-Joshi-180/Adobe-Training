<?php


namespace Task\Employee\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Task\Employee\Api\EmployeeRepositoryInterface;
use Task\Employee\Model\Employee as Model;
use Task\Employee\Model\EmployeeFactory as ModelFactory;
use Task\Employee\Model\ResourceModel\Employee as ResourceModel;
use Task\Employee\Model\ResourceModel\Employee\Collection;
use Task\Employee\Model\ResourceModel\Employee\CollectionFactory;

class EmployeeRepositoryModel implements EmployeeRepositoryInterface
{
    /**
     * @var EmployeeFactory
     */
    private $modelFactory;

    /**
     * @var ResourceModel
     */
    private $resourceModel;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * EmployeeRepositoryModel constructor.
     * @param CollectionFactory $collectionFactory
     * @param EmployeeFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    ) {
        $this->modelFactory=$modelFactory;
        $this->resourceModel=$resourceModel;
        $this->collectionFactory=$collectionFactory;
    }

    /**
     * Return Data[]
     *
     * @param int $Id
     * @return array Data
     */
    public function getById($Id)
    {
        return $this->load($Id)->getData();
    }

    /**
     * Return Model
     *
     * @param int $value
     * @return Model
     */
    public function load(int $value)
    {
        $model=$this->modelFactory->create();
        $model->load($value);
//        $this->resourceModel->load($model, $value);
        return $model;
    }

    /**
     * Return Collection
     *
     * @return Collection
     */
    public function getCollection()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getData();
    }
}
