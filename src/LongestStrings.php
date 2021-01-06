<?php
/**
 * @copyright (c) 2021, Claus-Christoph Küthe
 * @author Claus-Christoph Küthe <plibv4@vm01.telton.de>
 * @license LGPLv2.1
 */
class LongestStrings {
	private $items = array();
	private $encoding = "UTF-8";
	/**
	 * 
	 * @param type $predefined Instantiate n instances of LongestString
	 * @param type $encoding
	 */
	function __construct($predefined = 0, $encoding = "UTF-8") {
		$this->encoding = $encoding;
		for($i=0;$i<$predefined;$i++) {
			$this->items[$i] = new LongestString($this->encoding);
		}
	}
	
	/**
	 * Add item
	 * 
	 * Adds another LongestString item.
	 * @param LongestString $item
	 */
	function addItem(LongestString $item) {
		$this->items[] = $item;
	}
	
	/**
	 * Add array of items
	 * 
	 * Add an array of LongestString instances.
	 * @param array $items
	 */
	function addItems(array $items) {
		#No array_merge, to take advantage of PHP's type hinting.
		foreach($items as $value) {
			$this->addItem($value);
		}
	}
	
	/**
	 * Get items as array
	 * @return array
	 */
	function getItems(): array {
		return $this->items;
	}

	/**
	 * Get item count
	 * 
	 * Get current amount of items.
	 * @return int
	 */
	function count(): int {
		return count($this->items);
	}
	
	/**
	 * Get item
	 * 
	 * Gets specific item by index.
	 * @param int $item
	 * @return LongestString
	 * @throws OutOfBoundsException
	 */
	function getItem(int $item): LongestString {
		if(!isset($this->items[$item])) {
			throw new OutOfBoundsException("item ".$item." does not exist");
		}
		return $this->items[$item];
	}
}