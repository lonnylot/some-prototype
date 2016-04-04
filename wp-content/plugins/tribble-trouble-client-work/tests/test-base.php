<?php

class BaseTest extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'Tribble_Trouble_Client_Work') );
	}
	
	function test_get_instance() {
		$this->assertTrue( tribble_trouble_client_work() instanceof Tribble_Trouble_Client_Work );
	}
}
