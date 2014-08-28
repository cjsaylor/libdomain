<?php

namespace Cjsaylor\Test\Domain\Behavior;

use Cjsaylor\Test\Domain\TestConcreteEntity;

class PropertyLimitTraitTest extends \PHPUnit_Framework_TestCase {

    public function testLimit() {
        $concrete = new TestConcreteEntity();
        $concrete['id'] = 1;
        $concrete['name'] = 'somename';
        $this->assertEquals(['id' => 1, 'name' => 'somename'], $concrete->toArray());
        $concrete['invalid'] = 'novalue';
        $this->assertNull($concrete['invalid']);
        $this->assertEquals(['id' => 1, 'name' => 'somename'], $concrete->toArray());
    }

}
