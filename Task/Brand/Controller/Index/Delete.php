<?php

namespace Task\Brand\Controller\Index;

use Magento\Framework\App\Action\Action;
use Task\Brand\Model\BrandFactory as ModelFactory;
use Task\Brand\Model\ResourceModel\Brand as ResourceModel;
use Magento\Framework\App\Action\Context;

class Delete extends Action
{
    /**
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * Delete Constructor
     *
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
     * Return to Page
     *
     * @return string
     */
    public function execute()
    {
        try {
            $model = $this->modelFactory->create();
            $id= $this->getRequest()->getParam('id');
            $model->load($id);
            $model->delete();
            $this->messageManager->addSuccessMessage(__("Successfully deleted"));
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("Error In Deleteing Brand"));
        }
        return $this->resultRedirectFactory->create()->setPath('brand/index/view');
    }
}
