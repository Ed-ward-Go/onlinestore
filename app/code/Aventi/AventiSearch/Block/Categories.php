<?php

namespace Aventi\AventiSearch\Block;

class Categories extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_categoryHelper;

    /**
     * Categories constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
        array $data = []
    ){
        $this->_categoryHelper = $categoryHelper;
        parent::__construct($context, $data);
    }

    /**
    * Retrieve current store level 2 category
    *
    * @param bool|string $sorted (if true display collection sorted as name otherwise sorted as based on id asc)
    * @param bool $asCollection (if true display all category otherwise display second level category menu visible category for current store)
    * @param bool $toLoad
    */
    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
    }
}
