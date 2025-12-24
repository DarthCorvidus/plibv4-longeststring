<?php
declare(strict_types=1);
namespace plibv4\longeststring;
use PHPUnit\Framework\TestCase;
use OutOfBoundsException;
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
final class LongestStringsTest extends TestCase {

	/**
	 * Test empty construct
	 *
	 * Create an empty instance of LongestStrings, check if item count is 0.
	 */
	function testEmptyConstruct(): void {
		$strings = new LongestStrings();
		$this->assertEquals(0, $strings->count());
	}
	
	/**
	 * Test filled construct
	 *
	 * Create a new instance of LongestStrings with 10 predefined items.
	 */
	function testFilledConstruct(): void {
		$strings = new LongestStrings(10);
		$this->assertEquals(10, $strings->count());
	}
	
	/**
	 * Test get valid item
	 *
	 * Check if an existing item can be accessed.
	 */
	function testGetValidItem(): void {
		$strings = new LongestStrings(10);
		$this->assertInstanceOf(LongestString::class, $strings->getItem(5));
	}

	/**
	 * Test get Invalid Item
	 *
	 * Checks if accessing a non-existing item throws an OutOfBoundsException.
	 */
	function testGetInvalidItem(): void {
		$strings = new LongestStrings();
		$this->expectException(OutOfBoundsException::class);
		$strings->getItem(5);
	}
	
	/**
	 * Test add item return
	 *
	 * Test whether an item can be added and accessed.
	 */
	function testAddItemReturn(): void {
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
	function testAddItemCount(): void {
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
	function testAddItems(): void {
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
	function testGetItems(): void {
		$items = array();
		$items[] = new LongestString();
		$items[] = new LongestString();
		$strings = new LongestStrings();
		$strings->addItems($items);
		$this->assertEquals($items, $strings->getItems());
	}


}
