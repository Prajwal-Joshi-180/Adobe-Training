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
     * @var Collection
     */
    private Collection $collection;

    /**
     * EmployeeRepositoryModel constructor.
     * @param CollectionFactory $collectionFactory
     * @param Collection $collection
     * @param EmployeeFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        Collection $collection,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    ) {
        $this->modelFactory=$modelFactory;
        $this->collection=$collection;
        $this->resourceModel=$resourceModel;
        $this->collectionFactory=$collectionFactory;
    }
    /**
     * Get Student Data by Id
     *
     * @param int $Id
     * @return \Task\Employee\Model\Employee
     */
    public function getById($Id)
    {
        $model=$this->modelFactory->create();
        $this->resourceModel->load($model, $Id);
        return $model;
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
        $this->resourceModel->load($model, $value);
        if (!$model->getId()) {
            throw new NoSuchEntityException(__("Id %1 dosent exist", $value));
        }
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
        return $collection;
    }
    /**
     * Return Collection[]
     *
     * @param array $Ids
     * @return array Data[]
     */
    public function getDataByIds(array $Ids)
    {
        $collection= $this->getCollection()->addFieldToFilter('id', ['in'=>$Ids]);
        return $collection->getData();
    }
}
