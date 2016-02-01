<?php
class WP_Fields_API_Debug_Bar_Panel extends Debug_Bar_Panel {

	/**
	 * Panel menu title
	 */
	public $title;

	/**
	 * Dummy construct method
	 */
	public function __construct() { }

	/**
	 * Initial debug bar stuff
	 */
	public function setup() {

		$this->title( esc_html__( 'Fields API', 'debug-bar' ) );

	}

	/**
	 * Get class instance
	 *
	 * @return object
	 */
	public static function factory() {

		static $instance;

		if ( empty( $instance ) ) {
			$instance = new self();
			$instance->setup();
		}

		return $instance;

	}

	/**
	 * Show the menu item in Debug Bar.
	 */
	public function prerender() {

		$this->set_visible( true );

	}

	/**
	 * Show the contents of the panel
	 */
	public function render() {

		if ( ! class_exists( 'WP_Fields_API' ) && ! class_exists( 'Fields_API' ) ) {
			esc_html_e( 'Fields API not activated.', 'fields-api-debug-bar' );

			return;
		}

		/**
		 * @var $wp_fields WP_Fields_API
		 */
		global $wp_fields;

		$stats = $wp_fields->get_stats();
?>
	<ul class="wpd-queries">
		<?php
			foreach ( $stats as $type => $count ) {
				$type = str_replace( '-', ' ', $type );
				$type = ucwords( $type );

				$count = number_format_i18n( $count, 0 );
		?>
			<li><strong><?php echo esc_html( $type ); ?>:</strong> <?php echo esc_html( $count ); ?></li>
		<?php
			}
		?>
	</ul>
<?php

	}
}
