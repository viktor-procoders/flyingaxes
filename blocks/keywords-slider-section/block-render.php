<?php
/**
 * Block template file: block-render.php
 *
 * @var   array $block The block settings and attributes.
 * @var   string $content The block inner HTML (empty).
 * @var   bool $is_preview True during AJAX preview.
 * @var   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'keywords-slider-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$id = $block['anchor'];
}

wp_enqueue_style( 'keywords-slider-section' );
wp_enqueue_script( 'special-events-section' );

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'keywords-slider-section';
if ( ! empty( $block['className'] ) ) {
	$classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$classes .= ' align' . $block['align'];
}

$wrapper_attributes = get_block_wrapper_attributes( [
	'class' => $classes
] );

// reset attributes for editor
if ( $is_preview ) {
	$wrapper_attributes = '';
}

[
	'links_top'        => $links_top,
	'links_bottom'     => $links_bottom,
] = get_field( 'keywords_slider_section' );

?>


<?php if ( isset( $block['data']['preview_image_help'] ) ): ?>
	<?php
	$fileUrl = str_replace( get_stylesheet_directory(), '', dirname( __FILE__ ), );
	echo '<img src="' . get_stylesheet_directory_uri() . $fileUrl . '/' . $block['data']['preview_image_help'] . '" style="width:100%; height:auto;">';
	?>
<?php else: ?>
	<section class="keywords-slider-section" id="<?php echo esc_attr( $id ); ?>" <?php echo $wrapper_attributes; ?>>

		<div class="container-fluid px-0">
			<div class="splide" data-links-ticker-1>
				<div class="splide__track">
					<div class="splide__list keywords-slider-section__links">
						<?php foreach ( $links_top as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
						<?php foreach ( $links_top as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div class="splide" data-links-ticker-2>
				<div class="splide__track">
					<div class="splide__list keywords-slider-section__links">
						<?php foreach ( $links_bottom as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
						<?php foreach ( $links_bottom as $link ): ?>
							<div class="splide__slide">
								<a href="<?php echo $link['link']['url'] ?>">
									<?php echo $link['link']['title'] ?>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
