<?php declare(strict_types=1);

namespace Shopware\Framework\Api2\ApiFilter;

class FilterRegistry
{
    /**
     * @var Filter[]
     */
    private $filters;

    public function __construct(Filter ... $filters)
    {
        $this->filters = $filters;
    }

    public function get(string $className): Filter
    {
        foreach($this->filters as $filter) {
            if($filter instanceof $className) {
                return $filter;
            }
        }

        throw new \InvalidArgumentException(sprintf('Unable to find %s', $className));
    }

}