<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Entity;

use Cjsaylor\Domain\Behavior\ArraySerializable;

trait EntityTrait
{

    /**
     * Initialize the entity with data.
     *
     * @param array $initialData
     * @return void
     */
    public function initialize(array $initialData = []) : void
    {
        foreach ($initialData as $key => $value) {
            $this[$key] = $value;
        }
    }

    /**
     * Array representation of this entity.
     *
     * @return array
     */
    public function toArray() : array
    {
        $output = [];
        foreach ($this->data as $key => $val) {
            $output[$key] = $val instanceof ArraySerializable ? $val->toArray() : $val;
        }
        return $output;
    }
}
