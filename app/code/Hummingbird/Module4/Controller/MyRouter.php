<?php 

namespace Hummingbird\Module4\Controller;

use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RequestInterface as AppRequestInterface;

class MyRouter implements RouterInterface{
    
    // protected $redirectFactory;
    protected $actionFactory;
    protected $_response;

    public function __construct(ActionFactory $actionFactory, ResponseInterface $response){
        // $this->redirectFactory = $redirectFactory;
        // RedirectFactory $redirectFactory
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
        // This injects the object of ActionFactory, ActionFactory will
        // be used to instantiate a object of class Action.
    }
    

    public function match(AppRequestInterface $request){
        $pathInfo = $request->getPathInfo();
        $regex = '/[A-Z][a-z]*/';
        
        // matches the string FrontnameControllernameAction
        // Frontname Controllername Action
        if(preg_match_all($regex, $pathInfo, $matches)==3){
            // NOTE: Parsed URL is in the form of frontname/controllername/actionname
            // original url form FrontnameControllerActionname
            
            $parsedUrl = sprintf("/%s/%s/%s", 
             strtolower($matches[0][0])
            ,strtolower($matches[0][1])
            ,strtolower($matches[0][2]));

            // $request->setPathInfo($parsedUrl);

            /**
             * SELFNOTE: Remember to setRedirect before instantiating the Redirect class object
             * via actionFactory, or else this won't work.
             * 
             */
            $this->_response->setRedirect($parsedUrl);
            return $this->actionFactory->create('Magento\Framework\App\Action\Redirect');

            // NOTE: To enable forwarding, uncoment setPathInfo and below actionFactory
            // DEBUG: delete temp later
            // $temp = $this->actionFactory->create('Magento\Framework\App\Action\Forward'
            // ,['request' => $request]);
            // return $temp;
        }

        return null;
    }
}