<?php 

namespace Hummingbird\Module6\Controller\BlockController;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class BlockController implements HttpGetActionInterface{
    protected $pageFactory;
    protected $resultFactory;
    
    public function __construct(PageFactory $pageFactory, ResultFactory $resultFactory){
        $this->pageFactory = $pageFactory;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $pageLayout = $this->pageFactory->create()->getLayout();
            // Create a page and then get its layout, create a block from that layout
        $block = $pageLayout->createBlock('Hummingbird\Module6\Block\MyBlock');
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        $result->setContents($block->toHtml());
        return $result;
    }
}