<?php

namespace Task\Employee\Plugin;

use Task\Employee\Model\EmployeeRepositoryModel;
use Task\Employee\Api\Data\EmployeeAddressExtensionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;

class EmployeeAddressRepositoryInterface
{
    /**
     * @var EmployeeRepositoryModel
     */
    private EmployeeRepositoryModel $employeeRepository;
    /**
     * @var EmployeeAddressExtensionFactory
     */
    private EmployeeAddressExtensionFactory $employeeAddressExtensionFactory;

    /**
     * EmployeeAddressRepositoryInterface constructor.
     * @param EmployeeRepositoryModel $employeeRepositoryModel
     * @param EmployeeAddressExtensionFactory $employeeAddressExtensionFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        EmployeeRepositoryModel $employeeRepositoryModel,
        EmployeeAddressExtensionFactory $employeeAddressExtensionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->employeeRepository=$employeeRepositoryModel;
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
        $filter=$this->searchCriteriaBuilder->addFilter('id', $employeeAddress->getAddressId());
        $extensionAttributes=$employeeAddress->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ?:$this->employeeAddressExtensionFactory->create();
        $EmployeeData=$this->employeeRepository->getList($filter->create())->getItems();
        $employeeExtension->setEmployeeDetails($EmployeeData);
        $employeeAddress->setExtensionAttributes($employeeExtension);
        return $employeeAddress;
    }
}
