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

}

