<?php

namespace uuf6429\Rune\example\Context;

use uuf6429\Rune\Context\AbstractContext;
use uuf6429\Rune\Example\Model\Product;
use uuf6429\Rune\Util\ContextVariable;

class ProductContext extends AbstractContext
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * @param AbstractAction|null $action
     * @param Product|null        $product
     */
    public function __construct($action = null, $product = null)
    {
        $this->product = $product;
        parent::__construct($action);
    }

    protected function getFieldList()
    {
        return [
            new ContextVariable('product', Product::class),
        ];
    }

    protected function getValueList()
    {
        return [
            'product' => $this->product,
        ];
    }

    public function __toString()
    {
        return !$this->product ? '{{Incomplete Context}}'
            : ucwords(trim($this->product->colour.' '.$this->product->name));
    }
}