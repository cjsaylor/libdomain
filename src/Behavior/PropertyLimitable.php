<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Behavior;

interface PropertyLimitable
{

    /**
     * Get a list of attributes that are allowed to be set.
     *
     * @return array
     */
    public function concreteAttributes() : array;
}
