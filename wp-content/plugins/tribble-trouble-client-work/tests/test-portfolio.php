<?php

class TTCW_Portfolio_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'TTCW_Portfolio') );
	}

	function test_class_access() {
		$this->assertTrue( tribble_trouble_client_work()->portfolio instanceof TTCW_Portfolio );
	}

  function test_cpt_exists() {
    $this->assertTrue( post_type_exists( 'ttcw-portfolio' ) );
  }
}
