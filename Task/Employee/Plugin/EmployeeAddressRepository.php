<?php

namespace Task\Employee\Plugin;

use Task\Employee\Model\EmployeeRepository;
use Task\Employee\Api\Data\EmployeeAddressExtensionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;

class EmployeeAddressRepository
{
    /**
     * @var EmployeeRepository
     */
    private EmployeeRepository $employeeRepository;
    /**
     * @var EmployeeAddressExtensionFactory
     */
    private EmployeeAddressExtensionFactory $employeeAddressExtensionFactory;

    /**
     * EmployeeAddressRepositoryInterface constructor.
     * @param EmployeeRepository $employeeRepository
     * @param EmployeeAddressExtensionFactory $employeeAddressExtensionFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        EmployeeAddressExtensionFactory $employeeAddressExtensionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->employeeRepository=$employeeRepository;
        $this->employeeAddressExtensionFactory=$employeeAddressExtensionFactory;
        $this->searchCriteriaBuilder=$searchCriteriaBuilder;
    }

    /**
     * Adding extension attribute Employee Details to getById
     *
     * @param \Task\Employee\Api\EmployeeAddressRepositoryInterface $subject
     * @param \Task\Employee\Api\Data\EmployeeAddressInterface $employeeAddress
     * @return \Task\Employee\Api\Data\EmployeeAddressInterface
     */
    public function afterGetById(
        \Task\Employee\Api\EmployeeAddressRepositoryInterface $subject,
        \Task\Employee\Api\Data\EmployeeAddressInterface $employeeAddress
    ) {
        $extensionAttributes=$employeeAddress->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ?:$this->employeeAddressExtensionFactory->create();
        $EmployeeData=$this->employeeRepository->getDataById($employeeAddress->getAddressId());
        $employeeExtension->setEmployeeDetails($EmployeeData);
        $employeeAddress->setExtensionAttributes($employeeExtension);
        return $employeeAddress;
    }
}
