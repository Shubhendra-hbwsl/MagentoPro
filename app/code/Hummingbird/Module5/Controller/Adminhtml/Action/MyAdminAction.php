<?php 
namespace Hummingbird\Module5\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class MyAdminAction extends Action{
    protected $resultFactory;

    public function __construct(Context $context, ResultFactory $resultFactory){
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }

    public function execute(){
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents("Hello Admin!");

        return $result;
    }

    protected function _isAllowed(){
        $secret = $this->getRequest()->getParam('key');
        // NOTE: uncomment this line to allow access if the user logged in is admin, doesn't matter key is set or not.
        // return $this->_authorization->isAllowed('Magento_Backend::admin');
        
        return isset($secret);
    }

    public function _processUrlKeys() {
        return true;
        }
}