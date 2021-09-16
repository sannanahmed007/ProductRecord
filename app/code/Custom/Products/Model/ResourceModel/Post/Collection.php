<?php
namespace Custom\Products\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'custom_product_post_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Custom\Products\Model\Post', 'Custom\Products\Model\ResourceModel\Post');
	}

	public function loadByStoreId($store_id)
    {
        if (!empty($store_id)) {
            $this->addFieldToFilter("store_id", $store_id);
        }
        return $this;
    }

}