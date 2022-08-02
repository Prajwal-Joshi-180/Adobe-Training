<?php


namespace Prajwal\Assignment8\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;

class EmiSection implements SectionSourceInterface
{
    /**
     * @var Session
     */
    protected Session $customerSession;

    /**
     * CustomSection constructor.
     * @param Session $customerSession
     */
    public function __construct(
        Session $customerSession
    ) {
        $this->customerSession=$customerSession;
    }

    /**
     * Return the Customer details
     *
     * @return array|string[]
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getSectionData()
    {
        return [
            'gender' =>($this->customerSession->getCustomer()->getGender()==1)?'male':'female',
        ];
    }
}
