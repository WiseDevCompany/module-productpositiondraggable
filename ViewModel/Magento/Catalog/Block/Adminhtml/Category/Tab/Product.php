<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Wise\ProductPositionDraggable\ViewModel\Magento\Catalog\Block\Adminhtml\Category\Tab;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Wise\ProductPositionDraggable\Block\Adminhtml\Grid\Renderer\Thumbnail;

class Product implements ArgumentInterface
{

    /**
     * Add druggable column to product grid on category page.
     *
     * @param   \Magento\Catalog\Block\Adminhtml\Category\Tab\Product $block
     * @return  \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
     */

    public function addDruggableColumn($block)
    {

        $block->addColumnAfter(
            'dragging',
            [
                'index' => 'dragging',
                'type' => 'draggable-handle',
                'inline_css' => 'draggable-handle',
                'column_css_class' => 'data-grid-draggable-row-cell',
                'filter' => false
            ],
            'in_category'
        );
        return $block;
    }

    /**
     * Add column with product's thumbnails to product grid on category page.
     *
     * @param   \Magento\Catalog\Block\Adminhtml\Category\Tab\Product $block
     * @return  \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
     */

    public function addThumbnailColumn($block)
    {

        $block->addColumnAfter(
            'thumbnail',
            [
                'header' => __('Thumbnail'),
                'index' => 'thumbnail',
                'filter' => false,
                'class' => 'xxx',
                'renderer' => Thumbnail::class
            ],
            'dragging'
        );
        return $block;
    }
}
