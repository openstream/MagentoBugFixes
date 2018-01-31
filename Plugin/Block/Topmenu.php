<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 30/01/2018
 * Time: 20:37
 */

namespace Openstream\MagentoBugFixes\Plugin\Block;

use Magento\Catalog\Plugin\Block\Topmenu as Original;

class Topmenu extends Original
{

    /**
     * limit the navigation
     *
     * @param int $storeId
     * @param int $rootId
     *
     * @return \Magento\Catalog\Model\ResourceModel\Category\Collection|\Openstream\MagentoBugFixes\Model\ResourceModel\Category\Collection
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function getCategoryTree($storeId, $rootId)
    {
        /** @var \Openstream\MagentoBugFixes\Model\ResourceModel\Category\Collection $collection */
        $collection = parent::getCategoryTree($storeId, $rootId);
        $collection->addNavigationMaxDepthFilter();
        return $collection;
    }
}