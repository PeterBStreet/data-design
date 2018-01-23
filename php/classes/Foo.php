<?php
/**
 * Created by PhpStorm.
 * User: petersdata
 * Date: 1/22/18
 * Time: 10:15 AM
 */
class Foo {
	private $bar;
	public function __construct(bool $newBar) {
		$this->bar = $newBar;
	}
	public function getBar() :bool {
		return($this->bar);
	}
}
 $foo = new foo(false);
echo $foo->getBar();