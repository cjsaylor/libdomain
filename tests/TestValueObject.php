<?php

namespace Cjsaylor\Test\Domain;

use \Cjsaylor\Domain\ValueObject;

class TestValueObject extends ValueObject {

	public function __construct($value) {
		$this->data['value'] = $value;
	}

	public function __toString() {
		return $this->data['value'];
	}

}
