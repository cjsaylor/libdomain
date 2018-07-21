<?php declare(strict_types=1);

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\ValueObject\ValueObjectInterface;
use Cjsaylor\Domain\Behavior\ReadAccessable;
use Cjsaylor\Domain\Collection\Collectable;

abstract class ValueObject implements ValueObjectInterface, Collectable
{
    use ReadAccessable;

    /**
     * Value object data store.
     *
     * @var array
     */
    protected $data = [];
}
