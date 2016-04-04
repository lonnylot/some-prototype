<?php
/**
 * Basic CRM Client
 *
 * @version 0.0.0
 * @package Basic CRM
 */



class BCRM_Client extends CPT_Core {
	/**
	 * Parent plugin class
	 *
	 * @var class
	 * @since  NEXT
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
	 *
	 * @since  NEXT
	 * @param  object $plugin Main plugin object.
	 * @return void
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();

		// Register this cpt
		// First parameter should be an array with Singular, Plural, and Registered name.
		parent::__construct(
			array( __( 'Basic CRM Client', 'basic-crm' ), __( 'Basic CRM Clients', 'basic-crm' ), 'bcrm-client' ),
			array(
				'supports' 			=> false,
				'public'				=> false,
				'rewrite'				=> false,
				'has_archive'		=> false,
			)
		);
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  NEXT
	 * @return void
	 */
	public function hooks() {
		add_action( 'cmb2_admin_init', array( $this, 'fields' ) );
	}

	/**
	 * Add custom fields to the CPT
	 *
	 * @since  NEXT
	 * @return void
	 */
	public function fields() {
		global $post;
		$prefix = 'bcrm_client_';

		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'About', 'basic-crm' ),
			'object_types'  => array( 'bcrm-client' )
		) );

		$cmb->add_field( array(
		    'name'    => 'First Name',
		    'placeholder' => 'Lonny',
		    'id'      => 'first_name',
		    'type'    => 'text'
		) );

		$cmb->add_field( array(
		    'name'    => 'Last Name',
		    'placeholder' => 'Kapelushnik',
		    'id'      => 'last_name',
		    'type'    => 'text'
		) );

		$cmb->add_field( array(
		    'name' => 'Email',
		    'id'   => 'email',
		    'type' => 'text_email',
		) );

		$cmb->add_field( array(
		    'name'    => 'Job Title',
		    'placeholder' => 'Rebel Rouser',
		    'id'      => 'job_title',
		    'type'    => 'text',
		) );

		$cmb->add_field( array(
		    'name' => __( 'Website URL', 'basic-crm' ),
		    'id'   => 'website_url',
		    'type' => 'text_url',
		    'protocols' => array( 'http', 'https' ), // Array of allowed protocols
		) );

		$cmb->add_field( array(
		    'name' => 'Twitter Profile',
		    'id'   => 'twitter_profile',
		    'type' => 'text_url',
		    'protocols' => array( 'http', 'https' ), // Array of allowed protocols
		) );

		$cmb->add_field( array(
		    'name' => 'LinkedIn Profile',
		    'id'   => 'linkedin_profile',
		    'type' => 'text_url',
		    'protocols' => array( 'http', 'https' ), // Array of allowed protocols
		) );
	}

	/**
	 * Registers admin columns to display. Hooked in via CPT_Core.
	 *
	 * @since  NEXT
	 * @param  array $columns Array of registered column names/labels.
	 * @return array          Modified array
	 */
	public function columns( $columns ) {
		$new_column = array();
		return array_merge( $new_column, $columns );
	}

	/**
	 * Handles admin column display. Hooked in via CPT_Core.
	 *
	 * @since  NEXT
	 * @param array $column  Column currently being rendered.
	 * @param int   $post_id ID of post to display column for.
	 */
	public function columns_display( $column, $post_id ) {
		switch ( $column ) {
		}
	}
}
