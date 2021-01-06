<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
class LongestStringsTest extends TestCase {
	function testEmptyConstruct() {
		$strings = new LongestStrings();
		$this->assertEquals(0, $strings->count());
	}
	
	function testFilledConstruct() {
		$strings = new LongestStrings(10);
		$this->assertEquals(10, $strings->count());
	}
	
	function testGetValidItem() {
		$strings = new LongestStrings(10);
		$this->assertInstanceOf(LongestString::class, $strings->getItem(5));
	}

	function testGetInvalidItem() {
		$strings = new LongestStrings();
		$this->expectException(OutOfBoundsException::class);
		$strings->getItem(5);
	}
	
	function testAddItemReturn() {
		$item = new LongestString();
		$strings = new LongestStrings();
		$strings->addItem($item);
		$this->assertInstanceOf(LongestString::class, $strings->getItem(0));
	}

	function testAddItemCount() {
		$item = new LongestString();
		$strings = new LongestStrings();
		$strings->addItem($item);
		$this->assertEquals(1, $strings->count());
	}
	
	function testAddItems() {
		$items = array();
		$items[] = new LongestString();
		$items[] = new LongestString();
		$strings = new LongestStrings(3);
		$strings->addItems($items);
		$this->assertEquals(5, $strings->count());
	}
	
	function testGetItems() {
		$items = array();
		$items[] = new LongestString();
		$items[] = new LongestString();
		$strings = new LongestStrings();
		$strings->addItems($items);
		$this->assertEquals($items, $strings->getItems());
	}


}
