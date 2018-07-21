<?php

namespace Cjsaylor\Test\Domain\Collection;

use Cjsaylor\Test\Domain\TestCollectionEntity;
use Cjsaylor\Test\Domain\TestEntity;
use PHPUnit\Framework\TestCase;

class CollectionEntityTest extends TestCase {

	public function testAll() {
		$collectionEntity = new TestCollectionEntity(['id' => 1]);
		$this->assertSame(1, $collectionEntity['id']);
	}

	public function testToArray() {
		$collectionEntity = new TestCollectionEntity(['id' => 1]);
		$collectionEntity->add(new TestEntity(['foo' => 'bar']));
		$expected = [
			'id' => 1,
			'entries' => [
				['foo' => 'bar']
			]
		];
		$this->assertEquals($expected, $collectionEntity->toArray());
	}

}
