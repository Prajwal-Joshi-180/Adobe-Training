<?php

namespace Task\Employee\Plugin;

use Task\Employee\Model\ResourceModel\Employee\CollectionFactory;

class EmployeeRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * EmployeeRepositoryInterface constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Adding extension attribute first_name to getById
     * @param \Task\Employee\Api\EmployeeRepositoryInterface $subject
     * @param \Task\Employee\Api\Data\EmployeeInterface $employee
     * @return \Task\Employee\Api\Data\EmployeeInterface
     */
    public function afterGetById(
        \Task\Employee\Api\EmployeeRepositoryInterface $subject,
        \Task\Employee\Api\Data\EmployeeInterface $employee
    ) {
        if ($employee->getExtensionAttributes()) {
            return $employee;
        }
        $employeeName= $this->getFirstName($employee->getId());
        $extensionAttribute=  $employee->getExtensionAttributes()->setFirstName($employeeName);
        $employee->setExtensionAttributes($extensionAttribute);
        return $employee;
    }
    private function getFirstName($Id)
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('id', ['eq' => $Id])
            ->getFirstItem()->getData('first_name');
    }
}
