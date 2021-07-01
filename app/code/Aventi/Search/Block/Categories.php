<?php

namespace Aventi\Search\Block;

class Categories extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_categoryHelper;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $_logger;
    /**
     * Categories constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Catalog\Helper\Category $categoryHelper
     * @param \Psr\Log\LoggerInterface $logger
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Psr\Log\LoggerInterface $logger,
        array $data = []
    ){
        $this->_logger = $logger;
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
        $categorias = $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
        $this->view_categories($categorias);
       /* foreach ($categorias as $categoria){
            $this->_logger->debug("[---------Name---------]: ".$categoria->getName());
            $this->_logger->debug("[----------Id----------]: ".$categoria->getId());
            $this->_logger->debug("[--------------------]");
        }*/
        return $categorias;
    }

    public function view_categories($categorias){

        foreach ($categorias as $categoria){
            $this->_logger->debug("----".json_encode($categoria));
            $this->_logger->debug("[---------Name---------]: ".$categoria->getName());
            if ($categoria->hasChildren()){
                $this->view_categories($categoria->getChildren());
            }
        }
    }
}
