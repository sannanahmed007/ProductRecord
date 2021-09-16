<?php
namespace Custom\Products\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'custom_customproduct';

	protected $_cacheTag = 'custom_customproduct';

	protected $_eventPrefix = 'custom_customproduct';

	protected function _construct()
	{
		$this->_init('Custom\Products\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}