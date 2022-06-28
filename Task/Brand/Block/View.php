<?php


namespace Task\Brand\Block;

use Magento\Framework\View\Element\Template;
use Task\Brand\Model\ResourceModel\Brand\CollectionFactory;
use Task\Brand\Api\ViewInterface;

class View extends Template implements ViewInterface
{
    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;
    /**
     * Index constructor.
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param Data $data
     */
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Return brand[]
     *
     * @return array[]
     */
    public function getAllBrand()
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }
    /**
     * Return url
     *
     * @return string
     */
    public function getFormUrl()
    {
        return $this->getUrl('brand/index/Form');
    }
    /**
     * Return url
     *
     * @return string
     */
    public function getAddUrl()
    {
        return $this->getUrl('brand/index/Add');
    }
    /**
     * Return url
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        return $this->getUrl('brand/index/Delete');
    }
    /**
     * Return url
     *
     * @return string
     */
    public function getEditUrl()
    {
        return $this->getUrl('brand/index/Edit');
    }
    /**
     * Return url
     *
     * @return string
     */
    public function getViewUrl()
    {
        return $this->getUrl('brand/index/View');
    }
    /**
     * Return brand
     *
     * @return string
     */

    public function getBrand()
    {
        $id=$this->getRequest()->getParam('id');
        $collection = $this->collectionFactory->create();
        return $collection->getItemById($id);
    }
}
