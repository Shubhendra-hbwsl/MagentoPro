<?php

namespace Hummingbird\Module4\MagentoU\App;

use Magento\Framework\App\FrontController;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Request\ValidatorInterface as RequestValidator;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\RouterListInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Message\ManagerInterface as MessageManager;
use Psr\Log\LoggerInterface;


class MyFrontController extends FrontController{
    private $logger;
    private $requestValidator;

    public function __construct(
        RouterListInterface $routerList,
        ResponseInterface $response,
        ?RequestValidator $requestValidator = null,
        ?MessageManager $messageManager = null,
        ?LoggerInterface $logger = null 
    ){
        // null coalescing operator, if $logger is null then create a shared object i.e singleton using object manager
        $this->logger = $logger ?? ObjectManager::getInstance()->get(LoggerInterface::class);
        parent::__construct($routerList, $response, $requestValidator, $messageManager, $logger);
    }

    public function dispatch(RequestInterface $request)
    {
        $routerList = [];
        // _routerList comes from parent class i.e FrontController
        foreach($this->_routerList as $r){
            $routerList[] = get_class($r);
            // adds new element to the empty list, get_class returns the class name.
        }

        $routerString = join("\n", $routerList);

        $this->logger->info("ROUTERS LIST: " . $routerString);

        // IMP:
        return parent::dispatch($request);
    }
}