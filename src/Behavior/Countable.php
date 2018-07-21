<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Behavior;

trait Countable
{

    /**
     * Countable interface method
     *
     * @return integer
     */
    public function count() : int
    {
        return count($this->getItems());
    }
}
