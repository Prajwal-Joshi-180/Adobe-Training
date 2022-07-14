<?php


namespace Task\Employee\Plugin;

use Task\Employee\Model\EmployeeRepositoryModel;
use Task\Employee\Api\Data\EmployeeAddressExtensionFactory;

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
     */
    public function __construct(
        EmployeeRepositoryModel $employeeRepositoryModel,
        EmployeeAddressExtensionFactory $employeeAddressExtensionFactory
    ) {
        $this->employeeRepository=$employeeRepositoryModel;
        $this->employeeAddressExtensionFactory=$employeeAddressExtensionFactory;
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
        $EmployeeData=$this->employeeRepository->getDataById($employeeAddress->getAddressId());
        $extensionAttributes=$employeeAddress->getExtensionAttributes();
        $employeeExtension = $extensionAttributes ?:$this->employeeAddressExtensionFactory->create();
        $employeeExtension->setEmployeeDetails($EmployeeData);
        $employeeAddress->setExtensionAttributes($employeeExtension);
        return $employeeAddress;
    }
}
