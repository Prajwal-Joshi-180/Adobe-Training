<?php


namespace Task\Employee\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Task\Employee\Api\EmployeeRepositoryInterface;
use Task\Employee\Model\Employee as Model;
use Task\Employee\Model\EmployeeFactory as ModelFactory;
use Task\Employee\Model\ResourceModel\Employee as ResourceModel;
use Task\Employee\Model\ResourceModel\Employee\Collection;
use Task\Employee\Model\ResourceModel\Employee\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Task\Employee\Api\Data\EmployeeSearchResultInterfaceFactory;

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
     * @var SearchCriteriaInterface
     */
    private SearchCriteriaInterface $searchCriteria;
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;
    /**
     * @var EmployeeSearchResultInterfaceFactory
     */
    private EmployeeSearchResultInterfaceFactory $employeeSearchResultInterfaceFactory;

    /**
     * EmployeeRepositoryModel constructor.
     * @param CollectionFactory $collectionFactory
     * @param Collection $collection
     * @param EmployeeFactory $modelFactory
     * @param ResourceModel $resourceModel
     * @param SearchCriteriaInterface $searchCriteria
     * @param CollectionProcessorInterface $collectionProcessor
     * @param EmployeeSearchResultInterfaceFactory $employeeSearchResultInterfaceFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        Collection $collection,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel,
        SearchCriteriaInterface $searchCriteria,
        CollectionProcessorInterface $collectionProcessor,
        EmployeeSearchResultInterfaceFactory $employeeSearchResultInterfaceFactory
    ) {
        $this->modelFactory=$modelFactory;
        $this->collection=$collection;
        $this->resourceModel=$resourceModel;
        $this->collectionFactory=$collectionFactory;
        $this->searchCriteria=$searchCriteria;
        $this->collectionProcessor=$collectionProcessor;
        $this->employeeSearchResultInterfaceFactory=$employeeSearchResultInterfaceFactory;
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

    /**
     * Return the Employee Data by Employee Id
     *
     * @param int $Id
     * @return \Task\Employee\Api\Data\EmployeeInterface|array
     */
    public function getDataById($Id)
    {
        $object=$this->modelFactory->create();
        $collection=$object->getCollection();
        $collection->addFieldToFilter('id', $Id);
        return $collection->getData();
    }
    /**
     * Return the List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Task\Employee\Api\Data\EmployeeSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $colleaaction= $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, ($colleaaction));
        $searchResult=$this->employeeSearchResultInterfaceFactory->create();
        $searchResult->setItems($colleaaction->getItems());
        $searchResult->setTotalCount($colleaaction->getSize());
        $searchResult->setSearchCriteria($searchCriteria);
        return $searchResult;
    }
    /**
     * @inheritDoc
     */
    public function create()
    {
        return $this->modelFactory->create();
    }
    /**
     * @inheritDoc
     */
    public function save(\Task\Employee\Api\Data\EmployeeInterface $employeeData)
    {
        return $this->resourceModel->save($employeeData);
    }
    /**
     * @inheritDoc
     */
    public function load($value, $field = null)
    {
        $model=$this->create();
        $this->resourceModel->load($model, $value, $field);
        return $model;
    }
}
