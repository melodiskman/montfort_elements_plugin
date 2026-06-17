<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Social_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_social';
	}

	public function get_title() {
		return esc_html__( '14. Montfort Social & CSR', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-slideshow';
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
				'default' => '4',
			]
		);

		$this->add_control(
			'headline',
			[
				'label' => esc_html__( 'Headline', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'OUR PLEDGE TO CORPORATE SOCIAL RESPONSIBILITY',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Giving back to our communities is an imperative part of the work we do. Montfort Group’s CSR efforts are centered around three pillars: supporting education, alleviating poverty, and empowering women.',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_title', [
				'label' => esc_html__( 'Slide Title', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Slide Title' , 'montfort-elements' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_text', [
				'label' => esc_html__( 'Slide Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'slide_image', [
				'label' => esc_html__( 'Slide Image', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$logo_repeater = new \Elementor\Repeater();
		$logo_repeater->add_control(
			'logo_image', [
				'label' => esc_html__( 'Logo Image', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$logo_repeater->add_control(
			'logo_alt', [
				'label' => esc_html__( 'Logo Alt Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'logos',
			[
				'label' => esc_html__( 'Logos', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $logo_repeater->get_controls(),
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => esc_html__( 'Slides', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slide_title' => 'Alleviating Poverty',
						'slide_text' => 'With the help of local NGOs, we support the communities where we invest. Montfort has successfully financed clean water projects, initiatives for orphaned children, earthquake relief, food distribution, and medical support for those in need.',
						'logos' => [
							[ 'logo_alt' => 'Mercy Ships' ],
							[ 'logo_alt' => 'Mercy Corps' ],
							[ 'logo_alt' => 'Kenya Red Cross' ],
							[ 'logo_alt' => 'Emirates Red Crescent' ],
						]
					],
					[
						'slide_title' => 'Empowering Women',
						'slide_text' => "We are 'Creating Experts Through Education' in collaboration with The Doyenne Initiative, a non-profit organization that drives female experts to take on industry, education, and government leadership roles.",
						'logos' => [
							[ 'logo_alt' => 'Doyenne Initiative' ],
						]
					],
					[
						'slide_title' => 'Supporting Education',
						'slide_text' => 'We aim to help children secure a future for themselves through the support of education. We provide opportunities for success by building schools, funding scholarship programs and renewable energy projects, and supplying drinking water for schools.',
						'logos' => [
							[ 'logo_alt' => 'Alsama' ],
							[ 'logo_alt' => 'Hope for Cancer Kids' ],
						]
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="section-social" data-astro-cid-232lwzcd="">
			<div class="grid" data-astro-cid-232lwzcd="">
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
				<p class="description fs-s1 white dk:col-start-12 dk:col-end-23 lg:col-start-13 lg:col-end-22"
				   data-animation="SplitBlock" data-animation-color="#ffffff" data-astro-cid-232lwzcd="">
					<?php echo wp_kses_post( $settings['description'] ); ?>
				</p>
			</div>
			<div class="grid-no-margin dk:grid" data-astro-cid-232lwzcd="">
				<div class="images-container dk:col-start-7 dk:col-end-22 lg:col-start-9 lg:col-end-22"
					 data-animation="ImagesContainer" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $item ) : ?>
						<div class="slide" data-astro-cid-232lwzcd="">
							<div class="image-container" data-astro-cid-232lwzcd="">
								<?php if ( ! empty( $item['slide_image']['url'] ) ) : ?>
									<img src="<?php echo esc_url( $item['slide_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['slide_title'] ); ?>" data-astro-cid-uvauvyym="true">
								<?php endif; ?>
							</div>
							<div class="content-mb-wrapper" data-astro-cid-232lwzcd="">
								<h3 class="label fs-label white" data-animation="Title" data-animation-color="#ffffff"
									data-astro-cid-232lwzcd="">
									<?php echo esc_html( $item['slide_title'] ); ?>
								</h3>
								<p class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff"
									data-astro-cid-232lwzcd="">
									<?php echo wp_kses_post( $item['slide_text'] ); ?>
								</p>
								<div class="logo-container" data-astro-cid-232lwzcd="">
									<?php foreach ( $item['logos'] as $logo ) : ?>
										<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
											<?php if ( ! empty( $logo['logo_image']['url'] ) ) : ?>
												<img src="<?php echo esc_url( $logo['logo_image']['url'] ); ?>" alt="<?php echo esc_attr( $logo['logo_alt'] ); ?>" data-astro-cid-uvauvyym="true">
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="navigation-social-dk dk:col-start-6 dk:col-end-10 lg:col-start-10 lg:col-end-13"
					 data-animation="Navigation" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $item ) : ?>
						<button class="navigation-social-button" aria-label="Show slide <?php echo $index + 1; ?>" data-astro-cid-232lwzcd="">
							<div class="navigation-social-item <?php echo $index === 0 ? 'active' : ''; ?>" data-astro-cid-232lwzcd=""></div>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="content-social-dk dk:col-start-11 dk:col-end-22 lg:col-start-13 lg:col-end-22"
					 id="content-social-dk" data-astro-cid-232lwzcd="">
					<?php foreach ( $settings['slides'] as $index => $item ) : ?>
						<div class="content-social-item" data-astro-cid-232lwzcd=""
							 style="<?php echo $index === 0 ? 'opacity: 1; pointer-events: auto;' : 'pointer-events: none; opacity: 0;'; ?>">
							<h3 class="label fs-label white" data-animation="FadeIn" data-astro-cid-232lwzcd="">
								<?php echo esc_html( $item['slide_title'] ); ?>
							</h3>
							<p class="body fs-body white" data-animation="SplitBlock" data-animation-color="#ffffff"
							   data-astro-cid-232lwzcd="">
								<?php echo wp_kses_post( $item['slide_text'] ); ?>
							</p>
							<div class="logo-container" data-astro-cid-232lwzcd="">
								<?php foreach ( $item['logos'] as $logo ) : ?>
									<div class="logo-item" data-animation="FadeIn" data-astro-cid-232lwzcd="">
										<?php if ( ! empty( $logo['logo_image']['url'] ) ) : ?>
											<img src="<?php echo esc_url( $logo['logo_image']['url'] ); ?>" alt="<?php echo esc_attr( $logo['logo_alt'] ); ?>" data-astro-cid-uvauvyym="true">
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}
}
