<?php
namespace Custom\Products\Block\Adminhtml;
class Productsgrid extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
		
        $this->_controller = 'adminhtml_productsgrid';/*block grid.php directory*/
        $this->_blockGroup = 'Custom_Products';
        $this->_headerText = __('Products Record');
        $this->_addButtonLabel = __('Add New Entry'); 
        parent::_construct();
		
    }
}