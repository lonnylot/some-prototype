<?php

class BCRM_Client_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'BCRM_Client') );
	}

	function test_class_access() {
		$this->assertTrue( basic_crm()->client instanceof BCRM_Client );
	}

  function test_cpt_exists() {
    $this->assertTrue( post_type_exists( 'bcrm-client' ) );
  }
}
