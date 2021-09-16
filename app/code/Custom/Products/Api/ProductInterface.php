<?php
namespace Custom\Products\Api;
 
interface ProductInterface
{
    /**
     * 
     *
     * @api
     * @param string $all Users name.
     * @return string 
     */
    public function all($all);

    /**
     * 
     * @api
     * @param mixed $setData
     * @return array
     */
    public function setData($setData);

    /**
     * 
     *
     * @api
     * @param string $delete Users name.
     * @return string 
     */
    public function delete($sku);
}