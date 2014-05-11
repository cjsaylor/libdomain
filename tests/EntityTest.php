<?php

namespace Cjsaylor\Test\Domain;

class EntityTest extends \PHPUnit_Framework_TestCase {

	public function testEntityAccessable() {
		$entity = new TestEntity(['entry1' => 1, 'entry2' => true]);
		$this->assertSame(1, $entity['entry1']);
		$this->assertTrue($entity['entry2']);
	}

	public function testEntityAccessableSet() {
		$entity = new TestEntity();
		$entity['entry1'] = 1;
		$this->assertSame(1, $entity['entry1']);
	}

	public function testAccessIsset() {
		$entity = new TestEntity(['entry1' => 1]);
		$this->assertTrue(isset($entity['entry1']));
		$this->assertFalse(isset($entity['non-exist']));
	}

	public function testUnset() {
		$entity = new TestEntity(['entry1' => 1]);
		unset($entity['entry1']);
		$this->assertFalse(isset($entity['entry1']));
	}

	public function testAccessableCallback() {
		$entity = $this->getMock('\Cjsaylor\Test\Domain\TestEntity', ['setId', 'setComplexStringWithUnderscores']);
		$entity
			->expects($this->once())
			->method('setId')
			->with('1');
		$entity
			->expects($this->exactly(3))
			->method('setComplexStringWithUnderscores')
			->with('value1');
		$entity['id'] = '1';
		$entity['complex_string_with_underscores'] = 'value1';
		$entity['complexStringWithUnderscores'] = 'value1';
		$entity['complexString_With_underscores'] = 'value1';
	}

}

