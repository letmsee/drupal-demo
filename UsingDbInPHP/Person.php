<?php
include 'IPerson.php';
class Person implements IPerson {
	private static $staticProperty = 0;
	private $name;
	private $age;
	
	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;		
	}
	
	public function toString() {
		return "Name: $this->name, Age: $this->age, Max name length: " . self::MAX_NAME_LENGTH;
	}
}

class Student extends Person {
	private $university;

	public function __construct($name, $age, $university) {
		Person::__construct($name, $age);
		$this->university = $university;
	}
	
	public function toString() {
		return Person::toString() . ", University: $this->university";
	}
}
?>