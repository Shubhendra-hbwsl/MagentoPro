<?php

namespace Hummingbird\Module4\Controller;
use Magento\UrlRewrite\Model\UrlRewriteFactory;
use Magento\Catalog\Model\ResourceModel\Attribute;

class MyUrlRewrite{
    protected $_urlRewrite;
    protected $_resourceModel;

    public function __construct(UrlRewriteFactory $urlRewrite, Attribute $resourceModel){
        
        $this->_urlRewrite = $urlRewrite;
        $this->_resourceModel = $resourceModel;
    }

    public function execute(){
        $urlRewriteModel = $this->_urlRewrite->create();
        // DEBUG: this doesn't work
        // Created a url rewrite by inserting directly into url_rewrite database table.
        // url rewrite may not be working correctly.
        $urlRewriteModel->setEntityType('custom');
        $urlRewriteModel->setStoreId(1);
        $urlRewriteModel->setIsSystem(0);
        $urlRewriteModel->setIdPath(rand(1,100000));
        $urlRewriteModel->setTargetPath("a.magento.com/index.php/contact/index/");
        $urlRewriteModel->setRequestPath("a.magento.com/contactuspage.html");
        $urlRewriteModel->setRedirectType(301);
        
        // $this->_resourceModel->save($urlRewriteModel);
        $urlRewriteModel->save();
    }


}