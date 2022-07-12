<?php

namespace Task\Employee\Api;

interface EmployeeAddressRepositoryInterface
{
    /**
     * Return Data[]
     *
     * @param int $Id
     * @return array Data[]
     */
    public function getById(int $Id);

    /**
     * Return Collection[]
     *
     * @return array Collection[]
     */
    public function getCollection();

}
