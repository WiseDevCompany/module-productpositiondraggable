<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Wise\ProductPositionDraggable\Plugin\Backend\Magento\Catalog\Block\Adminhtml\Category\Tab;

use \Wise\ProductPositionDraggable\ViewModel\Magento\Catalog\Block\Adminhtml\Category\Tab\Product as gridViewModel;
use \Magento\Catalog\Block\Adminhtml\Category\Tab\Product as tabProduct;

class Product
{

    /**
     * View Model for extending products grid block widget
     *
     * @var gridViewModel
     */
    protected $_viewModel;

    /**
     * Constructor for injecting View Model class
     *
     * @param gridViewModel $viewModel
     */
    public function __construct(
        gridViewModel $viewModel
    ) {
        $this->_viewModel = $viewModel;
    }

    /**
     * Change template and set View Model for the Products grid
     *
     * @param tabProduct $subject
     * @return array
     */
    public function beforeToHtml(
        tabProduct $subject
    ) {

        $subject->setTemplate('Wise_ProductPositionDraggable::widget/grid/extended.phtml');
        $data = $subject->getData();
        $data['view_model'] = $this->_viewModel;
        $subject->setData($data);

        return [$subject];
    }

    /**
     * Add thumbnail product attribure to collection for the Products grid
     *
     * @param tabProduct $subject
     * @param mixed $collection
     * @return array
     */
    public function beforeSetCollection(
        tabProduct $subject,
        $collection
    ) {
        $collection->addAttributeToSelect('thumbnail');
        return [$collection];
    }
}
