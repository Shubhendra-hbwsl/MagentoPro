<?php 

namespace Hummingbird\Module9\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;

class Index implements HttpGetActionInterface{
    protected $pageFactory;
    protected $resultFactory;
    
    public function __construct(PageFactory $pageFactory, ResultFactory $resultFactory){
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute(){
        return $this->pageFactory->create();
    }
}