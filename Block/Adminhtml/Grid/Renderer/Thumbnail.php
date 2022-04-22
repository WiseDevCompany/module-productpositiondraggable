<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wise\ProductPositionDraggable\Block\Adminhtml\Grid\Renderer;

use Magento\Catalog\Helper\Image as ImageHelper;
use Magento\Catalog\Model\ProductFactory;

class Thumbnail extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{

    /**
     * @var Magento\Catalog\Helper\Image
     */
    protected $imageHelper;

    /**
     * @param Context $context
     * @param Magento\Catalog\Helper\Image $imageHelper
     * @param Magento\Catalog\Model\ProductFactory $productFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        ImageHelper $imageHelper,
        ProductFactory $productFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->imageHelper = $imageHelper;
        $this->productFactory = $productFactory;
    }

    /**
     * Generate link to product image thumbnail from grid row data
     *
     * @param \Magento\Framework\DataObject $row
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $productModel = $this->productFactory->create();
        $product = $productModel->load($productModel->getIdBySku($row->getSku()));
        $imageHelper = $this->imageHelper->init($product, 'product_listing_thumbnail');

        $imageUrl = ($this->_getValue($row) !== '')
                    ? $imageHelper->getUrl()
                    : $imageHelper->getDefaultPlaceholderUrl();

        return '<img src="'.$imageUrl.'" width="'.$imageHelper->getWidth().'" height="'.$imageHelper->getHeight().'"/>';
    }
}
