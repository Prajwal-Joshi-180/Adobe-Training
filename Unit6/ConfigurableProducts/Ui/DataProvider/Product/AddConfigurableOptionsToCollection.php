<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit6\ConfigurableProducts\Ui\DataProvider\Product;

use Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable\Attribute\Collection as AttributesCol;
use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface;

/**
 * Class AddConfigurableOptionsToCollection
 * AddConfigurableOptionsToCollection implements AddFilterToCollectionInterface
 */
class AddConfigurableOptionsToCollection implements AddFilterToCollectionInterface
{
    /**
     * @var AttributesCol $attributeCollection
     */
    protected $attributeCollection = null;

    /**
     * AddConfigurableOptionsToCollection constructor.
     *
     * @param AttributesCol $collection
     */
    public function __construct(AttributesCol $collection)
    {
        $this->attributeCollection = $collection;
    }

    /**
     * * Argument
     *
     * @param Collection $collection
     * @param string $field
     * @param string $condition
     */
    public function addFilter(Collection $collection, $field, $condition = null)
    {
        if (isset($condition['eq']) && ($numberOfOptions = $condition['eq'])) {
            $select = $this->attributeCollection->getSelect()
                ->reset(\Magento\Framework\DB\Select::COLUMNS)
                ->columns(['product_id', 'COUNT(*) as cnt'])
                ->group('product_id');

            $res = $this->attributeCollection->getConnection()->fetchAll($select);

            $ids = [];
            foreach ($res as $opt) {
                if ($opt['cnt'] == $numberOfOptions) {
                    $ids[] = $opt['product_id'];
                }
            }
            $collection->addFieldToFilter('entity_id', ['in' => $ids]);
        }
    }
}
