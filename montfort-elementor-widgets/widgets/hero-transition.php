<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Hero_Transition_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_hero_transition';
	}

	public function get_title() {
		return esc_html__( '06. Montfort Hero Transition', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title' , 'montfort-elements' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'opacity', [
				'label' => esc_html__( 'Opacity', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 0.5,
			]
		);

		$this->add_control(
			'titles',
			[
				'label' => esc_html__( 'Transition Titles', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'title' => 'Montfort', 'opacity' => 1 ],
					[ 'title' => 'Trading', 'opacity' => 0.5 ],
					[ 'title' => 'Capital', 'opacity' => 0.5 ],
					[ 'title' => 'Maritime', 'opacity' => 0.5 ],
					[ 'title' => 'Fort Energy', 'opacity' => 0.5 ],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'spinner_color',
			[
				'label' => esc_html__( 'Spinner Color', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#2d628c',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="hero-transition" data-astro-transition-persist="transition-hero" data-cursor="draggable"
			 data-cursor-down="dragging" data-astro-cid-3rse3tms="" style="opacity: 0; --slide-progress: 0;">
			<div class="inner" data-astro-cid-3rse3tms="">
				<?php foreach ( $settings['titles'] as $item ) : ?>
					<div class="title" data-astro-cid-3rse3tms="" style="opacity: <?php echo esc_attr( $item['opacity'] ); ?>;">
						<p data-astro-cid-3rse3tms=""><?php echo esc_html( $item['title'] ); ?></p>
						<div class="spinner" data-astro-cid-3rse3tms="">
							<svg class="spinner-inner" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg"
								 data-astro-cid-3rse3tms="">
								<g stroke-width="8" data-astro-cid-3rse3tms="">
									<path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100"
										  data-astro-cid-3rse3tms=""></path>
									<path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100"
										  data-astro-cid-3rse3tms=""></path>
								</g>
							</svg>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<svg class="spinner-defs" xmlns="http://www.w3.org/2000/svg" color="<?php echo esc_attr( $settings['spinner_color'] ); ?>" data-astro-cid-3rse3tms="">
				<defs data-astro-cid-3rse3tms="">
					<linearGradient id="spinner-secondHalf" data-astro-cid-3rse3tms="">
						<stop offset="0%" stop-opacity="0" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
					</linearGradient>
					<linearGradient id="spinner-firstHalf" data-astro-cid-3rse3tms="">
						<stop offset="0%" stop-opacity="1" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
						<stop offset="100%" stop-opacity="0.5" stop-color="currentColor" data-astro-cid-3rse3tms=""></stop>
					</linearGradient>
				</defs>
			</svg>
		</div>
		<?php
	}
}
