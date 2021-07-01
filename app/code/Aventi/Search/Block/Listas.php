<?php


namespace Aventi\Search\Block;


class Listas extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Helper\Data
     */
    protected $_itemsHelper;
    /**
     * Categories constructor.
     * @param \Magento\Catalog\Block\Product\Context $context
     * @param \Magento\Catalog\Helper\Data $itemsHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Helper\Data $itemsHelper,
        array $data = []
    ){
        $this->_itemsHelper = $itemsHelper;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve HTML escaped search query
     *
     * @return string
     */
    public function getEscapedQueryText()
    {
        return $this->_itemsHelper->escapeHtml($this->getPreparedQueryText($this->getQueryText(), $this->getMaxQueryLength())

        );
    }

}
