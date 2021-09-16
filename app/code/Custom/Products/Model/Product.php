<?php
namespace Custom\Products\Model;
use Custom\Products\Api\ProductInterface;
 
class Product implements ProductInterface
{

    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
  

    public function all($all) {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('custom_customproduct');
        $sql = $connection->select()->from(
         ["tn" => $tableName]
        );
        $result = $connection->fetchAll($sql);
        return $result;
    }

    public function setData($setData) {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('custom_customproduct');

        $store_id =  $setData['store_id'];
        $sku =$setData['sku'];
        $vendor_number =$setData['vendor_number'];
        $vendor_note =$setData['vendor_note'];
       
        $sql = "Insert Into " . $tableName . " (store_id, sku, vendor_number, vendor_note) Values ('".$store_id."','".$sku."','".$vendor_number."','".$vendor_note."')";     
        $connection->query($sql);       
        return 'successfully saved';
    }

    public function delete($sku) {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('custom_customproduct');
       
        $sql = "DELETE FROM ".$tableName." WHERE sku='" . $sku . "'";  
        $connection->query($sql);       
        return 'successfully deleted';
    }
}