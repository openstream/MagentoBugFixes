<?php

namespace Openstream\MagentoBugFixes\Model\ResourceModel\Category;

use Magento\Catalog\Model\ResourceModel\Category\Collection as OriginalCollection;
use Magento\Store\Model\ScopeInterface;

class Collection extends OriginalCollection
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface|null
     */
    private $scopeConfig;

    /**
     * Collection constructor.
     *
     * @param \Magento\Framework\Data\Collection\EntityFactory             $entityFactory
     * @param \Psr\Log\LoggerInterface                                     $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Framework\Event\ManagerInterface                    $eventManager
     * @param \Magento\Eav\Model\Config                                    $eavConfig
     * @param \Magento\Framework\App\ResourceConnection                    $resource
     * @param \Magento\Eav\Model\EntityFactory                             $eavEntityFactory
     * @param \Magento\Eav\Model\ResourceModel\Helper                      $resourceHelper
     * @param \Magento\Framework\Validator\UniversalFactory                $universalFactory
     * @param \Magento\Store\Model\StoreManagerInterface                   $storeManager
     * @param \Magento\Framework\DB\Adapter\AdapterInterface|null          $connection
     * @param \Magento\Framework\App\Config\ScopeConfigInterface|null      $scopeConfig
     *
     */
    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactory $entityFactory, \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Eav\Model\Config $eavConfig,
        \Magento\Framework\App\ResourceConnection $resource, \Magento\Eav\Model\EntityFactory $eavEntityFactory,
        \Magento\Eav\Model\ResourceModel\Helper $resourceHelper,
        \Magento\Framework\Validator\UniversalFactory $universalFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\DB\Adapter\AdapterInterface $connection = null,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig = null
    )
    {
        parent::__construct(
            $entityFactory, $logger, $fetchStrategy, $eventManager, $eavConfig, $resource, $eavEntityFactory,
            $resourceHelper, $universalFactory, $storeManager, $connection
        );

        $this->scopeConfig = $scopeConfig ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Magento\Framework\App\Config\ScopeConfigInterface::class);
    }
    /**
     * Add navigation max depth filter
     *
     * @return $this
     */
    public function addNavigationMaxDepthFilter()
    {
        $navigationMaxDepth = (int)$this->scopeConfig->getValue(
            'catalog/navigation/max_depth',
            ScopeInterface::SCOPE_STORE
        );
        if ($navigationMaxDepth > 0) {
            $this->addLevelFilter($navigationMaxDepth);
        }
        return $this;
    }
}
