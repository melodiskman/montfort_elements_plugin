<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Equality_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_equality';
	}

	public function get_title() {
		return esc_html__( '13. Montfort Equality', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-person';
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
			'section_index',
			[
				'label' => esc_html__( 'Section Index', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '3',
			]
		);

		$this->add_control(
			'headline',
			[
				'label' => esc_html__( 'Headline', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'OUR COMMITMENT TO EQUALITY',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We strive to create an environment where everyone can thrive and contribute to our success.',
			]
		);

		$this->add_control(
			'second_description',
			[
				'label' => esc_html__( 'Second Description', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We are proud that our staff come from almost 27 nationalities across five continents. We are committed to equality, with over 35% of our global team being female. We are proud to share that over 22% of our management team are women, reflecting our dedication to empowering women in leadership.',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section data-chapter="Equality" id="Equality" data-label="Equality" class="section-equality grid"
				 data-astro-cid-rvf7guv4="">
			<div class="index-container fs-label dk:col-start-3 dk:col-end-5 lg:col-start-7 lg:col-end-9"
				 data-animation="FadeIn" data-astro-cid-x4brxzjs="">
				<?php echo esc_html( $settings['section_index'] ); ?>
			</div>
			<div class="line dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22" data-animation="Line"
				 data-astro-cid-x4brxzjs=""></div>
			<h2 class="fs-h2 dk:col-start-3 dk:col-end-22 lg:col-start-7 lg:col-end-22" data-animation="Title"
				data-animation-color="#ffffff" data-astro-cid-x4brxzjs="">
				<?php echo wp_kses_post( $settings['headline'] ); ?>
			</h2>
			<div class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12"
				 data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo wp_kses_post( $settings['description'] ); ?>
			</div>
			<div class="second-description fs-body white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22"
				 data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-rvf7guv4="">
				<?php echo wp_kses_post( $settings['second_description'] ); ?>
			</div>
		</section>
		<?php
	}
}
