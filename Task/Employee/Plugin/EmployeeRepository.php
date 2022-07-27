<?php

namespace Task\Employee\Plugin;

use Task\Employee\Model\ResourceModel\Employee\CollectionFactory;
use Task\Employee\Model\EmployeeAddressRepository;
use Task\Employee\Api\Data\EmployeeExtensionFactory;
use Task\Employee\Api\EmployeeRepositoryExtension;
use Magento\Framework\Api\SearchCriteriaBuilder;

class EmployeeRepository
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var EmployeeAddressRepository
     */
    private EmployeeAddressRepository $addressRepository;
    /**
     * @var EmployeeRepositoryExtension
     */
    private EmployeeRepositoryExtension $employeeRepositoryExtension;
    /**
     * @var EmployeeExtensionFactory
     */
    private EmployeeExtensionFactory $employeeExtensionFactory;

    /**
     * EmployeeRepositoryInterface constructor.
     * @param CollectionFactory $collectionFactory
     * @param EmployeeAddressRepository $addressRepository
     * @param EmployeeExtensionFactory $employeeExtensionFactory
     * @param EmployeeRepositoryExtension $employeeRepositoryExtension
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        EmployeeAddressRepository $addressRepository,
        EmployeeExtensionFactory $employeeExtensionFactory,
        EmployeeRepositoryExtension $employeeRepositoryExtension,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->addressRepository = $addressRepository;
        $this->employeeExtensionFactory=$employeeExtensionFactory;
        $this->employeeRepositoryExtension = $employeeRepositoryExtension;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
    }

    /**
     * Adding extension attribute Address Items to getById
     *
     * @param \Task\Employee\Api\EmployeeRepositoryInterface $subject
     * @param \Task\Employee\Api\Data\EmployeeInterface $employee
     * @return \Task\Employee\Api\Data\EmployeeInterface
     */
    public function afterGetById(
        \Task\Employee\Api\EmployeeRepositoryInterface $subject,
        \Task\Employee\Api\Data\EmployeeInterface $employee
    ) {
        $filter=$this->searchCriteriaBuilder->addFilter('address_id', $employee->getId());
        $extensionAttributes=$employee->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ? : $this->employeeExtensionFactory->create();
        $AddressData= $this->addressRepository->getList($filter->create())->getItems();
        $employeeExtension->setAddressItems($AddressData);
        $employee->setExtensionAttributes($employeeExtension);
        return $employee;
    }
}
