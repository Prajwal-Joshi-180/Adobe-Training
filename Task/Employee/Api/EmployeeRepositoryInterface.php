<?php

namespace Task\Employee\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Task\Employee\Api\Data\EmployeeInterface;
use Task\Employee\Model\Employee as Model;
use Task\Employee\Model\ResourceModel\Employee\Collection;

interface EmployeeRepositoryInterface
{
    /**
     * Get Data by Id
     *
     * @param int $Id
     * @return \Task\Employee\Api\Data\EmployeeInterface
     */
    public function getById($Id);

    /**
     * Return Collection[]
     *
     * @return array Collection[]
     */
    public function getCollection();

    /**
     * Return Collection[]
     *
     * @param array $Ids
     * @return array Data[]
     */
    public function getDataByIds(array $Ids);

    /**
     * Return the Employee Data by Employee Id
     *
     * @param int $Id
     * @return \Task\Employee\Api\Data\EmployeeInterface
     */
    public function getDataById($Id);

    /**
     * Return the List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Task\Employee\Api\Data\EmployeeSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Create Model
     *
     * @return \Task\Employee\Model\Employee
     */
    public function create();

    /**
     * Save the Model
     *
     * @param Data\EmployeeInterface $employeeData
     * @return EmployeeInterface
     */
    public function save(\Task\Employee\Api\Data\EmployeeInterface $employeeData);

    /**
     * Load The model
     *
     * @param string $value
     * @param string|null $field
     * @return \Task\Employee\Model\Employee
     */
    public function load($value, $field = null);
}
