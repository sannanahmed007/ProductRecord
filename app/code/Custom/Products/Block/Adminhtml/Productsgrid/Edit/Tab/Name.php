<?php
namespace Custom\Products\Block\Adminhtml\Productsgrid\Edit\Tab;
use Magento\Cms\Model\Wysiwyg\Config;
class Name extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_wysiwygConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        Config $wysiwygConfig,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
		/* @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('products_productsgrid');
        //$dataHelper = \Magento\Framework\App\ObjectManager::getInstance()->get("\Types\Collections\Helper\Data");
		$isElementDisabled = false;
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Products Record')));

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array('name' => 'entity_id'));
        }

        $fieldset->addField(
            'store_id',
            'select',
            [
                'label' => __('Store View'),
                'title' => __('Store View'),
                'name' => 'store_id',
                'value' => $model->getStoreId(),
                'values' => $this->_systemStore->getStoreValuesForForm(false, true)
            ]
        );

		$fieldset->addField(
            'sku',
            'text',
            array(
                'name' => 'sku',
                'label' => __('Sku'),
                'title' => __('sku'),
                /*'required' => true,*/
            )
        );
        
        
        $wysiwygConfig = $this->_wysiwygConfig->getConfig();
		$fieldset->addField(
            'vendor_number',
            'text',
            array(
                'name' => 'vendor_number',
                'label' => __('Vendor Number'),
                'title' => __('vendor_number'),
                
            )
        );
        $wysiwygConfig = $this->_wysiwygConfig->getConfig();
        $fieldset->addField(
            'vendor_note',
            'text',
            array(
                'name' => 'vendor_note',
                'label' => __('vendor Note'),
                'title' => __('vendor_note'),
                
            )
        );
		
		/*{{CedAddFormField}}*/
        
        if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();   
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Blocks');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Blocks');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
