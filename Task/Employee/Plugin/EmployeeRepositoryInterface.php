<?php

namespace Task\Employee\Plugin;

use Task\Employee\Model\ResourceModel\Employee\CollectionFactory;
use Task\Employee\Model\EmployeeAddressRepositoryModel;
use Task\Employee\Api\Data\EmployeeExtensionFactory;
use Task\Employee\Api\EmployeeRepositoryExtension;

class EmployeeRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var EmployeeAddressRepositoryModel
     */
    private EmployeeAddressRepositoryModel $addressRepository;
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
     * @param EmployeeAddressRepositoryModel $addressRepository
     * @param EmployeeExtensionFactory $employeeExtensionFactory
     * @param EmployeeRepositoryExtension $employeeRepositoryExtension
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        EmployeeAddressRepositoryModel $addressRepository,
        EmployeeExtensionFactory $employeeExtensionFactory,
        EmployeeRepositoryExtension $employeeRepositoryExtension
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->addressRepository = $addressRepository;
        $this->employeeExtensionFactory=$employeeExtensionFactory;
        $this->employeeRepositoryExtension = $employeeRepositoryExtension;
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
        $AddressData=$this->addressRepository->getByAddressId($employee->getId());
        $extensionAttributes=$employee->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ? : $this->employeeExtensionFactory->create();
        $employeeExtension->setAddressItems($AddressData);
        $employee->setExtensionAttributes($employeeExtension);
        return $employee;
    }
}
