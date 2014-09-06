<?php

namespace Cjsaylor\Test\Domain\Collection;

use Cjsaylor\Test\Domain\TestCollection;
use Cjsaylor\Test\Domain\TestEntity;

class CollectionTest extends \PHPUnit_Framework_TestCase {

	public function testIteratable() {
		$collection = new TestCollection();
		$collection->add(new TestEntity(['foo' => 'bar']));
		$collection->add(new TestEntity(['foo' => 'bar2']));
		$expector = $this->getMock('stdClass', ['test']);
		$expector->expects($this->exactly(2))->method('test');
		foreach ($collection as $entry) {
			$this->assertInstanceOf('Cjsaylor\Test\Domain\TestEntity', $entry);
			$expector->test();
		}
	}

	public function testCountable() {
		$collection = new TestCollection();
		$collection->add(new TestEntity(['foo' => 'bar']));
		$collection->add(new TestEntity(['foo' => 'bar2']));
		$this->assertEquals(2, count($collection));
	}

	public function testEmpty() {
		$collection = new TestCollection();
		$this->assertTrue($collection->isEmpty());
		$collection->add(new TestEntity(['foo' => 'bar']));
		$this->assertFalse($collection->isEmpty());
	}

	public function testToArray() {
		$collection = new TestCollection();
		$collection->add(new TestEntity(['foo' => 'bar']));
		$expected = [
			['foo' => 'bar']
		];
		$this->assertEquals($expected, $collection->toArray());
	}

	public function testToArrayCascade() {
		$collection = new TestCollection();
		$subCollection = new TestCollection();
		$subCollection->add(new TestEntity(['id' => 1]));
		$subCollection->add(new TestEntity(['id' => 2]));
		$entity = new TestEntity(['id' => 0]);
		$entity['sub'] = $subCollection;
		$collection->add($entity);
		$expected = [
			[
				'id' => 0,
				'sub' => [
					['id' => 1],
					['id' => 2]
				]
			]
		];
		$this->assertEquals($expected, $collection->toArray());
	}

	public function testSubset() {
		$collection = new TestCollection();
		$collection->add(new TestEntity(['id' => 1]));
		$collection->add(new TestEntity(['id' => 2]));
		$collection->add(new TestEntity(['id' => 3]));
		$collection->add(new TestEntity(['id' => 4]));
		$subset = $collection->subset([2, 3]);
		$this->assertCount(4, $collection);
		$this->assertCount(2, $subset);
		$arrayCopy = $subset->getIterator()->getArrayCopy();
		$this->assertArrayNotHasKey(0, $arrayCopy);
		$this->assertArrayNotHasKey(1, $arrayCopy);
		$this->assertArrayHasKey(2, $arrayCopy);
		$this->assertArrayHasKey(3, $arrayCopy);
	}

}
