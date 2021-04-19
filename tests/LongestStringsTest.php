<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */

/**
 * LongestStringsTest
 * 
 * Test various methods of LongestStrings collection.
 */
class LongestStringsTest extends TestCase {

	/**
	 * Test empty construct
	 * 
	 * Create an empty instance of LongestStrings, check if item count is 0.
	 */
	function testEmptyConstruct() {
		$strings = new LongestStrings();
		$this->assertEquals(0, $strings->count());
	}
	
	/**
	 * Test filled construct
	 * 
	 * Create a new instance of LongestStrings with 10 predefined items.
	 */
	function testFilledConstruct() {
		$strings = new LongestStrings(10);
		$this->assertEquals(10, $strings->count());
	}
	
	/**
	 * Test get valid item
	 * 
	 * Check if an existing item can be accessed.
	 */
	function testGetValidItem() {
		$strings = new LongestStrings(10);
		$this->assertInstanceOf(LongestString::class, $strings->getItem(5));
	}

	/**
	 * Test get Invalid Item
	 * 
	 * Checks if accessing a non-existing item throws an OutOfBoundsException.
	 */
	function testGetInvalidItem() {
		$strings = new LongestStrings();
		$this->expectException(OutOfBoundsException::class);
		$strings->getItem(5);
	}
	
	/**
	 * Test add item return
	 * 
	 * Test whether an item can be added and accessed.
	 */
	function testAddItemReturn() {
		$item = new LongestString();
		$strings = new LongestStrings();
		$strings->addItem($item);
		$this->assertInstanceOf(LongestString::class, $strings->getItem(0));
	}

	/**
	 * Test add item count
	 * 
	 * Test if item count increases after adding an item.
	 */
	function testAddItemCount() {
		$item = new LongestString();
		$strings = new LongestStrings();
		$strings->addItem($item);
		$this->assertEquals(1, $strings->count());
	}
	
	/**
	 * Test add items
	 * 
	 * Test if several items can be added as an array and item count is correct.
	 */
	function testAddItems() {
		$items = array();
		$items[] = new LongestString();
		$items[] = new LongestString();
		$strings = new LongestStrings(3);
		$strings->addItems($items);
		$this->assertEquals(5, $strings->count());
	}

	/**
	 * Test get items
	 * 
	 * Test if all items will be returned as an array.
	 */
	function testGetItems() {
		$items = array();
		$items[] = new LongestString();
		$items[] = new LongestString();
		$strings = new LongestStrings();
		$strings->addItems($items);
		$this->assertEquals($items, $strings->getItems());
	}


}
