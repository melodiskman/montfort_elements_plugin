<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Canvas_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_canvas';
	}

	public function get_title() {
		return esc_html__( 'Montfort WebGL Canvas', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-code-highlight';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'montfort-elements' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'canvas_id',
			[
				'label' => esc_html__( 'Canvas Wrapper ID', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'canvas-wrapper',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div id="<?php echo esc_attr( $settings['canvas_id'] ); ?>" data-astro-transition-persist="webgl" aria-hidden="true">
			<canvas data-engine="three.js r169" width="1640" height="2360" style="width: 820px; height: 1180px;"></canvas>
		</div>
		<?php
	}
}
