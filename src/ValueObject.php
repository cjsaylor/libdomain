<?php

namespace Cjsaylor\Domain;

use Cjsaylor\Domain\ValueObject\ValueObjectInterface;
use Cjsaylor\Domain\Behavior\ReadAccessable;

abstract class ValueObject implements ValueObjectInterface {
	use ReadAccessable;

	/**
	 * Value object data store.
	 *
	 * @var array
	 */
	protected $data = [];
}
