<?php

namespace Cjsaylor\Test\Domain;

use Cjsaylor\Domain\Behavior\PropertyLimitable;
use Cjsaylor\Domain\Behavior\PropertyLimitTrait;

class TestConcreteEntity extends TestEntity implements PropertyLimitable {
	use PropertyLimitTrait;

	public function concreteAttributes() : array {
		return ['id', 'name'];
	}

}
