<?php

namespace Task\Employee\Api;

interface EmployeeAddressRepositoryInterface
{
    /**
     * Return Data[]
     *
     * @param int $Id
     * @return \Task\Employee\Api\Data\EmployeeAddressInterface
     */
    public function getById($Id);

    /**
     * Return the Address Data by ID
     *
     * @param int $addressId
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
