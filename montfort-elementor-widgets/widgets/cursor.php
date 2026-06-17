<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Cursor_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_cursor';
	}

	public function get_title() {
		return esc_html__( '01. Montfort Cursor', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-cursor-tracking';
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
			'config',
			[
				'label' => esc_html__( 'Config', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'default',
			]
		);

		$this->add_control(
			'theme',
			[
				'label' => esc_html__( 'Theme', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'light',
				'options' => [
					'light' => esc_html__( 'Light', 'montfort-elements' ),
					'dark'  => esc_html__( 'Dark', 'montfort-elements' ),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="cursor" class="cursor visible" data-component="Cursor" data-astro-cid-x6vourwi=""
			 data-config="<?php echo esc_attr( $settings['config'] ); ?>" data-theme="<?php echo esc_attr( $settings['theme'] ); ?>" style="transform: translate3d(-30px, 185px, 0px) rotate(0deg) scale(1);">
			<div class="inner" data-astro-cid-x6vourwi="">
				<div class="circle" data-astro-cid-x6vourwi=""></div>
				<div class="middle-dot" data-astro-cid-x6vourwi=""></div>
				<div class="dots dots-left" data-astro-cid-x6vourwi=""></div>
				<div class="dots dots-right" data-astro-cid-x6vourwi=""></div>
			</div>
		</div>
		<?php
	}
}
