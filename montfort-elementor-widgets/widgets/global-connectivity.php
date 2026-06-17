<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Global_Connectivity_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_global_connectivity';
	}

	public function get_title() {
		return esc_html__( 'Montfort Global Connectivity', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-globe';
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
			'headline',
			[
				'label' => esc_html__( 'Headline', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Established in the world’s major trade hubs and financial markets with over 15 global offices, we connect and serve both emerging and mature markets worldwide.',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'city_name', [
				'label' => esc_html__( 'City/Country Name', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'City' , 'montfort-elements' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'longitude', [
				'label' => esc_html__( 'Longitude', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0',
			]
		);

		$repeater->add_control(
			'latitude', [
				'label' => esc_html__( 'Latitude', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '0',
			]
		);

		$repeater->add_control(
			'transform_style', [
				'label' => esc_html__( 'Transform Style (CSS)', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'translate3d(-1160.43px, 544.73px, 0px)',
			]
		);

		$this->add_control(
			'points',
			[
				'label' => esc_html__( 'Global Points', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'city_name' => 'Switzerland', 'longitude' => '4', 'latitude' => '46.818188', 'transform_style' => 'translate3d(-1160.43px, 544.73px, 0px)' ],
					[ 'city_name' => 'Istanbul', 'longitude' => '24', 'latitude' => '41.00824', 'transform_style' => 'translate3d(-1185.14px, 645.844px, 0px)' ],
					[ 'city_name' => 'United Arab Emirates', 'longitude' => '54.35495', 'latitude' => '24.48818', 'transform_style' => 'translate3d(-978.471px, 1002.47px, 0px)' ],
					[ 'city_name' => 'Nairobi', 'longitude' => '36.828842', 'latitude' => '-1.3026148', 'transform_style' => 'translate3d(-1364.94px, 1629.59px, 0px)' ],
					[ 'city_name' => 'Dar es Salam', 'longitude' => '39.2803583', 'latitude' => '-6.8160837', 'transform_style' => 'translate3d(-1321.16px, 1771.78px, 0px)' ],
					[ 'city_name' => 'Cape Town', 'longitude' => '18.4172197', 'latitude' => '-33.9288301', 'transform_style' => 'translate3d(-1319.84px, 2340.85px, 0px)' ],
					[ 'city_name' => 'Mumbai', 'longitude' => '72.8281049', 'latitude' => '18.9733536', 'transform_style' => 'translate3d(-609.765px, 1142.1px, 0px)' ],
					[ 'city_name' => 'Karachi', 'longitude' => '67.0207055', 'latitude' => '24.8546842', 'transform_style' => 'translate3d(-720.89px, 997.6px, 0px)' ],
					[ 'city_name' => 'Maputo', 'longitude' => '32.56745', 'latitude' => '-25.966213', 'transform_style' => 'translate3d(-1294.36px, 2209.52px, 0px)' ],
					[ 'city_name' => 'Luxembourg', 'longitude' => '6.1296751', 'latitude' => '49.8158683', 'transform_style' => 'translate3d(-1105.13px, 497.081px, 0px)' ],
					[ 'city_name' => 'Xiamen', 'longitude' => '118.0853479', 'latitude' => '24.4801069', 'transform_style' => 'translate3d(429.379px, 1002.31px, 0px)' ],
					[ 'city_name' => 'Singapore', 'longitude' => '97', 'latitude' => '1.352083', 'transform_style' => 'translate3d(-7.35536px, 1597.49px, 0px)' ],
				],
				'title_field' => '{{{ city_name }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<section class="astro-5vnrzpll" data-chapter="GlobalConnectivity" id="GlobalConnectivity"
				 data-label="Global connectivity" data-theme-chapters="dark" data-cursor="draggable"
				 data-cursor-down="dragging" data-animation="GlobalConnectivity" data-astro-cid-5vnrzpll="">
			<div class="grid" data-astro-cid-5vnrzpll="">
				<h2 class="fs-h2 uppercase montfort-navy-blue-2 tb:col-end-4 dk:col-start-7 dk:col-end-22 lg:col-start-10"
					data-label="Global connectivity" data-astro-cid-5vnrzpll="" style="color: rgb(0, 38, 63);">
				<?php echo esc_html( $settings['headline'] ); ?>
				</h2>
			</div>
			<?php foreach ( $settings['points'] as $item ) : ?>
				<p class="fs-cta-s uppercase visible" data-point="" data-longitude="<?php echo esc_attr( $item['longitude'] ); ?>" data-latitude="<?php echo esc_attr( $item['latitude'] ); ?>"
				   data-astro-cid-u35nqrgz="" style="opacity: 0; transform: <?php echo esc_attr( $item['transform_style'] ); ?>;">
					<span data-astro-cid-u35nqrgz=""><?php echo esc_html( $item['city_name'] ); ?></span>
				</p>
			<?php endforeach; ?>
		</section>
		<?php
	}
}
