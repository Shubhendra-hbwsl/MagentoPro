<?php 

namespace Hummingbird\Module6\Block;

use Magento\Framework\View\Element\AbstractBlock;

class MyBlock extends AbstractBlock{
    protected function _toHtml()
    {
        return "<h1>This content is from block. by _toHtml</h1>";
    }

    protected function _afterToHtml($html)
    {
        return $html . '<h4 style="color:red;">This is just some random content from block by _afterToHtml</h4>';
    }
}