<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Menu_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_menu';
	}

	public function get_title() {
		return esc_html__( 'Montfort Menu Overlay', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-nav-menu';
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
			'link_text', [
				'label' => esc_html__( 'Link Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link_url', [
				'label' => esc_html__( 'Link URL', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
				],
			]
		);

		$repeater->add_control(
			'is_active', [
				'label' => esc_html__( 'Is Active', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'main_links',
			[
				'label' => esc_html__( 'Main Links', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Montfort Group', 'link_url' => [ 'url' => '/' ], 'is_active' => 'yes' ],
					[ 'link_text' => 'Montfort Trading', 'link_url' => [ 'url' => '/trading/' ] ],
					[ 'link_text' => 'Montfort Capital', 'link_url' => [ 'url' => '/capital/' ] ],
					[ 'link_text' => 'Montfort Maritime', 'link_url' => [ 'url' => '/maritime/' ] ],
					[ 'link_text' => 'Fort Energy', 'link_url' => [ 'url' => '/fort-energy/' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$terms_repeater = new \Elementor\Repeater();

		$terms_repeater->add_control(
			'link_text', [
				'label' => esc_html__( 'Link Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$terms_repeater->add_control(
			'link_url', [
				'label' => esc_html__( 'Link URL', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'terms_links',
			[
				'label' => esc_html__( 'Terms Links', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $terms_repeater->get_controls(),
				'default' => [
					[ 'link_text' => 'Contact', 'link_url' => [ 'url' => '/contact/' ] ],
					[ 'link_text' => 'ESG', 'link_url' => [ 'url' => '/#Sustainability' ] ],
					[ 'link_text' => 'Privacy policy', 'link_url' => [ 'url' => '/privacy-policy/' ] ],
					[ 'link_text' => 'Terms of use', 'link_url' => [ 'url' => '/terms-of-use/' ] ],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div data-astro-transition-persist="menu" class="montfort-menu" data-component="Menu" data-astro-cid-6fp6peiy="">
			<div class="grid grid-nav" data-astro-cid-6fp6peiy="">
				<nav class="col-start-1 col-end-5 tb:col-start-2 dk:col-start-5 lg:col-start-6 dk:col-end-14"
					 data-astro-cid-6fp6peiy="">
					<ul data-astro-cid-6fp6peiy="">
						<?php foreach ( $settings['main_links'] as $item ) :
							$active_class = ( 'yes' === $item['is_active'] ) ? ' active' : '';
							?>
							<li data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" data-astro-cid-6fp6peiy="true" class="nav-link<?php echo esc_attr( $active_class ); ?>">
									<div class="svg-container" data-astro-cid-6fp6peiy="">
										<svg data-astro-cid-6fp6peiy="true" xmlns="http://www.w3.org/2000/svg" width="10" height="10"
											 fill="none" viewBox="0 0 10 10" focusable="false" aria-hidden="true">
											<path fill="currentColor"
												  d="M1 4.4a.6.6 0 0 0 0 1.2zm8.424 1.024a.6.6 0 0 0 0-.848L5.606.757a.6.6 0 1 0-.849.849L8.151 5 4.757 8.394a.6.6 0 1 0 .849.849zM1 5.6h8V4.4H1z"></path>
										</svg>
									</div>
									<div class="text-content" data-astro-cid-6fp6peiy="">
										<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['link_text'] ); ?></span>
									</div>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
			<div class="grid grid-terms" data-astro-cid-6fp6peiy="">
				<div class="terms-w col-start-3 col-end-5 tb:col-start-1 tb:col-end-5 dk:col-start-3 dk:col-end-20 lg:col-start-4 lg:col-end-20"
					 data-astro-cid-6fp6peiy="">
					<ul data-astro-cid-6fp6peiy="">
						<?php foreach ( $settings['terms_links'] as $item ) : ?>
							<li class="terms-link" data-astro-cid-6fp6peiy="">
								<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" data-astro-cid-6fp6peiy="true">
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['link_text'] ); ?></span>
									<span data-astro-cid-6fp6peiy=""><?php echo esc_html( $item['link_text'] ); ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="overlay" data-astro-cid-6fp6peiy=""></div>
		</div>
		<?php
	}
}
