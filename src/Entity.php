<?php declare(strict_types=1);

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\Entity\EntityInterface;
use Cjsaylor\Domain\Behavior\Accessable;
use Cjsaylor\Domain\Entity\EntityTrait;
use Cjsaylor\Domain\Collection\Collectable;

abstract class Entity implements EntityInterface, Collectable
{
    use Accessable, EntityTrait;

    /**
     * Data container.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Construct.
     *
     * @param array $initialData
     */
    public function __construct(array $initialData = [])
    {
        $this->initialize($initialData);
    }
}
