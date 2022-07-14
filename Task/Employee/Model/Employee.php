<?php

namespace Task\Employee\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\AbstractExtensibleModel;
use Task\Employee\Api\Data\EmployeeExtensionInterface;
use Task\Employee\Model\ResourceModel\Employee as ResourceModel;
use Task\Employee\Api\Data\EmployeeInterface;

class Employee extends AbstractExtensibleModel implements EmployeeInterface
{
    /**
     * Employee constructor.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getData(self::ID);
    }

    /**
     * @param int $Id
     * @return EmployeeInterface
     */
    public function setId($Id): EmployeeInterface
    {
        return $this->setData(self::ID, $Id);
    }

    /**
     * @return bool
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * @param bool $value
     * @return EmployeeInterface
     */
    public function setIsActive(bool $value): EmployeeInterface
    {
        return $this->setData(self::IS_ACTIVE, $value);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * @param $firstname
     * @return EmployeeInterface
     */
    public function setFirstName($firstname): EmployeeInterface
    {
        return $this->setData(self::FIRST_NAME, $firstname);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * @param $lastname
     * @return EmployeeInterface
     */
    public function setLastName($lastname): EmployeeInterface
    {
        return $this->setData(self::LaLAST_NAMEs, $lastname);
    }

    /**
     * @return string
     */
    public function getDob(): string
    {
        return $this->getData(self::DOB);
    }

    /**
     * @param $dob
     * @return EmployeeInterface
     */
    public function setDob($dob): EmployeeInterface
    {
        return $this->setData(self::DOB, $dob);
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param $date
     * @return EmployeeInterface
     */
    public function setCreatedAt($date): EmployeeInterface
    {
        return $this->setData(self::CREATED_AT, $date);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->getData(self::PRICE);
    }

    /**
     * @param $price
     * @return EmployeeInterface
     */
    public function setPrice($price): EmployeeInterface
    {
        return $this->setData(self::PRICE, $price);
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->getData(self::WEIGHT);
    }

    /**
     * @param $weight
     * @return EmployeeInterface
     */
    public function setWeight($weight): EmployeeInterface
    {
        return $this->setData(self::WEIGHT, $weight);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDocs
     *
     * @return $this
     */
    public function setExtensionAttributes(EmployeeExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
