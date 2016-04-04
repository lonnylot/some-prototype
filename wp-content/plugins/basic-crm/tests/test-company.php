<?php

class BCRM_Company_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'BCRM_Company') );
	}

	function test_class_access() {
		$this->assertTrue( basic_crm()->company instanceof BCRM_Company );
	}
}
