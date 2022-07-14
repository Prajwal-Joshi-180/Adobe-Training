<?php


namespace Task\Employee\Model;

use Task\Employee\Api\EmployeeAddressRepositoryInterface;
use Task\Employee\Model\EmployeeAddress as Model;
use Task\Employee\Model\EmployeeAddressFactory as ModelFactory;
use Task\Employee\Model\ResourceModel\EmployeeAddress as ResourceModel;
use Task\Employee\Model\ResourceModel\EmployeeAddress\Collection;
use Task\Employee\Model\ResourceModel\EmployeeAddress\CollectionFactory;

class EmployeeAddressRepositoryModel implements EmployeeAddressRepositoryInterface
{
    /**
     * @var EmployeeAddressFactory
     */
    private EmployeeAddressFactory $modelFactory;
    /**
     * @var Collection
     */
    private Collection $collection;
    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * EmployeeAddressRepositoryModel constructor.
     * @param CollectionFactory $collectionFactory
     * @param Collection $collection
     * @param EmployeeAddressFactory $modelFactory
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
     * @return \Task\Employee\Model\EmployeeAddress
     */
    public function getById($Id)
    {
        $model=$this->modelFactory->create();
        $this->resourceModel->load($model, $Id);
        return $model;
    }

    /**
     * @param $addressId
     * @return \Task\Employee\Api\Data\EmployeeAddressInterface
     */
    public function getByAddressId($addressId)
    {
        $object=$this->modelFactory->create();
        $collection=$object->getCollection();
        $collection->addFieldToFilter('address_id', $addressId);
        return $collection->getData();
    }
    /**
     * Return Collection
     *
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collectionFactory->create();
    }
}
