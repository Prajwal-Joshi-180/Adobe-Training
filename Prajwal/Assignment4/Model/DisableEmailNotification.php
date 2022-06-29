<?php


namespace Prajwal\Assignment4\Model;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\EmailNotification;

class DisableEmailNotification extends EmailNotification
{
    /**
     * Constant self::NEW_ACCOUNT_EMAIL_REGISTERED               welcome email, when confirmation is disabled
     */
    public const TEMPLATE_TYPES = [
        self::NEW_ACCOUNT_EMAIL_REGISTERED => self::XML_PATH_REGISTER_EMAIL_TEMPLATE,
    ];

    /**
     * Disable email with new account related information
     *
     * @param CustomerInterface $customer
     * @param string $type
     * @param string $backUrl
     * @param int|null $storeId
     * @param string $sendemailStoreId
     * @return void
     */
    public function newAccount(
        CustomerInterface $customer,
        $type = self::NEW_ACCOUNT_EMAIL_REGISTERED,
        $backUrl = '',
        $storeId = null,
        $sendemailStoreId = null
    ): void {
        $types = self::TEMPLATE_TYPES;
    }
}
