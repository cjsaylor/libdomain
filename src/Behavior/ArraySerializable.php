<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Behavior;

interface ArraySerializable
{

    /**
     * Array representation of this entity.
     *
     * @return array
     */
    public function toArray() : array;
}
