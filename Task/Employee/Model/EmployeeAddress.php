<?php


namespace Task\Employee\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\AbstractExtensibleModel;
use Task\Employee\Model\ResourceModel\EmployeeAddress as ResourceModel;
use Task\Employee\Api\Data\EmployeeAddressInterface;
use Task\Employee\Api\Data\EmployeeAddressExtensionInterface;

class EmployeeAddress extends AbstractExtensibleModel implements EmployeeAddressInterface
{
    /**
     * EmployeeAddress constructor.
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @param int $entityId
     * @return EmployeeAddressInterface
     */
    public function setEntityId($entityId): EmployeeAddressInterface
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->getData(self::ADDRESS_ID);
    }

    /**
     * @param $addressId
     * @return EmployeeAddressInterface
     */
    public function setAddressId($addressId): EmployeeAddressInterface
    {
        return $this->setData(self::ADDRESS_ID, $addressId);
    }

    /**
     * @return string
     */
    public function getPermanentAddress(): string
    {
        return $this->getData(self::PERMANENT_ADDRESS);
    }

    /**
     * @param $address
     * @return EmployeeAddressInterface
     */
    public function setPermanentAddress($address): EmployeeAddressInterface
    {
        return $this->setData(self::PERMANENT_ADDRESS, $address);
    }

    /**
     * @return string
     */
    public function getTemporaryAddress(): string
    {
        return $this->getData(self::TEMP_ADDRESS);
    }

    /**
     * @param $tempaddress
     * @return EmployeeAddressInterface
     */
    public function setTemporaryAddress($tempaddress): EmployeeAddressInterface
    {
        return $this->setData(self::TEMP_ADDRESS, $tempaddress);
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
     * @return EmployeeAddressInterface
     */
    public function setCreatedAt($date): EmployeeAddressInterface
    {
        return $this->setData(self::CREATED_AT, $date);
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
    public function setExtensionAttributes(EmployeeAddressExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
