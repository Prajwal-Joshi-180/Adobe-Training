<?php

namespace Task\Brand\Controller\Index;

use Magento\Framework\App\Action\Action;
use Task\Brand\Model\BrandFactory as ModelFactory;
use Task\Brand\Model\ResourceModel\Brand as ResourceModel;
use Magento\Framework\App\Action\Context;

class Add extends Action
{
    /**
     * @var ModelFactory
     */
    protected ModelFactory $modelFactory;
    /**
     * @var ResourceModel
     */
    protected ResourceModel $resourceModel;

    /**
     * Add constructor.
     * @param Context $context
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        Context $context,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    ) {
        parent::__construct($context);
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }
    /**
     * Return Page
     *
     * @return string
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $emptyBrand = $this->modelFactory->create();
        if (!empty($data['id'])) {
            $this->resourceModel->load($emptyBrand, $data['id']);
        }
        $emptyBrand->setName($data['name'] ?? null);
        $emptyBrand->setDescription($data['description'] ?? null);
        try {

            $this->resourceModel->save($emptyBrand);
            $this->messageManager->addSuccessMessage(__('Brand %1 saved successfully', $emptyBrand->getName()));
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("Error saving Brand"));
        }

        return $this->resultRedirectFactory->create()->setPath('brand/index/view');
    }
}
