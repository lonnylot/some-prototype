<?php

class BaseTest extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'Basic_CRM') );
	}
	
	function test_get_instance() {
		$this->assertTrue( basic_crm() instanceof Basic_CRM );
	}
}
