<?php 

namespace Hummingbird\Module4\Controller;
use Magento\Framework\App\Router\NoRouteHandlerInterface;
use Magento\Framework\App\RequestInterface;


class MyNoRouteHandler implements NoRouteHandlerInterface{
    

    public function process(RequestInterface $request){
     
        // Redirects    
        // DOUBT: setting module name to cms and actionName to index, does a forward but setting it to contact and post creates a redirect.
        $request->setModuleName('contact')->setControllerName('index')->setActionName('post');
        return true;
    }
}