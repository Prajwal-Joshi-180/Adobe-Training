<?php


namespace Task\Employee\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface EmployeeAddressInterface extends ExtensibleDataInterface
{
    public const ENTITY_ID = 'entity_id';
    public const ADDRESS_ID  = 'address_id';
    public const PERMANENT_ADDRESS = 'permanent_address';
    public const TEMP_ADDRESS = 'temporary_address';
    public const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getEntityId(): int;

    /**
     * @param $entityId
     * @return EmployeeAddressInterface
     */
    public function setEntityId($entityId): EmployeeAddressInterface;

    /**
     * @return int
     */
    public function getAddressId(): int;

    /**
     * @param $addressId
     * @return EmployeeAddressInterface
     */
    public function setAddressId($addressId): EmployeeAddressInterface;

    /**
     * @return string
     */
    public function getPermanentAddress(): string;

    /**
     * @param $address
     * @return EmployeeAddressInterface
     */
    public function setPermanentAddress($address): EmployeeAddressInterface;

    /**
     * @return string
     */
    public function getTemporaryAddress(): string;

    /**
     * @param $tempaddress
     * @return EmployeeAddressInterface
     */
    public function setTemporaryAddress($tempaddress): EmployeeAddressInterface;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param $date
     * @return EmployeeAddressInterface
     */
    public function setCreatedAt($date): EmployeeAddressInterface;
}
