<?php
namespace Custom\Products\Block\Adminhtml\Productsgrid\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_productsgrid_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Types'));
    }
}