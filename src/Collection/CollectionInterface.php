<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Collection;

use Cjsaylor\Domain\Behavior\ArraySerializable;

interface CollectionInterface extends \IteratorAggregate, \Countable, ArraySerializable
{
}
