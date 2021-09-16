<?php
namespace Custom\Products\Controller\Adminhtml\Productsgrid;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
		$id = $this->getRequest()->getParam('entity_id');
		try {
				$banner = $this->_objectManager->get('Custom\Products\Model\Post')->load($id);
				$banner->delete();
                $this->messageManager->addSuccess(
                    __('Deleted successfully !')
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
	    $this->_redirect('*/*/');
    }
}
