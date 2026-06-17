<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Who_We_Are_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_who_we_are';
	}

	public function get_title() {
		return esc_html__( '08. Montfort Who We Are', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-info-circle';
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
			'title',
			[
				'label' => esc_html__( 'Title', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Montfort is a global commodity trading and asset investment company.',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'We trade, refine, store, and transport energy and commodities. We also invest in related assets and provide innovative services with integrity and efficiency to create long-term value for our clients.',
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Who we are',
			]
		);

		$this->add_control(
			'link_url',
			[
				'label' => esc_html__( 'Link URL', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '/who-we-are/',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-va4abrey" data-chapter="WhoWeAre" id="WhoWeAre" data-label="Who we are"
				 data-astro-cid-va4abrey="">
			<div class="grid" data-astro-cid-va4abrey="">
				<h2 data-animation="Title"
					class="fs-h2 uppercase tb:col-end-4 dk:col-start-10 dk:col-end-23 lg:col-start-14"
					data-astro-cid-va4abrey="" style="">
					<?php echo wp_kses_post( $settings['title'] ); ?>
				</h2>
				<div class="text-block dk:col-start-5 dk:col-end-13 lg:col-start-7" data-astro-cid-tbw6esjt="">
					<div class="content fs-s1 montfort-navy-blue" data-astro-cid-tbw6esjt="">
						<div class="content fs-s1 montfort-navy-blue" data-animation="TextBlock"
							 data-astro-cid-tbw6esjt="">
							<p>
								<?php echo wp_kses_post( $settings['description'] ); ?>
							</p>
						</div>
					</div>
					<a href="<?php echo esc_url( $settings['link_url']['url'] ); ?>" class="link-block montfort-navy-blue" data-animation="FadeIn"
					   data-astro-cid-chamlvsj="true">
						<div class="arrow-wrapper left" data-astro-cid-chamlvsj="">
							<div class="arrow-container left" data-astro-cid-chamlvsj="">
								<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10"
									 height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true">
									<path fill="currentColor"
										  d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path>
								</svg>
							</div>
						</div>
						<span class="link-block-label" data-astro-cid-chamlvsj=""><?php echo esc_html( $settings['link_text'] ); ?></span>
						<div class="arrow-wrapper right" data-astro-cid-chamlvsj="">
							<div class="arrow-container right" data-astro-cid-chamlvsj="">
								<svg data-astro-cid-chamlvsj="true" xmlns="http://www.w3.org/2000/svg" width="10"
									 height="10" fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true">
									<path fill="currentColor"
										  d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path>
								</svg>
							</div>
						</div>
					</a></div>
			</div>
		</section>
		<?php
	}
}
