<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Sound_Scroll_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_sound_scroll';
	}

	public function get_title() {
		return esc_html__( '05. Montfort Sound & Scroll Top', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-scroll-to-top';
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
			'theme',
			[
				'label' => esc_html__( 'Theme', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => [
					'light' => esc_html__( 'Light', 'montfort-elements' ),
					'dark'  => esc_html__( 'Dark', 'montfort-elements' ),
				],
			]
		);

		$this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Scroll Top Arrow Color', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#2D628C',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="sound" class="buttons-container" data-theme="<?php echo esc_attr( $settings['theme'] ); ?>" data-component="Sound"
			 data-astro-cid-epuvuop6="" style="pointer-events: none; opacity: 0;">
			<div class="buttons-wrapper grid" data-astro-cid-epuvuop6="">
				<div class="buttons-inner dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23"
					 data-astro-cid-epuvuop6="">
					<button id="scroll-top" class="scroll-top" data-astro-cid-epuvuop6=""
							style="pointer-events: auto; opacity: 1;">
						<svg data-astro-cid-epuvuop6="true" xmlns="http://www.w3.org/2000/svg" width="10" height="12"
							 fill="none" viewBox="0 0 10 12" focusable="false" aria-hidden="true">
							<path fill="<?php echo esc_attr( $settings['arrow_color'] ); ?>" fill-rule="evenodd"
								  d="M.87 3.982 4.464.386a.757.757 0 0 1 1.07 0L9.13 3.982a.757.757 0 1 1-1.07 1.07L5.757 2.748v8.331a.757.757 0 1 1-1.514 0V2.748L1.94 5.052a.757.757 0 1 1-1.07-1.07"
								  clip-rule="evenodd"
								  style="fill:<?php echo esc_attr( $settings['arrow_color'] ); ?>;fill-opacity:1"></path>
						</svg>
					</button>
					<button class="sound" data-astro-cid-epuvuop6="">
						<canvas id="sound-canvas" width="30" height="30" data-astro-cid-epuvuop6=""></canvas>
					</button>
				</div>
			</div>
		</div>
		<?php
	}
}
