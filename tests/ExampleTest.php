<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;


class ExampleTest extends TestCase
{

	public function test_example()
	{
		$this->markTestSkipped("just an example");
		$this->assertEquals(4, 4);
	}
}
