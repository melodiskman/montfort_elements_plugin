<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Header_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_header';
	}

	public function get_title() {
		return esc_html__( 'Montfort Header', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-header';
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'link_text', [
				'label' => esc_html__( 'Link Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Link Text' , 'montfort-elements' ),
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
			'nav_links',
			[
				'label' => esc_html__( 'Navigation Links', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'link_text' => 'Montfort Group',
						'link_url' => [ 'url' => '/' ],
						'is_active' => 'yes',
					],
					[
						'link_text' => 'Montfort Trading',
						'link_url' => [ 'url' => '/trading/' ],
					],
					[
						'link_text' => 'Montfort Capital',
						'link_url' => [ 'url' => '/capital/' ],
					],
					[
						'link_text' => 'Montfort Maritime',
						'link_url' => [ 'url' => '/maritime/' ],
					],
					[
						'link_text' => 'Fort Energy',
						'link_url' => [ 'url' => '/fort-energy/' ],
					],
				],
				'title_field' => '{{{ link_text }}}',
			]
		);

		$this->add_control(
			'news_text',
			[
				'label' => esc_html__( 'News Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'News',
			]
		);

		$this->add_control(
			'news_url',
			[
				'label' => esc_html__( 'News URL', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => '/news/',
				],
			]
		);

		$this->add_control(
			'news_count',
			[
				'label' => esc_html__( 'News Count', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 20,
			]
		);

		$this->add_control(
			'menu_button_text',
			[
				'label' => esc_html__( 'Menu Button Text', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Menu',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<header data-astro-transition-persist="header" id="header" data-theme="<?php echo esc_attr( $settings['theme'] ); ?>" data-component="Header"
				data-astro-cid-4wsjtibl="" class="fade">
			<div class="grid container-menu" data-astro-cid-4wsjtibl="">
				<nav class="tb:col-start-1 tb:col-end-25 dk:col-start-2 dk:col-end-24 ml:col-start-3 ml:col-end-23 lg:col-start-3 lg:col-end-23"
					 data-astro-cid-4wsjtibl="">
					<div class="menu-links-w" data-astro-cid-4wsjtibl="">
						<ul data-astro-cid-4wsjtibl="">
							<?php foreach ( $settings['nav_links'] as $item ) :
								$active_class = ( 'yes' === $item['is_active'] ) ? ' active' : '';
								?>
								<li data-astro-cid-4wsjtibl="">
									<a href="<?php echo esc_url( $item['link_url']['url'] ); ?>" data-astro-cid-4wsjtibl="true" class="nav-link<?php echo esc_attr( $active_class ); ?>">
										<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $item['link_text'] ); ?></span>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="navbar" data-astro-cid-4wsjtibl=""
							 style="translate: none; rotate: none; scale: none; transform: translate3d(16px, 0px, 0px) scale(0.1965, 1); opacity: 1;"></div>
					</div>
					<div class="menu-w" data-astro-cid-4wsjtibl="">
						<a href="<?php echo esc_url( $settings['news_url']['url'] ); ?>" class="news-w" data-astro-cid-4wsjtibl="true">
							<p data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['news_text'] ); ?></p>
							<div class="counter" data-astro-cid-4wsjtibl="">
								<span data-total-count="<?php echo esc_attr( $settings['news_count'] ); ?>" class="number" data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['news_count'] ); ?></span>
							</div>
						</a>
						<button class="menu-cta" data-astro-cid-4wsjtibl="">
							<p data-astro-cid-4wsjtibl="">
								<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['menu_button_text'] ); ?></span>
								<span data-astro-cid-4wsjtibl=""><?php echo esc_html( $settings['menu_button_text'] ); ?></span>
							</p>
							<div class="dots-w" data-astro-cid-4wsjtibl="">
								<div class="dot" data-astro-cid-4wsjtibl=""></div>
								<div class="dot" data-astro-cid-4wsjtibl=""></div>
								<div class="dot" data-astro-cid-4wsjtibl=""></div>
								<div class="dot" data-astro-cid-4wsjtibl=""></div>
							</div>
						</button>
					</div>
				</nav>
			</div>
		</header>
		<?php
	}
}
