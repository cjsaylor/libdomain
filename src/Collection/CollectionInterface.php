<?php

namespace Cjsaylor\Domain\Collection;

use Cjsaylor\Domain\Behavior\ArraySerializable;

interface CollectionInterface extends \IteratorAggregate, \Countable, ArraySerializable {
}
