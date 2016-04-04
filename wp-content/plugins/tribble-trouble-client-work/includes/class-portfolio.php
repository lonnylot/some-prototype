<?php
/**
 * Tribble Trouble Client Work Portfolio
 *
 * @version 0.1.0
 * @package Tribble Trouble Client Work
 */



class TTCW_Portfolio extends CPT_Core {
	/**
	 * Parent plugin class
	 *
	 * @var class
	 * @since  0.1.0
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 * Register Custom Post Types. See documentation in CPT_Core, and in wp-includes/post.php
	 *
	 * @since  0.1.0
	 * @param  object $plugin Main plugin object.
	 * @return void
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();

		// Register this cpt
		// First parameter should be an array with Singular, Plural, and Registered name.
		parent::__construct(
			array( __( 'Portfolio', 'tribble-trouble-client-work' ), __( 'Portfolios', 'tribble-trouble-client-work' ), 'ttcw-portfolio' ),
			array(
				'supports' => array( 'title', 'thumbnail' ),
				'public'				=> false,
				'has_archive'		=> false,
				'rewrite' 			=> false,
			)
		);
	}

	/**
	 * Initiate our hooks
	 *
	 * @since  0.1.0
	 * @return void
	 */
	public function hooks() {
		add_action( 'cmb2_admin_init', array( $this, 'fields' ) );
	}

	/**
	 * Add custom fields to the CPT
	 *
	 * @since  0.1.0
	 * @return void
	 */
	public function fields() {
		$prefix = 'ttcw_portfolio_';

		$cmb = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'Tribble Trouble Client Work Portfolio Meta Box', 'tribble-trouble-client-work' ),
			'object_types'  => array( 'ttcw-portfolio' )
		) );

		$cmb->add_field( array(
				'name' => __( 'Website URL', 'tribble-trouble-client-work' ),
        'desc' => __( 'URL to see the work', 'tribble-trouble-client-work' ),
        'id'   => $prefix . 'website_url',
        'type' => 'text_url',
        'protocols' => array('http', 'https'), // Array of allowed protocols
        'repeatable' => false,
		) );
	}

	/**
	 * Registers admin columns to display. Hooked in via CPT_Core.
	 *
	 * @since  0.1.0
	 * @param  array $columns Array of registered column names/labels.
	 * @return array          Modified array
	 */
	public function columns( $columns ) {
		$new_column = array(
			'website_url' => __( 'Website URL', 'tribble-trouble-client-work' )
		);
		return array_merge( $columns, $new_column );
	}

	/**
	 * Handles admin column display. Hooked in via CPT_Core.
	 *
	 * @since  0.1.0
	 * @param array $column  Column currently being rendered.
	 * @param int   $post_id ID of post to display column for.
	 */
	public function columns_display( $column, $post_id ) {
		switch ( $column ) {
			case 'website_url': {
				$website_url = get_post_meta($post_id, 'ttcw_portfolio_website_url', true);
				echo sprintf('<a href="%s" target="%s">%10.20s&hellip;</a>', esc_url($website_url), 'website-'.$post_id, esc_html($website_url) );
				break;
			}
		}
	}
}
