<?php


namespace Task\Employee\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Task\Employee\Api\EmployeeRepositoryInterface;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $pageFactory;
    /**
     * @var EmployeeRepositoryInterface
     */
    protected EmployeeRepositoryInterface $employeeRepository;
    /**
     * @var JsonFactory
     */
    private JsonFactory $resultJsonFactory;

    /**
     * View constructor.
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        EmployeeRepositoryInterface $employeeRepository,
        PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory=$resultJsonFactory;
        $this->employeeRepository=$employeeRepository;
        $this->pageFactory = $pageFactory;
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\Result\Json|ResultInterface|\Task\Employee\Api\Data\EmployeeInterface
     */
    public function execute()
    {
        $resultJson=$this->resultJsonFactory->create();
        try {
//            $employee=$this->employeeRepository->getDataByIds(['1','2']);
//            return $resultJson->setData($employee);
//            $collection=$this->employeeRepository->getCollection()->getData();
            $collection=$this->employeeRepository->getById(1);
            var_dump($collection);die();
            return $collection;
        } catch (NoSuchEntityException $e) {
             return $resultJson->setData($e->getMessage());
        }
    }
}
