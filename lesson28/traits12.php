<?php
trait PropertiesTrait {
	public $same = true;
	public $different = false;
}
class PropertiesExample {
	use PropertiesTrait;
	public $same = true; // Strict Standards
	public $different = true; // 致命错误
}
?>