<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Montfort_Chapters_Navigation_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'montfort_chapters_navigation';
	}

	public function get_title() {
		return esc_html__( '15. Montfort Chapters Navigation', 'montfort-elements' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
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
			'chapter_key', [
				'label' => esc_html__( 'Chapter Key (ID)', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'ChapterID',
			]
		);

		$repeater->add_control(
			'chapter_title', [
				'label' => esc_html__( 'Chapter Title', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Chapter Title',
				'label_block' => true,
			]
		);

		$this->add_control(
			'chapters',
			[
				'label' => esc_html__( 'Chapters', 'montfort-elements' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'chapter_key' => 'WhoWeAre', 'chapter_title' => 'Who we are' ],
					[ 'chapter_key' => 'WhatWeDo', 'chapter_title' => 'What we do' ],
					[ 'chapter_key' => 'GlobalConnectivity', 'chapter_title' => 'Global connectivity' ],
					[ 'chapter_key' => 'Sustainability', 'chapter_title' => 'Sustainability' ],
				],
				'title_field' => '{{{ chapter_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="chapters-navigation" data-theme="light" data-astro-cid-gpzihxjt="" style="pointer-events: none;">
			<div class="chapters-container grid" data-astro-cid-gpzihxjt="">
				<nav class="chapters-list fs-cta montfort-navy-blue uppercase tb:col-start-1 dk:col-start-2 ml:col-start-3 lg:col-start-3"
					 data-astro-cid-gpzihxjt="">
					<?php foreach ( $settings['chapters'] as $item ) : ?>
						<div class="chapter-wrapper" data-chapter-key="<?php echo esc_attr( $item['chapter_key'] ); ?>" data-astro-cid-gpzihxjt="">
							<div class="progress-wrapper" data-astro-cid-gpzihxjt="">
								<div class="progress-bar white-part" data-astro-cid-gpzihxjt=""
									 style="translate: none; rotate: none; scale: none; transform-origin: 50% 100% 0px; transform: translate3d(0px, 0px, 0px) scale(1, 0);"></div>
								<div class="progress-bar blue-part" data-astro-cid-gpzihxjt=""
									 style="translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1, 0); transform-origin: 50% 100% 0px;"></div>
							</div>
							<a class="chapter-link" href="#<?php echo esc_attr( $item['chapter_key'] ); ?>" data-astro-cid-gpzihxjt="true">
								<div class="dot" data-astro-cid-gpzihxjt=""
									 style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px) scale(0);">
									<span data-astro-cid-gpzihxjt=""></span></div>
								<div class="text-container" data-astro-cid-gpzihxjt="">
									<span data-astro-cid-gpzihxjt="" style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -200%, 0px);"><?php echo esc_html( $item['chapter_title'] ); ?></span>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
					<div class="chapter-wrapper" data-astro-cid-gpzihxjt="">
						<div class="dot" data-astro-cid-gpzihxjt=""
							 style="translate: none; rotate: none; scale: none; transform: translate3d(0px, -8px, 0px) scale(0);">
							<span data-astro-cid-gpzihxjt=""></span></div>
					</div>
				</nav>
			</div>
		</div>
		<?php
	}
}
