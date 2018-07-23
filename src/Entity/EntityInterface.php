<?php declare(strict_types=1);

namespace Cjsaylor\Domain\Entity;

use Cjsaylor\Domain\Behavior\ArraySerializable;

interface EntityInterface extends \ArrayAccess, ArraySerializable
{
	public function initialize(array $data = []) : void;
}
