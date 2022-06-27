<?php
/**
 *  Copyright © Magento. All rights reserved.
 *  See COPYING.txt for license details.
 */
namespace Unit6\ComputerGames\Controller\Adminhtml\Game;

use Exception;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;
use Unit6\ComputerGames\Model\Game;

/**
 * Class InlineEdit
 * InlineEdit extends \Magento\Backend\App\Action
 */
class InlineEdit extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'Unit6_ComputerGames::grid';

    /**
     * @var Game
     */
    private Game $game;

    /**
     * @var JsonFactory
     */
    protected JsonFactory $resultJsonFactory;

    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param Action\Context $context
     * @param JsonFactory $resultJsonFactory
     * @param LoggerInterface $logger
     * @param Game $game
     */
    public function __construct(
        Action\Context $context,
        JsonFactory $resultJsonFactory,
        LoggerInterface $logger,
        Game $game
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->logger = $logger;
        $this->game = $game;

        parent::__construct($context);
    }

    /**
     * For more easy way to make first steps
     * in learning grids in Magento 2
     * we are using no Repositories approach
     * but model & collection
     * in teaching approach only!
     *
     * @return Json
     * @throws Exception
     */
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $gameId) {
            $this->game->load($gameId);
            $this->game->setData($postItems[$gameId]);
            $this->game->save();
        }

        return $resultJson->setData([
            'messages' => $this->getErrorMessages(),
            'error' => $this->isErrorExists()
        ]);
    }

    /**
     * Get array with errors
     *
     * @return array
     */
    protected function getErrorMessages()
    {
        $messages = [];
        foreach ($this->getMessageManager()->getMessages()->getItems() as $error) {
            $messages[] = $error->getText();
        }
        return $messages;
    }

    /**
     * Check if errors exists
     *
     * @return bool
     */
    protected function isErrorExists()
    {
        return (bool)$this->getMessageManager()->getMessages(true)->getCount();
    }

    /**
     * Add page title to error message
     *
     * @param string $errorText
     * @return string
     */
    protected function getErrorWithCustomerId($errorText)
    {
        return '[Game ID: ' . $this->getGame()->getId() . '] ' . __($errorText);
    }
}
