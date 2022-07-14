<?php

namespace Task\Employee\Api;

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
     * Return Model
     *
     * @param int $value
     * @return Model
     */
    public function load(int $value);

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
     * @param $Id
     * @return \Task\Employee\Api\Data\EmployeeInterface
     */
    public function getDataById($Id);
}
