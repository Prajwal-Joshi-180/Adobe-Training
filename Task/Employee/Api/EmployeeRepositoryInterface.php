<?php

namespace Task\Employee\Api;

use Task\Employee\Model\Employee as Model;
use Task\Employee\Model\ResourceModel\Employee\Collection;

interface EmployeeRepositoryInterface
{
    /**
     * Return Data[]
     *
     * @param int $Id
     * @return array Data[]
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
}
