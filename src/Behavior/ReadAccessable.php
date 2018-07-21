<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Behavior;

trait ReadAccessable
{
    use Accessable {
        Accessable::offsetSet as private traitOffsetSet;
        Accessable::offsetUnset as private traitOffsetUnset;
    }

    /**
     * Disallow setting a value.
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    final public function offsetSet($offset, $value) : void
    {
        throw new \LogicException('Writing to a read only attribute.');
    }

    /**
     * Disallow unsetting a key.
     *
     * @param string $offset
     * @return void
     */
    final public function offsetUnset($offset) : void
    {
        throw new \LogicException('Writing to a read only attribute.');
    }

    /**
     * Disallow setting properties.
     *
     * @param string $name
     * @param string $value
     * @return void
     * @throws \LogicException
     */
    final public function __set($name, $value) : void
    {
        throw new \LogicException('Writing to public properties.');
    }
}
