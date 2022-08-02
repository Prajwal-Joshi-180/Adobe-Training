<?php

namespace Prajwal\Assignment8\ViewModel;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class EmiData implements ArgumentInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeconfig;

    /**
     * EmiData constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeconfig=$scopeConfig;
    }

    /**
     * Return The the Emi plans
     *
     * @return array
     */
    public function getEmiData()
    {
        return $this->scopeconfig->getValue('emi/general/config_table', ScopeInterface::SCOPE_STORE);
    }
}
