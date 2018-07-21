<?php declare(strict_types=1);

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\Collection\CollectionInterface;
use Cjsaylor\Domain\Behavior\Iteratable;
use Cjsaylor\Domain\Behavior\Countable;
use Cjsaylor\Domain\Collection\CollectionTrait;
use Cjsaylor\Domain\Collection\Collectable;

abstract class Collection implements CollectionInterface, Collectable
{
    use Iteratable, Countable, CollectionTrait;

    /**
     * Array of Entities.
     *
     * @var \ArrayObject
     */
    protected $entries;

    /**
     * Constructor.
     *
     * @param Collectable[] ...$entries Optional entries to intialize the collection
     */
    public function __construct(Collectable ...$entries)
    {
        $this->entries = new \ArrayObject($entries);
    }
}
