<?php

namespace Cjsaylor\Test\Domain;

class CollectionEntityTest extends \PHPUnit_Framework_TestCase {

	public function testAll() {
		$collectionEntity = new TestCollectionEntity(['id' => 1]);
		$this->assertSame(1, $collectionEntity['id']);
	}

}
