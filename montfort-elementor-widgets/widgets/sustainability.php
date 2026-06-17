<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Sustainability_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_sustainability';
	}

	public function get_title() {
		return esc_html__( 'Montfort Sustainability', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-leaf';
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
			'intro_text',
			[
				'label' => esc_html__( 'Intro Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We are committed to integrating our sustainability strategy with our pursuit of value — powering lives and respecting nature. We recognize the profound and lasting impact our decisions have on people, communities, and the environment.',
			]
		);

		$this->add_control(
			'section_index',
			[
				'label' => esc_html__( 'Section Index', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1',
			]
		);

		$this->add_control(
			'headline',
			[
				'label' => esc_html__( 'Headline', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Our ethics and compliance framework',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'At Montfort, we operate under an integrated Sustainability Framework and adhere to strict corporate governance principles that allow us drive transformative social and environmental progress.',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'paragraph', [
				'label' => esc_html__( 'Paragraph', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Paragraph content' , 'montfort-elements' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'paragraphs',
			[
				'label' => esc_html__( 'Main Paragraphs', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'paragraph' => 'We ensure compliance with all applicable laws and regulations across our global operations, including those of the UN, EU, Switzerland, UK, US, Singapore, and the UAE.' ],
					[ 'paragraph' => 'Prior to engaging with any counterparty, a thorough and rigorous external onboarding process is conducted for all our trade counterparties and vessels we employ.' ],
					[ 'paragraph' => 'Any products purchased, sold, or shipped by Montfort are in full compliance with all applicable laws and regulations, including those related to trade, sanctions, and anti-bribery & corruption (ABAC).' ],
					[ 'paragraph' => 'Using renowned global compliance platforms, we analyze the counterparty, their corporate structure, and their UBO.' ],
					[ 'paragraph' => 'Our processes are thoroughly in line with the leading standards and best practices of international companies.' ],
					[ 'paragraph' => 'We use our internally developed, digitized platform to onboard the counterparties. Our goal is to deliver products responsibly and reliably, upholding international standards and prioritizing health, safety, environmental, and social considerations in all our activities.' ],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-chapter="Sustainability" id="Sustainability" data-label="Sustainability" data-theme-chapters="dark">
			<section class="grid section-sustainability" data-astro-cid-arf6gcv7="">
				<p class="fs-h5 white dk:col-start-3 dk:col-end-14 lg:col-start-7 lg:col-end-14"
					data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="">
					<?php echo wp_kses_post( $settings['intro_text'] ); ?>
				</p>
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
				<p class="description fs-s1 white dk:col-start-3 dk:col-end-11 lg:col-start-7 lg:col-end-12"
				   data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="">
					<?php echo wp_kses_post( $settings['description'] ); ?>
				</p>
				<div class="paragraphs-container dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22"
					 data-astro-cid-arf6gcv7="">
					<?php foreach ( $settings['paragraphs'] as $item ) : ?>
						<p class="fs-body white" data-animation="FadeIn" data-animation-color="#ffffff" data-astro-cid-arf6gcv7="">
							<?php echo wp_kses_post( $item['paragraph'] ); ?>
						</p>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
		<?php
	}
}
