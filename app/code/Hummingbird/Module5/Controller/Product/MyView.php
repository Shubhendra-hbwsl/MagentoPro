<?php
 
 namespace Hummingbird\Module5\Controller\Product;


use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;

 class MyView {
    private $request;
    private $productRepository;
    private $storeManager;

    public function __construct(
        RequestInterface $request,
        ProductRepositoryInterface $productRepository,
        StoreManagerInterface $storeManager
    ) {
        $this->request = $request;
        $this->productRepository = $productRepository;
        $this->storeManager = $storeManager;
    }

    // DEBUG:
    // get product by id from product repository and then check if it's price is less than $30, if it is then change the layout
    // to be displayed 2 columns right. 
    public function afterExecute(\Magento\Catalog\Controller\Product\View $subject, $resultPage)
    {
        if ($resultPage instanceof ResultInterface)
        {
            $productId = (int) $this->request->getParam('id');
            if ($productId)
            {
                    $product = $this->productRepository->getById($productId, false, $this->storeManager->getStore()->getId());
                    if ($product->getFinalPrice() <= 30)
                    {
                        $pageConfig = $resultPage->getConfig();
                        $pageConfig->setPageLayout('2columns-right'); 
                    }
            }
        }
        return $resultPage;
    }
 }