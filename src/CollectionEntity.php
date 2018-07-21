<?php declare(strict_types=1);

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\Collection\CollectionInterface;
use Cjsaylor\Domain\Entity\EntityInterface;
use Cjsaylor\Domain\Behavior\Accessable;
use Cjsaylor\Domain\Behavior\Iteratable;
use Cjsaylor\Domain\Behavior\Countable;
use Cjsaylor\Domain\Collection\CollectionTrait;
use Cjsaylor\Domain\Collection\Collectable;
use Cjsaylor\Domain\Entity\EntityTrait;

abstract class CollectionEntity implements CollectionInterface, EntityInterface, Collectable
{
    use Accessable, Iteratable, Countable;
    use CollectionTrait {
        CollectionTrait::toArray as collectionToArray;
    }
    use EntityTrait {
        EntityTrait::toArray as entityToArray;
    }

    /**
     * Array of Entities.
     *
     * @var \ArrayObject
     */
    protected $entries;

    /**
     * Constructor.
     *
     * @param array $initialEntityData
     */
    public function __construct(array $initialEntityData = [])
    {
        $this->entries = new \ArrayObject();
        $this->initialize($initialEntityData);
    }

    /**
     * Array representation of this collection entity.
     * @return array
     */
    public function toArray() : array
    {
        $output = $this->entityToArray();
        $output['entries'] = $this->collectionToArray();

        return $output;
    }
}
