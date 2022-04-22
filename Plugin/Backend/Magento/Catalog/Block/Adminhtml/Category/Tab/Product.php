<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wise\ProductPositionDraggable\Plugin\Backend\Magento\Catalog\Block\Adminhtml\Category\Tab;

use \Wise\ProductPositionDraggable\ViewModel\Magento\Catalog\Block\Adminhtml\Category\Tab\Product as gridViewModel;

class Product
{

    /**
     * @var gridViewModel
     */

    protected $_viewModel;

    

    public function __construct(
        gridViewModel $viewModel
    ) {
        $this->_viewModel = $viewModel;
    }

    public function beforeToHtml(
        \Magento\Catalog\Block\Adminhtml\Category\Tab\Product $subject
    ) {

        $subject->setTemplate('Wise_ProductPositionDraggable::widget/grid/extended.phtml');
        $data = $subject->getData();
        $data['view_model'] = $this->_viewModel;
        $subject->setData($data);

        return [$subject];
    }

    public function beforeSetCollection(
        \Magento\Catalog\Block\Adminhtml\Category\Tab\Product $subject,
        $collection
    ) {
        $collection->addAttributeToSelect('thumbnail');
        return [$collection];
    }


}

