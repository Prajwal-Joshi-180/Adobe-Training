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
     * @param $addressId
     * @return Data\EmployeeAddressInterface
     */
    public function getByAddressId($addressId);

    /**
     * Return Collection[]
     *
     * @return array Collection[]
     */
    public function getCollection();
}
