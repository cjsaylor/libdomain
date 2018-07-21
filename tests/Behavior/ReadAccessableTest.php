<?php

namespace Cjsaylor\Test\Domain\Behavior;

use Cjsaylor\Test\Domain\TestValueObject;
use PHPUnit\Framework\TestCase;

class ReadAccessableTest extends TestCase {

	public function testAccess() {
		$value = new TestValueObject('a');
		$this->assertSame('a', $value['value']);
		$this->assertSame('a', (string)$value);
	}

	/**
	 * @expectedException \LogicException
	 */
	public function testInvalidAccess() {
		$value = new TestValueObject('a');
		$value['value'] = 'b';
	}

	/**
	 * @expectedException \LogicException
	 */
	public function testInvalidUnset() {
		$value = new TestValueObject('a');
		unset($value['value']);
	}

}
