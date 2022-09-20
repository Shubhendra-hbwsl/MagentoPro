<?php

namespace Hummingbird\Module5\Controller\Action;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;


class MyAction implements HttpGetActionInterface{
    protected $_resultFactory;

    public function __construct(ResultFactory $resultFactory)
    {   
        $this->_resultFactory = $resultFactory;
    }

    public function execute(){
        // SELF NOTE: change type to TYPE::RAW
        $result = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
        
        
        // Uncomment this line to print Hello world on frontend
        // $result->setContents('Hello World!');

        // Redirects the hello world front controller to product page
        $result->setUrl('https://a.magento.com/index.php/strive-shoulder-pack.html');
        return $result;
    }   
}