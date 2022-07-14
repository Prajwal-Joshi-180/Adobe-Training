<?php


namespace Task\Employee\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface EmployeeInterface extends ExtensibleDataInterface
{
    public const ID = 'id';
    public const IS_ACTIVE  = 'is_active';
    public const FIRST_NAME = 'first_name';
    public const LAST_NAME = 'last_name';
    public const DOB  = 'dob';
    public const CREATED_AT = 'created_at';
    public const PRICE= 'price';
    public const WEIGHT= 'weight';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $Id
     * @return EmployeeInterface
     */
    public function setId($Id): EmployeeInterface;

    /**
     * @return bool
     */
    public function getIsActive();

    /**
     * @param bool $value
     * @return EmployeeInterface
     */
    public function setIsActive(bool $value):EmployeeInterface;

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @param $firstname
     * @return EmployeeInterface
     */
    public function setFirstName($firstname): EmployeeInterface;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param $lastname
     * @return EmployeeInterface
     */
    public function setLastName($lastname): EmployeeInterface;

    /**
     * @return string
     */
    public function getDob(): string;

    /**
     * @param $dob
     * @return EmployeeInterface
     */
    public function setDob($dob): EmployeeInterface;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param $date
     * @return EmployeeInterface
     */
    public function setCreatedAt($date): EmployeeInterface;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @param $price
     * @return EmployeeInterface
     */
    public function setPrice($price): EmployeeInterface;

    /**
     * @return float
     */
    public function getWeight(): float;

    /**
     * @param $weight
     * @return EmployeeInterface
     */
    public function setWeight($weight): EmployeeInterface;

    /**
     * @return \Task\Employee\Api\Data\EmployeeExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * @param EmployeeExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Task\Employee\Api\Data\EmployeeExtensionInterface $extensionAttributes);
}
