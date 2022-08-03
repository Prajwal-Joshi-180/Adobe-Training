<?php

namespace Prajwal\Assignment8\ViewModel;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\Http\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Directory\Model\Currency;
use Magento\Framework\Locale\CurrencyInterface;

class EmiData implements ArgumentInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeconfig;
    /**
     * @var Context
     */
    protected Context $httpcontext;

    /**
     * EmiData constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     * @param Context $httpcontext
     * @param StoreManagerInterface $storeManager
     * @param Currency $currencySymbol
     * @param CurrencyInterface $localeCurrency
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Context $httpcontext,
        StoreManagerInterface $storeManager,
        Currency $currencySymbol,
        CurrencyInterface $localeCurrency
    ) {
        $this->scopeconfig=$scopeConfig;
        $this->httpcontext=$httpcontext;
        $this->storeManager = $storeManager;
        $this->currencySymbol = $currencySymbol;
        $this->localecurrency = $localeCurrency;
    }

    /**
     * Return The the Emi plans
     *
     * @return array
     */
    public function getEmidata()
    {
        return $this->scopeconfig->getValue('emi/general/config_table', ScopeInterface::SCOPE_STORE);
    }

    /**
     * Return Bool
     *
     * @return bool
     */
    public function isCustomerloggedin()
    {
        return (bool)$this->httpcontext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
    }

    /**
     * Return Currency
     *
     * @return string
     */
    public function getCurrency()
    {
        $currencycode = $this->storeManager->getStore()->getCurrentCurrencyCode();
        return $this->localecurrency->getCurrency($currencycode)->getSymbol();
    }
}
