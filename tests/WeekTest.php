<?php

namespace Lucandrade\Test;

use Lucandrade\Test\TestCase;
use Lucandrade\Week;

class WeekTest extends TestCase
{

	protected $class;

	public function setUp()
	{
		$this->class = new Week;
	}

	public function testShouldClassExists()
	{
		$this->assertTrue(class_exists('\Lucandrade\Week'));
	}

	public function testShouldReturnDays()
	{
		$this->assertInternalType('array', $this->class->getDays());
		$this->assertEquals(7, count($this->class->getDays()));
	}

	public function testShouldReturnDayFromInteger()
	{
		$this->assertEquals('segunda', $this->class->getDayFromInteger(1));
	}

	public function testShouldReturnListDaysFromInteger()
	{
		/**
		 * Inteiro 3
		 * 0 0 0 0 0 1 1
		 * terca
		 */
		$days = $this->class->getDaysFromInteger(3);
		$this->assertContains('segunda', $days);
		$this->assertContains('terca', $days);
		$this->assertNotContains('quarta', $days);
		$this->assertNotContains('quinta', $days);
		$this->assertNotContains('sexta', $days);
		$this->assertNotContains('sabado', $days);
		$this->assertNotContains('domingo', $days);
		/**
		 * Inteiro 80
		 * 1 0 1 0 0 0 0
		 * domingo | sexta
		 */
		$days = $this->class->getDaysFromInteger(80);
		$this->assertNotContains('segunda', $days);
		$this->assertNotContains('terca', $days);
		$this->assertNotContains('quarta', $days);
		$this->assertNotContains('quinta', $days);
		$this->assertContains('sexta', $days);
		$this->assertNotContains('sabado', $days);
		$this->assertContains('domingo', $days);
		/**
		 * Inteiro 10
		 * 0 0 0 1 0 1 0
		 * quinta | terca
		 */
		$days = $this->class->getDaysFromInteger(10);
		$this->assertNotContains('segunda', $days);
		$this->assertContains('terca', $days);
		$this->assertNotContains('quarta', $days);
		$this->assertContains('quinta', $days);
		$this->assertNotContains('sexta', $days);
		$this->assertNotContains('sabado', $days);
		$this->assertNotContains('domingo', $days);
	}
}